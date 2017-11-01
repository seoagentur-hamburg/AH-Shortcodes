<?php
/**
 * Evolution Shortcodes
*/


if ( !function_exists( 'evolution_column' ) ) :
/**
 * Column Shortcode
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_column( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'column' => 'one-third',
			'last' => false
		), $atts));

		$last_class = '';
		$last_div = '';
		if( $last ) {
			$last_class = ' evolution-column-last';
			$last_div = '<div class="clear"></div>';
		}

		return '<div class="evolution-' . $column . $last_class . '">' . do_shortcode($content) . '</div>' . $last_div;
        
}
add_shortcode( 'evolution_column', 'evolution_column' );
endif;





if (!function_exists( 'evolution_one_third' ) ) :
/**
 * Column Shortcode - One Third
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_third( $atts, $content = null ) {
        
	   return '<div class="evolution-one-third">' . do_shortcode($content) . '</div>';
        
}
add_shortcode( 'evolution_one_third', 'evolution_one_third' );
endif;



if (!function_exists( 'evolution_one_third_last' ) ) :
/**
 * Column Shortcode - One Third Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_third_last( $atts, $content = null ) {
        
	   return '<div class="evolution-one-third evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode( 'evolution_one_third_last', 'evolution_one_third_last' );
endif;



if (!function_exists( 'evolution_two_third' ) ) :
/**
 * Column Shortcode - Two Third
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_two_third( $atts, $content = null ) {
    
	   return '<div class="evolution-two-third">' . do_shortcode($content) . '</div>';
    
}
add_shortcode( 'evolution_two_third', 'evolution_two_third' );
endif;



if (!function_exists('evolution_two_third_last')) :
/**
 * Column Shortcode - Two Third Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_two_third_last( $atts, $content = null ) {
        
	   return '<div class="evolution-two-third evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
        
}
add_shortcode('evolution_two_third_last', 'evolution_two_third_last');
endif;



if (!function_exists('evolution_one_half')) :
/**
 * Column Shortcode - One Half
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_half( $atts, $content = null ) {
        
	   return '<div class="evolution-one-half">' . do_shortcode($content) . '</div>';
        
}
add_shortcode('evolution_one_half', 'evolution_one_half');
endif;



if (!function_exists('evolution_one_half_last')) :
/**
 * Column Shortcode - One Half Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_half_last( $atts, $content = null ) {
        
	   return '<div class="evolution-one-half evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
        
}
add_shortcode('evolution_one_half_last', 'evolution_one_half_last');
endif;



if (!function_exists('evolution_one_fourth')) :
/**
 * Column Shortcode - One Fourth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_fourth( $atts, $content = null ) {
        
	   return '<div class="evolution-one-fourth">' . do_shortcode($content) . '</div>';
        
}
add_shortcode('evolution_one_fourth', 'evolution_one_fourth');
endif;



if (!function_exists('evolution_one_fourth_last')) :
/**
 * Column Shortcode - One Fourth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_fourth_last( $atts, $content = null ) {
        
	   return '<div class="evolution-one-fourth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
        
}
add_shortcode('evolution_one_fourth_last', 'evolution_one_fourth_last');
endif;



if (!function_exists('evolution_three_fourth')) :
/**
 * Column Shortcode - Three Fourth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_three_fourth( $atts, $content = null ) {
    
	   return '<div class="evolution-three-fourth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_three_fourth', 'evolution_three_fourth');
endif;



if (!function_exists('evolution_three_fourth_last')) :
/**
 * Column Shortcode - Three Fourth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_three_fourth_last( $atts, $content = null ) {
        
	   return '<div class="evolution-three-fourth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
        
}
add_shortcode('evolution_three_fourth_last', 'evolution_three_fourth_last');
endif;



if (!function_exists('evolution_one_fifth')) :
/**
 * Column Shortcode - One Fifth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_fifth( $atts, $content = null ) {
    
	   return '<div class="evolution-one-fifth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_one_fifth', 'evolution_one_fifth');
endif;



if (!function_exists('evolution_one_fifth_last')) :
/**
 * Column Shortcode - One Fifth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_fifth_last( $atts, $content = null ) {
    
	   return '<div class="evolution-one-fifth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode('evolution_one_fifth_last', 'evolution_one_fifth_last');
endif;



if (!function_exists('evolution_two_fifth')) :
/**
 * Column Shortcode - Two Fifth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_two_fifth( $atts, $content = null ) {
    
	   return '<div class="evolution-two-fifth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_two_fifth', 'evolution_two_fifth');
endif;



if (!function_exists('evolution_two_fifth_last')) :
/**
 * Column Shortcode - Two Fifth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_two_fifth_last( $atts, $content = null ) {
        
	   return '<div class="evolution-two-fifth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
        
}
add_shortcode('evolution_two_fifth_last', 'evolution_two_fifth_last');
endif;



if (!function_exists('evolution_three_fifth')) :
/**
 * Column Shortcode - Three Fifth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_three_fifth( $atts, $content = null ) {
        
	   return '<div class="evolution-three-fifth">' . do_shortcode($content) . '</div>';
        
}
add_shortcode('evolution_three_fifth', 'evolution_three_fifth');
endif;



if (!function_exists('evolution_three_fifth_last')) :
/**
 * Column Shortcode - Three Fifth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_three_fifth_last( $atts, $content = null ) {
    
	   return '<div class="evolution-three-fifth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode('evolution_three_fifth_last', 'evolution_three_fifth_last');
endif;



if (!function_exists('evolution_four_fifth')) :
/**
 * Column Shortcode - Four Fifth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_four_fifth( $atts, $content = null ) {
    
	   return '<div class="evolution-four-fifth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_four_fifth', 'evolution_four_fifth');
endif;



if (!function_exists('evolution_four_fifth_last')) :
/**
 * Column Shortcode - Four Fifth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_four_fifth_last( $atts, $content = null ) {
    
	   return '<div class="evolution-four-fifth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode('evolution_four_fifth_last', 'evolution_four_fifth_last');
endif;



if (!function_exists('evolution_one_sixth')) :
/**
 * Column Shortcode - One Sixth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_sixth( $atts, $content = null ) {
    
	   return '<div class="evolution-one-sixth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_one_sixth', 'evolution_one_sixth');
endif;



if (!function_exists('evolution_one_sixth_last')) :
/**
 * Column Shortcode - One Sixth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_one_sixth_last( $atts, $content = null ) {
    
	   return '<div class="evolution-one-sixth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode('evolution_one_sixth_last', 'evolution_one_sixth_last');
endif;



if (!function_exists('evolution_five_sixth')) :
/**
 * Column Shortcode - Five Sixth
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_five_sixth( $atts, $content = null ) {
    
	   return '<div class="evolution-five-sixth">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_five_sixth', 'evolution_five_sixth');
endif;



if (!function_exists('evolution_five_sixth_last')) :
/**
 * Column Shortcode - Five Sixth Last
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_five_sixth_last( $atts, $content = null ) {
    
	   return '<div class="evolution-five-sixth evolution-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
    
}
add_shortcode('evolution_five_sixth_last', 'evolution_five_sixth_last');
endif;




if (!function_exists( 'evolution_button' ) ) :
/**
 * Button Shortcode
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_button( $atts, $content = null ) {
    
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'green',
			'size' => 'small',
			'type' => 'round'
	    ), $atts));

	   return '<a target="'.$target.'" class="evolution-button '.$size.' '.$style.' '. $type .'" href="'.$url.'">' . do_shortcode($content) . '</a>';
    
}
add_shortcode('evolution_button', 'evolution_button');
endif;




if (!function_exists('evolution_alert')) :
/**
 * Alert Shortcode
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_alert( $atts, $content = null ) {
    
		extract(shortcode_atts(array(
			'style'   => 'grey'
	    ), $atts));

	   return '<div class="evolution-alert '.$style.'">' . do_shortcode($content) . '</div>';
    
}
add_shortcode('evolution_alert', 'evolution_alert');
endif;





if (!function_exists('evolution_toggle')) :
/**
 * Toggle Shortcode
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_toggle( $atts, $content = null ) {
    
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));

		return "<div data-id='".$state."' class=\"evolution-toggle\"><span class=\"evolution-toggle-title\">". $title ."</span><div class=\"evolution-toggle-inner\">". do_shortcode($content) ."</div></div>";
}
add_shortcode('evolution_toggle', 'evolution_toggle');
endif;






if (!function_exists('evolution_tabs')) :
/**
 * Tabs Shortcode
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_tabs( $atts, $content = null ) {
    
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );

		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '';

		if( count($tab_titles) ){
		    $output .= '<div id="evolution-tabs-'. $i .'" class="evolution-tabs"><div class="evolution-tab-inner">';
			$output .= '<ul class="evolution-nav evolution-clearfix">';

			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#evolution-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}

		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
            
		} else {
			$output .= do_shortcode( $content );
		}

		return $output;
}
add_shortcode( 'evolution_tabs', 'evolution_tabs' );
endif;




if (!function_exists('evolution_tab')) :
/**
 * Tabs Shortcode - Generate Tab Title
 * 
 * @since 1.0.0
 * 
 * @return shortcode
 */
function evolution_tab( $atts, $content = null ) {
        
		$defaults = array( 'title' => 'Tab' );
        
		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="evolution-tab-'. sanitize_title( $title ) .'" class="evolution-tab">'. do_shortcode( $content ) .'</div>';
        
}
add_shortcode( 'evolution_tab', 'evolution_tab' );
endif;
