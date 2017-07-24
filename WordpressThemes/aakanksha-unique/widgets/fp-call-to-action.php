<?php

class aakanksha_Action extends WP_Widget {

    function aakanksha_action() {
		$widget_ops = array('classname' => 'aakanksha_action_widget', 'description' => __( 'Display a call to action block.', 'aakanksha') );
        parent::__construct(false, $name = __('aakanksha FP: Call to action', 'aakanksha'), $widget_ops);
		$this->alt_option_name = 'aakanksha_action_widget';
    }
	
	function form($instance) {
		$title     			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';		
		$action_text 		= isset( $instance['action_text'] ) ? esc_textarea( $instance['action_text'] ) : '';
		$action_btn_link 	= isset( $instance['action_btn_link'] ) ? esc_url( $instance['action_btn_link'] ) : '';
		$action_btn_text 	= isset( $instance['action_btn_text'] ) ? esc_html( $instance['action_btn_text'] ) : '';
		$inline 			= isset( $instance['inline'] ) ? (bool) $instance['inline'] : false;
	?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'aakanksha'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('action_text'); ?>"><?php _e('Enter your call to action.', 'aakanksha'); ?></label>
	<textarea class="widefat" id="<?php echo $this->get_field_id('action_text'); ?>" name="<?php echo $this->get_field_name('action_text'); ?>"><?php echo $action_text; ?></textarea></p>
	<p><label for="<?php echo $this->get_field_id('action_btn_link'); ?>"><?php _e('Link for the button', 'aakanksha'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('action_btn_link'); ?>" name="<?php echo $this->get_field_name('action_btn_link'); ?>" type="text" value="<?php echo $action_btn_link; ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('action_btn_text'); ?>"><?php _e('Title for the button', 'aakanksha'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('action_btn_text'); ?>" name="<?php echo $this->get_field_name('action_btn_text'); ?>" type="text" value="<?php echo $action_btn_text; ?>" /></p>
	<p><input class="checkbox" type="checkbox" <?php checked( $inline ); ?> id="<?php echo $this->get_field_id( 'inline' ); ?>" name="<?php echo $this->get_field_name( 'inline' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'inline' ); ?>"><?php _e( 'Display the button inline with the text?', 'aakanksha' ); ?></label></p>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			 = strip_tags($new_instance['title']);
		$instance['action_btn_link'] = esc_url_raw($new_instance['action_btn_link']);
		$instance['action_btn_text'] = strip_tags($new_instance['action_btn_text']);
		$instance['inline'] 		 = isset( $new_instance['inline'] ) ? (bool) $new_instance['inline'] : false;
		if ( current_user_can('unfiltered_html') ) {
			$instance['action_text'] = $new_instance['action_text'];
		} else {
			$instance['action_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['action_text']) ) );
		}			

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['aakanksha_action']) )
			delete_option('aakanksha_action');		  
		  
		return $instance;
	}
	
	function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'aakanksha_action', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title 			 = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			 = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$action_text 	 = isset( $instance['action_text'] ) ? $instance['action_text'] : '';
		$action_btn_link = isset( $instance['action_btn_link'] ) ? esc_url($instance['action_btn_link']) : '';
		$action_btn_text = isset( $instance['action_btn_text'] ) ? esc_html($instance['action_btn_text']) : '';
		$inline 		 = isset( $instance['inline'] ) ? $instance['inline'] : false;
		if ($inline == 1) {
			$aside_style = 'aside-style';
		} else {
			$aside_style = '';
		}

		echo $args['before_widget'];

		if ( $title ) echo $before_title . $title . $after_title;
?>
        <div class="roll-promobox <?php echo $aside_style; ?>">
			<div class="promo-wrap">
				<?php if ($action_text !='') : ?>
				<div class="promo-content">
					<h3 class="title"><?php echo $action_text; ?></h3>
				</div>
				<?php endif; ?>
				<div class="promo-controls">
					<a href="<?php echo esc_url($action_btn_link); ?>" class="roll-button border"><?php echo esc_html($action_btn_text); ?></a>
				</div>
			</div>
        </div>
	<?php

		echo $args['after_widget'];

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'aakanksha_action', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
	
}