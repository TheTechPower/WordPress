<?php
/**
 * This file control service 1 block
 *
 * @package    aakanksha
 * @package    AakankshaThemes
 */
 
// SERVICE STYLE 1 BLOCK
if(!class_exists('as_Service_Block')) :

class as_Service_Block extends as_Block {

	function __construct() {
		$block_options = array(
			'name' => __( 'AT Services', 'aakanksha'),
			'size' => 'span12',
		);
		
		//create the widget
		parent::__construct('as_Service_Block', $block_options);
		
		//add ajax functions
		add_action('wp_ajax_as_block_service_add_new', array($this, 'add_service'));
		
	}
	
	function form($instance) {
		$defaults = array(
			'services' => array(
				1 => array(
					'title' 	=> __('Add New Service', 'aakanksha'),
					'icon_font' => '',
					'content' 	=> '',
					'duration' 	=> '900',
					'delay' 	=> '0',
					'animation' => 'None',
				)
			),
			'column' 		=> 'three',
			'margin_top' 	=> 10,
			'margin_bottom' => 10,
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);

		$service_columns = array(
			'one' 	=> 'One Columns',
			'two' 	=> 'Two Columns',
			'three' => 'Three Columns',
			'four'	=> 'Four Columns',
		);
		?>
		<p class="description">
			<label for="<?php echo $this->get_field_id('column') ?>">
				<?php _e('Column size','aakanksha' ); ?>
				<?php echo as_field_select('column', $block_id, $service_columns, $column) ?>
			</label>
		</p>
		<p class="description">
			<label for="<?php echo $this->get_field_id('margin_top') ?>">
				<?php _e('Margin top','aakanksha' ); ?> 
				<?php echo as_field_input('margin_top', $block_id, $margin_top, 'min', 'number') ?> px
			</label>&nbsp;-&nbsp;
			<label for="<?php echo $this->get_field_id('margin_bottom') ?>">
				<?php _e('Margin bottom','aakanksha' ); ?>
				<?php echo as_field_input('margin_bottom', $block_id, $margin_bottom, 'min', 'number') ?> px
			</label>
		</p>
		<div class="description cf">
			<ul id="as-sortable-list-<?php echo $block_id ?>" class="as-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$services = is_array($services) ? $services : $defaults['services'];
				$count = 1;
				foreach($services as $service) {	
					$this->service($service, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="service" class="as-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		<?php
	}
	function service($service = array(), $count = 0) {
		
		global $include_animation ;
		?>
		<li id="<?php echo $this->get_field_id('services') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $service['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#"><?php _e('Open / Close','aakanksha' ); ?></a>
				</div>
			</div>
			
			<div class="sortable-body">
				<p class="service-desc description">
					<label for="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-title">
						<?php _e('Title','aakanksha' ); ?><br/>
						<input type="text" id="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('services') ?>[<?php echo $count ?>][title]" value="<?php echo $service['title'] ?>" />
					</label>
				</p>
				<p class="service-desc description">
					<label for="<?php echo $this->get_field_id('icon_font') ?>-<?php echo $count ?>-icon_font">
						<?php _e('Choose icon font','aakanksha' ); ?> <br/>
						<input type="text" id="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-icon_font" class="input-full show-icon" name="<?php echo $this->get_field_name('services') ?>[<?php echo $count ?>][icon_font]" value="<?php echo $service['icon_font'] ?>" />
					</label>
				</p>
                <p class="service-desc description">
                      <label for="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-animation">
                          <?php _e('Animation style','aakanksha' ); ?>
                          <?php echo as_field_select_in($this->get_field_id('services').'-'.$count.'-animation', $this->get_field_name('services').'['.$count.'][animation]', $include_animation, $service['animation']) ?>
                      </label>
                </p>
                <p class="service-desc description">
                      <label for="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-duration">
                          <?php _e('Duration for animation','aakanksha' ); ?>
                          <input type="number" id="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-duration" class="input-min" name="<?php echo $this->get_field_name('services') ?>[<?php echo $count ?>][duration]" value="<?php echo $service['duration'] ?>" />
                      </label>ms(Millisecond)&nbsp;-&nbsp;   
                      <label for="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-delay">
                          <?php _e('Time Delay', 'aakanksha' ); ?>
                          <input type="number" id="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-delay" class="input-min" name="<?php echo $this->get_field_name('services') ?>[<?php echo $count ?>][delay]" value="<?php echo $service['delay'] ?>" />
                      </label>ms(Millisecond)
                </p>
                <p class="testimonial-desc description">
                    <label for="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-content">
                        <?php _e('Content','aakanksha' ); ?><br/>
                        <textarea id="<?php echo $this->get_field_id('services') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('services') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $service['content'] ?></textarea>
                    </label>
                </p>
				
				<p class="service-desc description"><a href="#" class="sortable-delete"><?php _e('Delete','aakanksha' ); ?></a></p>
			</div>
			
		</li>
		<?php
	}
	
	function block($instance) {
		extract($instance);
		$i = 1;
		$output = '';
		$span = '';
		if($column == 'three') $span = 'col-md-4'; elseif($column == 'four') $span = 'col-md-3'; elseif($column == 'two') $span = 'col-md-6'; else $span= 'span12';
		foreach( $services as $service ){
			$animation_effect ='';
			$duration_effect  ='';
			if($service['animation']) $animation_effect = 'animated '.$service['animation'].'';
			if($service['duration'] != '' && $service['animation'] != '') $duration_effect = 'style="-webkit-animation-duration: '.$service['duration'].'ms; -moz-animation-duration: '.$service['duration'].'ms; -o-animation-duration: '.$service['duration'].'ms;animation-duration: '.$service['duration'].'ms; animation-delay:'.$service['delay'].'ms; -webkit-animation-delay:'.$service['delay'].'ms; -moz-animation-delay:'.$service['delay'].'ms;-o-animation-delay:'.$service['delay'].'ms;"';
			$output .='
				<div class="'.$span.' '.$animation_effect.'" '.$duration_effect.'>
					<div class="service-wrapper">
						<span class="icon"><i class="fa '.$service['icon_font'].'"></i></span>
						<h2 class="title">'.$service['title'].'</h2>
						<p>'.$service['content'].'</p>
					</div>
				</div>
			';
			
			if($i%2 == 0 && $i != sizeof($services) && $span == 'col-md-6') $output .= '<div class="clear"></div>';
			if($i%3 == 0 && $i != sizeof($services) && $span == 'col-md-4') $output .= '<div class="clear"></div>';	
			if($i%4 == 0 && $i != sizeof($services) && $span == 'col-md-3') $output .= '<div class="clear"></div>';
			$i++;
		}
		echo $output;
	}
	
	/* AJAX add service */
	function add_service() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aspb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'as-block-9999';
		
		//default key/value for the service
		$service = array(
			'title' 	=> __('Add New Service','aakanksha'),
			'icon_font' => '',
			'content' 	=> '',
			'duration' 	=> '900',
			'delay' 	=> '0',
			'animation' => 'None',
		);
		
		if($count) {
			$this->service($service, $count);
		} else {
			die(-1);
		}
		
		die();
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = as_recursive_sanitize($new_instance);
		return $new_instance;
	}

	function before_block($instance) {
		extract($instance);
		echo '<div class="list-services-wrapper animation-wrapper" style="margin:'.$margin_top.'px 0 '.$margin_bottom.'px;">';
	}

	function after_block($instance) {
 		extract($instance);
 		echo '</div><!-- END at-SERVICES-BLOCK -->';
	}
 	
}

as_register_block( 'as_Service_Block' );

endif;