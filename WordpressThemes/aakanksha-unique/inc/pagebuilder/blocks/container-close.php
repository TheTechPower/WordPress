<?php
/**
 * This file control close container block
 *
 * @package    aakanksha
 * @package    AakankshaThemes
 */

if( ! class_exists( 'as_Close_Container_Block') ) :

class as_Close_Container_Block extends as_Block {

	function __construct() {
		$block_options = array(
			'name' 		=> 'Container (close)',
			'size' 		=> 'span12',
			'resizable' => 0,
		);		
		parent::__construct( 'as_Close_Container_Block', $block_options );		
	}
	
	function form( $instance ){
		$defaults = array(
			'show_row'	=> 'true',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract( $instance );	
		$row = array(
			'true'	=> 'Yes',
			'false' => 'No'
		);	
		?>
		<p class="description">
			<?php _e( 'There is no setting here. Just make sure to add this block if you use container (open).', 'aakanksha' ); ?>
		</p>
        <p class="description">
			<label for="<?php echo $this->get_field_id('show_row') ?>">
				<?php _e( 'Show/hide section "row" (if you add block item fullwidth here, please choose "No" for 2 block "Container (open)" and "Container (close)")', 'aakanksha');?>
				<?php echo as_field_select('show_row', $block_id, $row, $show_row) ?>
			</label>
		</p>
		<?php
	}
	
	function block($instance) {
		extract( $instance );
		/** Show row */
		$row_class = '';
		if ( $show_row == 'true' ){ $row_class = '</div></div>' ; }
		echo "\n</div></section>".$row_class;
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

as_register_block( 'as_Close_Container_Block' );

endif;