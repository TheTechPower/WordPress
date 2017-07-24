<?php
/**
 * Page Builder functions
 *
 * This holds the external functions which can be used by the theme
 * Requires the as_Page_Builder class
 *
 * @todo - multicheck, image checkbox, better colorpicker
**/

if(class_exists('as_Page_Builder')) {
	
	/** 
	 * Core functions
	*******************/
	 
	/* Register a block */
	function as_register_block($block_class) {
		global $as_registered_blocks;
		$as_registered_blocks[strtolower($block_class)] = new $block_class;
	}
	
	/** Un-register a block **/
	function as_unregister_block($block_class) {
		global $as_registered_blocks;
		$block_class = strtolower($block_class);
		foreach($as_registered_blocks as $block) {
			if($block->id_base == $block_class) unset($as_registered_blocks[$block_class]);
		}
	}
	
	/** Get list of all blocks **/
	function as_get_blocks($template_id) {
		global $as_page_builder;
		$blocks = $as_page_builder->get_blocks($template_id);
		
		return $blocks;
	}
	
	/** 
	 * Form Field Helper functions
	 *
	 * Provides some default fields for use in the blocks
	 *
	 * @todo build this into a separate class instead!
	********************************************************/
	
	/* Input field - Options: $size = min, small, full */
	function as_field_input($field_id, $block_id, $input, $size = 'full', $type = 'text') {
		$output = '<input type="'.$type.'" id="'. $block_id .'_'.$field_id.'" class="input-'.$size.'" value="'.$input.'" name="as_blocks['.$block_id.']['.$field_id.']">';
		
		return $output;
	}
	
	/* Input field for icon font - Options: $size = min, small, full */
	function as_field_input_icon($field_id, $block_id, $input, $size = 'full', $type = 'text') {
		$output = '<input type="'.$type.'" id="'. $block_id .'_'.$field_id.'" class="input-'.$size.' show-icon" value="'.$input.'" name="as_blocks['.$block_id.']['.$field_id.']">';
		
		return $output;
	}
	
	/* Textarea field */
	function as_field_textarea($field_id, $block_id, $text, $size = 'full') {
		$output = '<textarea id="'. $block_id .'_'.$field_id.'" class="textarea-'.$size.'" name="as_blocks['.$block_id.']['.$field_id.']" rows="5">'.$text.'</textarea>';
		
		return $output;
	}
	
	
	/* Select field */
	function as_field_select($field_id, $block_id, $options, $selected) {
		$options = is_array($options) ? $options : array();
		$output = '<select id="'. $block_id .'_'.$field_id.'" name="as_blocks['.$block_id.']['.$field_id.']">';
		foreach($options as $key=>$value) {
			$output .= '<option value="'.$key.'" '.selected( $selected, $key, false ).'>'.htmlspecialchars($value).'</option>';
		}
		$output .= '</select>';
		
		return $output;
	}
	
	/* Select field in*/
	function as_field_select_in($id, $name, $options, $selected) {
		$options = is_array($options) ? $options : array();
		$output = '<select id="'. $id .'" name="'.$name.'">';
		foreach($options as $key=>$value) {
			$output .= '<option value="'.$key.'" '.selected( $selected, $key, false ).'>'.htmlspecialchars($value).'</option>';
		}
		$output .= '</select>';
		
		return $output;
	}
	
	/* Multiselect field */
	function as_field_multiselect($field_id, $block_id, $options, $selected_keys = array()) {
		$output = '<select id="'. $block_id .'_'.$field_id.'" multiple="multiple" class="select of-input" name="as_blocks['.$block_id.']['.$field_id.'][]">';
		foreach ($options as $key => $option) {
			$selected = (is_array($selected_keys) && in_array($key, $selected_keys)) ? $selected = 'selected="selected"' : '';			
			$output .= '<option id="'. $block_id .'_'.$field_id.'_'. $key .'" value="'.$key.'" '. $selected .' />'.$option.'</option>';
		}
		$output .= '</select>';
		
		return $output;
	}
	
	/* Overlay Color picker field */
	function as_field_color_picker_overlay($field_id, $block_id, $color, $default = '') {
		$output = '<div class="aspb-color-picker">';
			$output .= '<input type="text" id="'. $block_id .'_'.$field_id.'" class="input-color-picker aakanksha-color-control" value="'. $color .'" name="as_blocks['.$block_id.']['.$field_id.']" data-default-color="'. $default .'"/>';
		$output .= '</div>';
		
		return $output;
	}
	
	/* Color picker field */
	function as_field_color_picker($field_id, $block_id, $color, $default = '') {
		$output = '<div class="aspb-color-picker">';
			$output .= '<input type="text" id="'. $block_id .'_'.$field_id.'" class="input-color-picker" value="'. $color .'" name="as_blocks['.$block_id.']['.$field_id.']" data-default-color="'. $default .'"/>';
		$output .= '</div>';
		
		return $output;
	}
	
	/* Color picker field in*/
	function as_field_color_picker_in($id, $name, $color, $default = '') {
		$output = '<div class="aspb-color-picker">';
			$output .= '<input type="text" id="'. $id .'" class="input-color-picker" value="'. $color .'" name="'. $name .'" data-default-color="'. $default .'"/>';
		$output .= '</div>';
		
		return $output;
	}
	
	/* Single Checkbox */
	function as_field_checkbox($field_id, $block_id, $check) {
		$output = '<input type="hidden" name="as_blocks['.$block_id.']['.$field_id.']" value="0" />';
		$output .= '<input type="checkbox" id="'. $block_id .'_'.$field_id.'" class="input-checkbox" name="as_blocks['.$block_id.']['.$field_id.']" '. checked( 1, $check, false ) .' value="1"/>';
		
		return $output;
	}
	
	/* Checkbox in */
	function as_field_checkbox_in($id, $name, $check) {
		$output = '<input type="hidden" name="'.$id.'" value="0" />';
		$output .= '<input type="checkbox" id="'. $id .'" class="input-checkbox" name="'.$name.'" '. checked( 1, $check, false ) .' value="1"/>';
		
		return $output;
	}
	
	/* Multi Checkbox */
	function as_field_multicheck($field_id, $block_id, $fields = array(), $selected = array()) {
	
	}
	
	/* Media Uploader */
	function as_field_upload($field_id, $block_id, $media, $media_type = 'image') {
		$output = '<input type="text" id="'. $block_id .'_'.$field_id.'" class="input-full input-upload" value="'.$media.'" name="as_blocks['.$block_id.']['.$field_id.']">';
		$output .= '<a href="#" class="as_upload_button button" rel="'.$media_type.'">Upload</a><p></p>';
		
		return $output;
	}
	
	/* Media Uploader in*/
	function as_field_upload_in($id, $name, $media, $media_type = 'image') {
		$output = '<input type="text" id="'. $id .'" class="input-full input-upload" value="'.$media.'" name="'.$name.'">';
		$output .= '<a href="#" class="as_upload_button button" rel="'.$media_type.'">Upload</a><p></p>';
		
		return $output;
	}
	
	/** 
	 * Misc Helper Functions
	**************************/
	
	/** Get column width
	 * @parameters - $size (column size), $grid (grid size e.g 940), $margin
	 */
	function as_get_column_width($size, $grid = 940, $margin = 20) {
		
		$columns = range(1,12);
		$widths = array();
		foreach($columns as $column) {
			$width = (( $grid + $margin ) / 12 * $column) - $margin;
			$width = round($width);
			$widths[$column] = $width;
		}
		
		$column_id = absint(preg_replace("/[^0-9]/", '', $size));
		$column_width = $widths[$column_id];
		return $column_width;
	}
	
	/** Recursive sanitize
	 * For those complex multidim arrays 
	 * Has impact on server load on template save, so use only where necessary 
	 */
	function as_recursive_sanitize($value) {
		if(is_array($value)) {
			$value = array_map('as_recursive_sanitize', $value);
		} else {
			$value = htmlspecialchars(stripslashes($value));
		}
		return $value;
	}
	
}