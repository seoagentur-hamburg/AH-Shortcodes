<?php
/**
* Define the shortcode parameters
*/

/* Buttons */

$evolution_shortcodes['button'] = array(
	'title' => __('Button', 'evo-shortcodes'),
	'id' => 'evolution-button-shortcode',
	'template' => '[evolution_button {{attributes}}] {{content}} [/evolution_button]',
	'params' => array(
		'url' => array(
			'std' => 'http://example.com',
			'type' => 'text',
			'label' => __('Button URL', 'evo-shortcodes'),
			'desc' => __('Add the button\'s url eg http://example.com', 'evo-shortcodes')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'evo-shortcodes'),
			'desc' => __('Select the button\'s style, ie the button\'s color', 'evo-shortcodes'),
			'options' => array(
                'green' => __('Green', 'evo-shortcodes'),
                'blue' => __('Blue', 'evo-shortcodes'),
                'red' => __('Red', 'evo-shortcodes'),
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'evo-shortcodes'),
			'desc' => __('Select the button\'s size', 'evo-shortcodes'),
			'options' => array(
                'small' => __('Small', 'evo-shortcodes'),
                'large' => __('Large', 'evo-shortcodes'),
			)
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Type', 'evo-shortcodes'),
			'desc' => __('Select the button\'s type', 'evo-shortcodes'),
			'options' => array(
                'round' => __('Round', 'evo-shortcodes'),
                'square' => __('Square', 'evo-shortcodes'),
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'evo-shortcodes'),
			'desc' => __('Set the browser behavior for the click action.', 'evo-shortcodes'),
			'options' => array(
                '_self' => __('Same window', 'evo-shortcodes'),
                '_blank' => __('New window', 'evo-shortcodes'),
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'evo-shortcodes'),
			'desc' => __('Add the button\'s text', 'evo-shortcodes'),
		)
	)
);

/* Alert Config --- */

$evolution_shortcodes['alert'] = array(
	'title' => __('Alert', 'evo-shortcodes'),
	'id' => 'evolution-alert-shortcode',
	'template' => '[evolution_alert {{attributes}}] {{content}} [/evolution_alert]',
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'evo-shortcodes'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'evo-shortcodes'),
			'options' => array(
                'grey' => __('Grey', 'evo-shortcodes'),
                'red' => __('Red', 'evo-shortcodes'),
                'blue' => __('Blue', 'evo-shortcodes'),
                'green' => __('Green', 'evo-shortcodes')
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'evo-shortcodes'),
			'desc' => __('Add the alert\'s text', 'evo-shortcodes'),
		)

	)
);

/* Toggle Config --- */

$evolution_shortcodes['toggle'] = array(
	'title' => __('Toggle', 'evo-shortcodes'),
	'id' => 'evolution-toggle-shortcode',
	'template' => ' {{child_shortcode}} ', // There is no wrapper shortcode
	'notes' => __('Click \'Add Toggle\' to add a new toggle. Drag and drop to reorder toggles.', 'evo-shortcodes'),
	'params' => array(),
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __('Toggle Content Title', 'evo-shortcodes'),
				'desc' => __('Add the title that will go above the toggle content', 'evo-shortcodes'),
				'std' => 'Title'
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Toggle Content', 'evo-shortcodes'),
				'desc' => __('Add the toggle content. Will accept HTML', 'evo-shortcodes'),
			),
			'state' => array(
				'type' => 'select',
				'label' => __('Toggle State', 'evo-shortcodes'),
				'desc' => __('Select the state of the toggle on page load', 'evo-shortcodes'),
				'options' => array(
                    'open' => __('Open', 'evo-shortcodes'),
                    'closed' => __('Closed', 'evo-shortcodes'),
				)
			)
		),
		'template' => '[evolution_toggle {{attributes}}] {{content}} [/evolution_toggle]',
		'clone_button' => __('Add Toggle', 'evo-shortcodes')
	)
);

/* Tabs Config --- */

$evolution_shortcodes['tabs'] = array(
    'title' => __('Tab', 'evo-shortcodes'),
    'id' => 'evolution-tabs-shortcode',
    'template' => '[evolution_tabs] {{child_shortcode}} [/evolution_tabs]',
    'notes' => __('Click \'Add Tab\' to add a new tag. Drag and drop to reorder tabs.', 'evo-shortcodes'),
    'params' => array(),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'evo-shortcodes'),
                'desc' => __('Title of the tab.', 'evo-shortcodes'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'evo-shortcodes'),
                'desc' => __('Add the tabs content.', 'evo-shortcodes')
            )
        ),
        'template' => '[evolution_tab {{attributes}}] {{content}} [/evolution_tab]',
        'clone_button' => __('Add Tab', 'evo-shortcodes')
    )
);

/* Columns Config --- */

$evolution_shortcodes['columns'] = array(
	'title' => __('Columns', 'evo-shortcodes'),
	'id' => 'evolution-columns-shortcode',
	'template' => ' {{child_shortcode}} ', // There is no wrapper shortcode
	'notes' => __('Click \'Add Column\' to add a new column. Drag and drop to reorder columns.', 'evo-shortcodes'),
	'params' => array(),
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'evo-shortcodes'),
				'desc' => __('Select the width of the column.', 'evo-shortcodes'),
				'options' => array(
					'one-third' => __('One Third', 'evo-shortcodes'),
					'two-third' => __('Two Thirds', 'evo-shortcodes'),
					'one-half' => __('One Half', 'evo-shortcodes'),
					'one-fourth' => __('One Fourth', 'evo-shortcodes'),
					'three-fourth' => __('Three Fourth', 'evo-shortcodes'),
					'one-fifth' => __('One Fifth', 'evo-shortcodes'),
					'two-fifth' => __('Two Fifth', 'evo-shortcodes'),
					'three-fifth' => __('Three Fifth', 'evo-shortcodes'),
					'four-fifth' => __('Four Fifth', 'evo-shortcodes'),
					'one-sixth' => __('One Sixth', 'evo-shortcodes'),
					'five-sixth' => __('Five Sixth', 'evo-shortcodes')
				)
			),
			'last' => array(
				'type' => 'checkbox',
				'label' => __('Last column', 'evo-shortcodes'),
				'desc' => __('Set whether this is the last column.', 'evo-shortcodes'),
				'default' => false
			),
			'content' => array(
				'std' => __('Column content', 'evo-shortcodes'),
				'type' => 'textarea',
				'label' => __('Column Content', 'evo-shortcodes'),
				'desc' => __('Add the column content.', 'evo-shortcodes')
			)
		),
		'template' => '[evolution_column {{attributes}}] {{content}} [/evolution_column]',
		'clone_button' => __('Add Column', 'evo-shortcodes')
	)
);
