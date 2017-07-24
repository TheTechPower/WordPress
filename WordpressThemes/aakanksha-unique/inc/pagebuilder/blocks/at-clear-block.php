<?php
/**
 * This file control clear block
 *
 * @package    aakanksha
 * @package    AakankshaThemes
 */

// CLEAR BLOCK
if( ! class_exists( 'as_Clear_Block' ) ) :

class as_Clear_Block extends as_Block {

	function __construct() {
		$block_options = array(
			'name' => __( 'AT Clear', 'aakanksha'),
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('as_Clear_Block', $block_options);
	}

 	function form($instance) {
		
		$defaults = array(
			'height' => '0',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		?>
        <p class="description">
			<?php _e('* Note: height of Clear Block is equal to 0 when viewing on smart phone.', 'aakanksha'); ?>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('height') ?>">
				<?php _e('Height', 'aakanksha'); ?>
				<?php echo as_field_input('height', $block_id, $height, 'min', 'number') ?> px
			</label>
		</p>
        				
		<?php
	}

	function block($instance) {
		extract($instance);
		echo '<div class="clearfix" style="height:'.$height.'px"></div>';
		
	}
	
 	function before_block($instance) {
		extract($instance);
		return;
	}

	function after_block($instance) {
 		extract($instance);
 		return;
	}

}

as_register_block( 'as_Clear_Block' );
endif;