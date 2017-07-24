<?php
/**
 * Page builder support
 *
 * @package aakanksha
 */


/* Defaults */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom' => 0,
) );

/* Theme widgets */
function aakanksha_theme_widgets($widgets) {
	$theme_widgets = array(
		'aakanksha_Services_Type_A',
		'aakanksha_Services_Type_B',
		'aakanksha_List',
		'aakanksha_Facts',
		'aakanksha_Clients',
		'aakanksha_Testimonials',
		'aakanksha_Skills',
		'aakanksha_Action',
		'aakanksha_Video_Widget',
		'aakanksha_Social_Profile',
		'aakanksha_Employees',
		'aakanksha_Latest_News',
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('aakanksha-theme');
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-schedule';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'aakanksha_theme_widgets');

/* Add a tab for the theme widgets in the page builder */
function aakanksha_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => __('aakanksha Theme Widgets', 'aakanksha'),
		'filter' => array(
			'groups' => array('aakanksha-theme')
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'aakanksha_theme_widgets_tab', 20);

/* Replace default row options */
function aakanksha_row_styles($fields) {

	$fields['bottom_border'] = array(
		'name' => __('Bottom Border Color', 'aakanksha'),
		'type' => 'color',
		'priority' => 3,		
	);
	$fields['padding'] = array(
		'name' => __('Top/bottom padding', 'aakanksha'),
		'type' => 'measurement',
		'description' => __('Top and bottom padding for this row [default: 100px]', 'aakanksha'),
		'priority' => 4,
	);
	$fields['align'] = array(
		'name' => __('Center align the content?', 'aakanksha'),
		'type' => 'checkbox',
		'description' => __('This may or may not work. It depends on the widget styles.', 'aakanksha'),
		'priority' => 5,
	);		
	$fields['background'] = array(
		'name' => __('Background Color', 'aakanksha'),
		'type' => 'color',
		'description' => __('Background color of the row.', 'aakanksha'),
		'priority' => 6,
	);
	$fields['color'] = array(
		'name' => __('Color', 'aakanksha'),
		'type' => 'color',
		'description' => __('Color of the row.', 'aakanksha'),
		'priority' => 7,
	);	
	$fields['background_image'] = array(
		'name' => __('Background Image', 'aakanksha'),
		'type' => 'image',
		'description' => __('Background image of the row.', 'aakanksha'),
		'priority' => 8,
	);
	$fields['row_stretch'] = array(
		'name' 		=> __('Row Layout', 'aakanksha'),
		'type' 		=> 'select',
		'options' 	=> array(
			'' 				 => __('Standard', 'aakanksha'),
			'full' 			 => __('Full Width', 'aakanksha'),
			'full-stretched' => __('Full Width Stretched', 'aakanksha'),
		),
		'priority' => 9,
	);
	$fields['mobile_padding'] = array(
		'name' 		  => __('Mobile padding', 'aakanksha'),
		'type' 		  => 'select',
		'description' => __('Here you can select a top/bottom row padding for screen sizes < 1024px', 'aakanksha'),		
		'options' 	  => array(
			'' 				=> __('Default', 'aakanksha'),
			'mob-pad-0' 	=> __('0', 'aakanksha'),
			'mob-pad-15'    => __('15px', 'aakanksha'),
			'mob-pad-30'    => __('30px', 'aakanksha'),
			'mob-pad-45'    => __('45px', 'aakanksha'),
		),
		'priority'    => 10,
	);
	$fields['class'] = array(
		'name' => __('Row Class', 'aakanksha'),
		'type' => 'text',
		'description' => __('Add your own class for this row', 'aakanksha'),
		'priority' => 11,
	);
	$fields['column_padding'] = array(
		'name'        => __('Columns padding', 'aakanksha'),
		'type'        => 'checkbox',
		'description' => __('Remove padding between columns for this row?', 'aakanksha'),
		'priority'    => 12,
	);	

	return $fields;
}
remove_filter('siteorigin_panels_row_style_fields', array('SiteOrigin_Panels_Default_Styling', 'row_style_fields' ) );
add_filter('siteorigin_panels_row_style_fields', 'aakanksha_row_styles');

/* Filter for the styles */
function aakanksha_row_styles_output($attr, $style) {
	$attr['style'] = '';

	if(!empty($style['bottom_border'])) $attr['style'] .= 'border-bottom: 1px solid '. esc_attr($style['bottom_border']) . ';';
	if(!empty($style['background'])) $attr['style'] .= 'background-color: ' . esc_attr($style['background']) . ';';
	
	if(!empty($style['color'])) {
		$attr['style'] .= 'color: ' . esc_attr($style['color']) . ';';
		$attr['data-hascolor'] = 'hascolor';
	}
	
	if(!empty($style['align'])) $attr['style'] .= 'text-align: center;';
	if(!empty( $style['background_image'] )) {
		$url = wp_get_attachment_image_src( $style['background_image'], 'full' );
		if( !empty($url) ) {
			$attr['style'] .= 'background-image: url(' . esc_url($url[0]) . ');';
			$attr['data-hasbg'] = 'hasbg';
		}
	}
	if(!empty($style['padding'])) {
		$attr['style'] .= 'padding: ' . esc_attr($style['padding']) . ' 0; ';
	} else {
		$attr['style'] .= 'padding: 100px 0; ';
	}
	if( !empty( $style['row_stretch'] ) ) {
		$attr['class'][] = 'aakanksha-stretch';
		$attr['data-stretch-type'] = esc_attr($style['row_stretch']);
	}
	if( !empty( $style['mobile_padding'] ) ) {
		$attr['class'][] = esc_attr($style['mobile_padding']);
	}
    if( !empty( $style['column_padding'] ) ) {
       $attr['class'][] = 'no-col-padding';
    }
    
	if(empty($attr['style'])) unset($attr['style']);
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'aakanksha_row_styles_output', 10, 2);