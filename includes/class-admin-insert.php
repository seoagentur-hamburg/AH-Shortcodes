<?php
/**
* Creates the admin interface to add shortcodes to the editor
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Evolution_Admin_Insert class
 */
class Evolution_Admin_Insert {

	/**
	 * __construct function
	 *
	 * @access public
	 * @return  void
	 */
	public function __construct() {
		add_action( 'media_buttons', array( $this, 'media_buttons' ), 20 );
		add_action( 'admin_footer', array( $this, 'evolution_popup_html' ) );
	}

	/**
	 * media_buttons function
	 *
	 * @access public
	 * @return void
	 */
	public function media_buttons( $editor_id = 'content' ) {
		global $pagenow;

		// Only run on add/edit screens
		if ( in_array( $pagenow, array('post.php', 'page.php', 'post-new.php', 'post-edit.php') ) ) {
			$output = '<a href="#TB_inline?width=4000&amp;inlineId=evolution-choose-shortcode" class="thickbox button evolution-thicbox" title="' . __( 'AH Shortcodes', 'evo-shortcodes' ) . '">' . __( 'Insert Shortcode', 'evo-shortcodes' ) . '</a>';
		}
		echo $output;
	}

	/**
	 * Build out the input fields for shortcode content
	 * @param  string $key
	 * @param  array $param the parameters of the input
	 * @return void
	 */
	public function evolution_build_fields($key, $param) {
		$html = '<tr>';
		$html .= '<td class="label">' . $param['label'] . ':</td>';
		switch( $param['type'] )
		{
			case 'text' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<input type="text" class="evolution-form-text evolution-input" name="' . $key . '" id="' . $key . '" value="' . $param['std'] . '" />' . "\n";
				$output .= '<span class="evolution-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'textarea' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<textarea rows="10" cols="30" name="' . $key . '" id="' . $key . '" class="evolution-form-textarea evolution-input">' . $param['std'] . '</textarea>' . "\n";
				$output .= '<span class="evolution-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'select' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<select name="' . $key . '" id="' . $key . '" class="evolution-form-select evolution-input">' . "\n";

				foreach( $param['options'] as $value => $option )
				{
					$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
				}

				$output .= '</select>' . "\n";
				$output .= '<span class="evolution-form-desc">' . $param['desc'] . '</span></td>' . "\n";

				// append
				$html .= $output;

				break;

			case 'checkbox' :

				// prepare
				$output = '<td><label class="screen-reader-text" for="' . $key .'">' . $param['label'] . '</label>';
				$output .= '<input type="checkbox" name="' . $key . '" id="' . $key . '" class="evolution-form-checkbox evolution-input"' . ( $param['default'] ? 'checked' : '' ) . '>' . "\n";
				$output .= '<span class="evolution-form-desc">' . $param['desc'] . '</span></td>';

				$html .= $output;

				break;

			default :
				break;
		}
		$html .= '</tr>';

		return $html;
	}

