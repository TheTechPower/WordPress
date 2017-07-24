<?php
/**
 * Form fields helper class for Page Builder
 *
 * The as_Fields class contains some of the most common
 * form elements that theme authors shall need to create
 * their own custom blocks
 *
 * @package Page Builder
 * @since 1.0.7
 */
 
if(!class_exists('as_Fields')) {
	class as_Fields {
		
		/** Constructor */
		function __construct($type, $args = array()) {
			
			if($type) return false;
			
			if(method_exists($this, $type)) {
				$this->$type($args = array());
			}
			
		}
		
		function input($args) {
		
		}
		
	}
}