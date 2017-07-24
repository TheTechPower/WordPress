<?php
/**
 * This file control heading title block
 *
 * @package    aakanksha
 * @package    AakankshaThemes
 */

// HEADING TITLE BLOCK
if( ! class_exists( 'as_Title_Heading' ) ) :

class as_Title_Heading extends as_Block {

	//set and create block
	function __construct() {
		$block_options = array(
			'name' => __( 'AT Heading Title', 'aakanksha'),
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('as_Title_Heading', $block_options);
	}

 	function form($instance) {
		
		$defaults = array(
			'title' 		=> '',
			'sub_title' 	=> '',
			'duration' 		=> '900',
			'delay' 		=> '0',
			'animation' 	=> '',
			'margin_top' 	=> '10',
			'margin_bottom' => '10',
			'bg_color' 		=> '#fafafa',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		global $include_animation ;
		?>
        <div class="sortable-body">
        	<p class="description">
                <label for="<?php echo $this->get_field_id('margin_top') ?>">
                    <?php _e( 'Margin top', 'aakanksha');?> 
                    <?php echo as_field_input('margin_top', $block_id, $margin_top, 'min', 'number') ?> px
                </label>&nbsp;-&nbsp;
                <label for="<?php echo $this->get_field_id('margin_bottom') ?>">
                    <?php _e( 'Margin bottom', 'aakanksha');?>
                    <?php echo as_field_input('margin_bottom', $block_id, $margin_bottom, 'min', 'number') ?> px
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('title') ?>">
                    <?php _e( 'Title', 'aakanksha');?>
                    <?php echo as_field_input('title', $block_id, $title, $size = 'full') ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('sub_title') ?>">
                    <?php _e( 'SubTitle', 'aakanksha');?>
                    <?php echo as_field_textarea('sub_title', $block_id, $sub_title, $size = 'full') ?>
            	</label>
            </p>  
            <p class="description">
                <label for="<?php echo $this->get_field_id('bg_color') ?>">
                    <?php _e( 'Color of title(Ex : #fafafa;)', 'aakanksha');?>
                    <?php echo as_field_color_picker('bg_color', $block_id, $bg_color) ?>
                </label>
            </p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('animation') ?>">
                    <?php _e( 'Animation style', 'aakanksha');?><br/>
                    <?php echo as_field_select('animation', $block_id, $include_animation , $animation) ?>
                </label>
           	</p>
            <p class="description">
                <label for="<?php echo $this->get_field_id('duration') ?>">
                    <?php _e( 'Animation Duration(Ex : 900ms)', 'aakanksha');?>
                    <?php echo as_field_input('duration', $block_id, $duration, 'min', 'number') ?> ms
                </label>&nbsp;&nbsp; - &nbsp;
				<label for="<?php echo $this->get_field_id('delay') ?>">
                    <?php _e( 'Time Delay (Ex : 900ms)', 'aakanksha');?>
                    <?php echo as_field_input('delay', $block_id, $delay, 'min', 'number') ?> ms
                </label>
            </p>
        </div>
		<?php
	}

	function block($instance) {
		$bg_color = '';
		extract($instance);
		$animation_effect 	='';
		$duration_effect  	='';
		if($animation) $animation_effect = 'animated '.$animation.'';
		if($duration != '' && $animation != '') $duration_effect = 'style="-webkit-animation-duration: '.$duration.'ms; -moz-animation-duration: '.$duration.'ms; -o-animation-duration: '.$duration.'ms;animation-duration: '.$duration.'ms; animation-delay:'.$delay.'ms; -webkit-animation-delay:'.$delay.'ms; -moz-animation-delay:'.$delay.'ms;-o-animation-delay:'.$delay.'ms;"';
		echo '
			<div class="heading-title-wrapper '.$animation_effect.'" '.$duration_effect.'>
				<h2 class="title" style="color:'.$bg_color.'">'.$title.'</h2>
				<span class="sub-title">'.$sub_title.'</span>
			</div>';
	}
	//<span class="line-title" style="background-color:'.$bg_color.'"></span>
 	function before_block($instance) {
		extract($instance);
		echo '<div class="animation-wrapper col-md-12" style="margin:'.$margin_top.'px 0 '.$margin_bottom.'px;" >';		
	}

	function after_block($instance) {
 		extract($instance);
 		echo '</div><!-- END at-HEADING-TITLE-BLOCK -->';
	}

}

as_register_block( 'as_Title_Heading' );
endif;