	/**
	 * Popup window
	 *
	 * Print the footer code needed for the Insert Shortcode Popup
	 *
	 * @since 2.0
	 * @global $pagenow
	 * @return void Prints HTML
	 */
	function evolution_popup_html() {
		global $pagenow;
        include(EVOLUTION_PLUGIN_DIR . '/includes/config.php');

		// Only run in add/edit screens
		if ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) ) { ?>

			<script type="text/javascript">
				function EvolutionInsertShortcode() {
					// Grab input content, build the shortcodes, and insert them
					// into the content editor
					var select = jQuery('#select-evolution-shortcode').val(),
						type = select.replace('evolution-', '').replace('-shortcode', ''),
						template = jQuery('#' + select).data('shortcode-template'),
						childTemplate = jQuery('#' + select).data('shortcode-child-template'),
						tables = jQuery('#' + select).find('table').not('.evolution-clone-template'),
						attributes = '',
						content = '',
						contentToEditor = '';

					// go over each table, build the shortcode content
					for (var i = 0; i < tables.length; i++) {
						var elems = jQuery(tables[i]).find('input, select, textarea');

						// Build an attributes string by mapping over the input
						// fields in a given table.
						attributes = jQuery.map(elems, function(el, index) {
							var $el = jQuery(el);

							console.log(el);

							if( $el.attr('id') === 'content' ) {
								content = $el.val();
								return '';
							} else if( $el.attr('id') === 'last' ) {
								if( $el.is(':checked') ) {
									return $el.attr('id') + '="true"';
								} else {
									return '';
								}
							} else {
								return $el.attr('id') + '="' + $el.val() + '"';
							}
						});
						attributes = attributes.join(' ').trim();

						// Place the attributes and content within the provided
						// shortcode template
						if( childTemplate ) {
							// Run the replace on attributes for columns because the
							// attributes are really the shortcodes
							contentToEditor += childTemplate.replace('{{attributes}}', attributes).replace('{{attributes}}', attributes).replace('{{content}}', content);
						} else {
							// Run the replace on attributes for columns because the
							// attributes are really the shortcodes
							contentToEditor += template.replace('{{attributes}}', attributes).replace('{{attributes}}', attributes).replace('{{content}}', content);
						}
					};

					// Insert built content into the parent template
					if( childTemplate ) {
						contentToEditor = template.replace('{{child_shortcode}}', contentToEditor);
					}

					// Send the shortcode to the content editor and reset the fields
					window.send_to_editor( contentToEditor );
					evolutionResetFields();
				}

				// Set the inputs to empty state
				function evolutionResetFields() {
					jQuery('#evolution-shortcode-title').text('');
					jQuery('#evolution-shortcode-wrap').find('input[type=text], select').val('');
					jQuery('#evolution-shortcode-wrap').find('textarea').text('');
					jQuery('.evolution-was-cloned').remove();
					jQuery('.evolution-shortcode-type').hide();
				}

				// Function to redraw the thickbox for new content
				function evolutionResizeTB() {
					var	ajaxCont = jQuery('#TB_ajaxContent'),
						tbWindow = jQuery('#TB_window'),
						evolutionPopup = jQuery('#evolution-shortcode-wrap');

					ajaxCont.css({
						height: (tbWindow.outerHeight()-47),
						overflow: 'auto', // IMPORTANT
						width: (tbWindow.outerWidth() - 30)
					});
				}

				// Simple function to clone an included template
				function evolutionCloneContent(el) {
					var clone = jQuery(el).find('.evolution-clone-template').clone().removeClass('hidden evolution-clone-template').removeAttr('id').addClass('evolution-was-cloned');

					jQuery(el).append(clone);
				}

				jQuery(document).ready(function($) {
					var $shortcodes = $('.evolution-shortcode-type').hide(),
						$title = $('#evolution-shortcode-title');

					// Show the selected shortcode input fields
	                $('#select-evolution-shortcode').change(function () {
	                	var text = $(this).find('option:selected').text();

	                	$shortcodes.hide();
	                	$title.text(text);
	                    $('#' + $(this).val()).show();
	                    evolutionResizeTB();
	                });

	                // Clone a set of input fields
	                $('.clone-content').on('click', function() {
						var el = $(this).siblings('.evolution-sortable');

						evolutionCloneContent(el);
						evolutionResizeTB();
						$('.evolution-sortable').sortable('refresh');
					});

	                // Remove a set of input fields
					$('.evolution-shortcode-type').on('click', '.evolution-remove' ,function() {
						$(this).closest('table').remove();
					});

					// Make content sortable using the jQuery UI Sortable method
					$('.evolution-sortable').sortable({
						items: 'table:not(".hidden")',
						placeholder: 'evolution-sortable-placeholder'
					});
	            });
			</script>

			<div id="evolution-choose-shortcode" style="display: none;">
				<div id="evolution-shortcode-wrap" class="wrap evolution-shortcode-wrap">
					<div class="evolution-shortcode-select">
						<label for="evolution-shortcode"><?php _e('Select the shortcode type', 'evo-shortcodes'); ?></label>
						<select name="evolution-shortcode" id="select-evolution-shortcode">
							<option><?php _e('Select Shortcode', 'evo-shortcodes'); ?></option>
							<?php foreach( $evolution_shortcodes as $shortcode ) {
								echo '<option data-title="' . $shortcode['title'] . '" value="' . $shortcode['id'] . '">' . $shortcode['title'] . '</option>';
							} ?>
						</select>
					</div>

					<h3 id="Evolution Shortcode Title"></h3>

				<?php

				$html = '';
				$clone_button = array( 'show' => false );

				// Loop through each shortcode building content
				foreach( $evolution_shortcodes as $key => $shortcode ) {

					// Add shortcode templates to be used when building with JS
					$shortcode_template = ' data-shortcode-template="' . $shortcode['template'] . '"';
					if( array_key_exists('child_shortcode', $shortcode ) ) {
						$shortcode_template .= ' data-shortcode-child-template="' . $shortcode['child_shortcode']['template'] . '"';
					}

					// Individual shortcode 'block'
					$html .= '<div id="' . $shortcode['id'] . '" class="evolution-shortcode-type" ' . $shortcode_template . '>';

					// If shortcode has children, it can be cloned and is sortable.
					// Add a hidden clone template, and set clone button to be displayed.
					if( array_key_exists('child_shortcode', $shortcode ) ) {
						$html .= (isset($shortcode['child_shortcode']['shortcode']) ? $shortcode['child_shortcode']['shortcode'] : null);
						$shortcode['params'] = $shortcode['child_shortcode']['params'];
						$clone_button['show'] = true;
						$clone_button['text'] = $shortcode['child_shortcode']['clone_button'];
						$html .= '<div class="evolution-sortable">';
						$html .= '<table id="clone-' . $shortcode['id'] . '" class="hidden evolution-clone-template"><tbody>';
						foreach( $shortcode['params'] as $key => $param ) {
							$html .= $this->evolution_build_fields($key, $param);
						}
						if( $clone_button['show'] ) {
							$html .= '<tr><td colspan="2"><a href="#" class="evolution-remove">' . __('Remove', 'evo-shortcodes') . '</a></td></tr>';
						}
						$html .= '</tbody></table>';
					}

					// Build the actual shortcode input fields
					$html .= '<table><tbody>';
					foreach( $shortcode['params'] as $key => $param ) {
						$html .= $this->evolution_build_fields($key, $param);
					}

					// Add a link to remove a content block
					if( $clone_button['show'] ) {
						$html .= '<tr><td colspan="2"><a href="#" class="evolution-remove">' . __('Remove', 'evo-shortcodes') . '</a></td></tr>';
					}
					$html .= '</tbody></table>';

					// Close out the sortable div and display the clone button as needed
					if( $clone_button['show'] ) {
						$html .= '</div>';
						$html .= '<a id="add-' . $shortcode['id'] . '" href="#" class="button-secondary clone-content">' . $clone_button['text'] . '</a>';
						$clone_button['show'] = false;
					}

					// Display notes if provided
					if( array_key_exists('notes', $shortcode) ) {
						$html .= '<p class="evolution-notes">' . $shortcode['notes'] . '</p>';
					}
					$html .= '</div>';
				}

				echo $html;
				?>

				<p class="submit">
                    <input type="button" id="evolution-insert-shortcode" class="button-primary" value="<?php _e('Insert Shortcode', 'evo-shortcodes'); ?>" onclick="EvolutionInsertShortcode();" />
					<a href="#" id="evolution-cancel-shortcode-insert" class="button-secondary evolution-cancel-shortcode-insert" onclick="tb_remove();"><?php _e('Cancel', 'evo-shortcodes'); ?></a>
				</p>
				</div>
			</div>

		<?php
		}
	}
}

new Evolution_Admin_Insert();