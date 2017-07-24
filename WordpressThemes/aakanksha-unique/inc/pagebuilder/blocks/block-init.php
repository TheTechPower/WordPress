<?php
/**
 * This file control all custom modules for Page Builder
 * 
 * Require Page Builder Plugin
 *
 * @package    aakanksha
 * @package    AakankshaThemes
 */

/** Include animation  */
$include_easing = array(
	'easeInSine' => 'easeInSine',
	'easeOutSine' => 'easeOutSine',
	'easeInOutSine' => 'easeInOutSine',
	'easeInQuad' => 'easeInQuad',
	'easeOutQuad' => 'easeOutQuad',
	'easeInOutQuad' => 'easeInOutQuad',
	'easeInCubic' => 'easeInCubic',
	'easeOutCubic' => 'easeOutCubic',
	'easeInOutCubic' => 'easeInOutCubic',
	'easeInQuart' => 'easeInQuart',
	'easeOutQuart' => 'easeOutQuart',
	'easeInOutQuart' => 'easeInOutQuart',
	'easeInQuint' => 'easeInQuint',
	'easeOutQuint' => 'easeOutQuint',
	'easeInOutQuint' => 'easeInOutQuint',
	'easeInExpo' => 'easeInExpo',
	'easeOutExpo' => 'easeOutExpo',
	'easeInOutExpo' => 'easeInOutExpo',
	'easeInCirc' => 'easeInCirc',
	'easeOutCirc' => 'easeOutCirc',
	'easeInOutCirc' => 'easeInOutCirc',
	'easeInBack' => 'easeInBack',
	'easeOutBack' => 'easeOutBack',
	'easeInOutBack' => 'easeInOutBack',
	'easeInElastic' => 'easeInElastic',
	'easeOutElastic' => 'easeOutElastic',
	'easeInOutElastic' => 'easeInOutElastic',
	'easeInBounce' => 'easeInBounce',
	'easeOutBounce' => 'easeOutBounce',
	'easeInOutBounce' => 'easeInOutBounce'
);
$include_animation = array(
	'' 				=> 'None',
	'flash' 		=> 'Flash',
	'tada' 			=> 'Tada',
	'wiggle' 		=> 'Wiggle',
	'shake' 		=> 'Shake',
	'swing' 		=> 'Swing',
	'pulse' 		=> 'Pulse',
	'bounce' 		=> 'Bounce',
	'wobble' 		=> 'Wobble',
	'flip' 			=> 'Flip',
	'flipInX' 		=> 'Flip In X',
	'flipInY'		=> 'Flip In Y',
	'flipOutX' 		=> 'Flip Out X',
	'flipOutY' 		=> 'Flip Out Y',
	'fadeIn' 		=> 'Fade In',
	'fadeInUp' 		=> 'Fade In Up',
	'fadeInDown' 	=> 'Fade In Down',
	'fadeInLeft' 	=> 'Fade In Left',
	'fadeInRight' 	=> 'Fade In Right',
	'fadeInUpBig' 	=> 'Fade In Up Big',
	'fadeInDownBig' => 'Fade In Down Big',
	'fadeInLeftBig' => 'Fade In Left Big',
	'fadeInRightBig'=> 'Fade In Right Big',
	'fadeOut' 		=> 'Fade Out',
	'fadeOutUp' 	=> 'Fade Out Up',
	'fadeOutDown' 	=> 'Fade Out Down',
	'fadeOutLeft' 	=> 'Fade Out Left',
	'fadeOutRight' 	=> 'Fade Out Right',
	'fadeOutUpBig' 	=> 'Fade Out Up Big',
	'fadeOutDownBig'=> 'Fade Out DownBig',
	'fadeOutLeftBig' => 'Fade Out Left Big',
	'fadeOutRightBig' => 'Fade Out Right Big',
	'bounceIn' => 'Bounce In',
	'bounceInUp' => 'Bounce In Up',
	'bounceInDown' => 'Bounce In Down',
	'bounceInLeft' => 'Bounce In Left',
	'bounceInRight' => 'Bounce In Right',
	'rotateIn' => 'Rotate In',
	'rotateInUpLeft' => 'Rotate In Up Left',
	'rotateInDownLeft' => 'Rotate In Down Left',
	'rotateInUpRight' => 'Rotate In Up Right',
	'rotateInDownRight' => 'Rotate In Down Right',
	'rotateOut' => 'Rotate Out',
	'rotateOutUpLeft' => 'Rotate Out Up Left',
	'rotateOutDownLeft' => 'Rotate Out Down Left',
	'rotateOutUpRight' => 'Rotate Out Up Right',
	'rotateOutDownRight' => 'Rotate Out Down Right',
	'lightSpeedIn' => 'Light Speed In',
	'lightSpeedOut' => 'Light Speed Out',
	'hinge' => 'Hinge',
	'rollIn' => 'Roll In',
	'rollOut' => 'Roll Out',
	'slideDown_special' => 'Slide Down Special',
	'slideUp_special' => 'Slide Up Special',
	'slideLeft_special' => 'Slide Left Special',
	'slideRight_special' => 'Slide Right Special',
	'slideExpandUp_special' => 'Slide ExpandUp Special',
	'expandUp_special' => 'Expand Up Special',
	'fadeIn_special' => 'Fade In Special',
	'expandOpen_special' => 'Expand Open Special',
	'bigEntrance_special' => 'Big Entrance Special',
	'hatch_special' => 'hatch Special',
	'bounce_special' => 'Bounce Special',
	'pulse_special' => 'Pulse Special',
	'floating_special' => 'Floating Special',
	'tossing_special' => 'Tossing Special',
	'pullUp_special' => 'Pull Up Special',
	'pullDown_special' => 'Pull Down Special',
	'stretchLeft_special' => 'Stretch Left Special',
	'stretchRight_special' => 'Stretch Right Special',
);

/** Define Directory Location Constants*/
if(!defined('aakanksha_DIR')) define( 'aakanksha_DIR', trailingslashit( get_template_directory() ) );
if(!defined('aakanksha_LIB_BLOCK_DIR')) define( 'aakanksha_LIB_BLOCK_DIR', aakanksha_DIR . trailingslashit( 'inc/pagebuilder/blocks' ) );

/** Define URI Location Constants */
if(!defined('aakanksha_URI')) define( 'aakanksha_URI', trailingslashit( get_template_directory_uri() ) );
if(!defined('aakanksha_LIB_URI')) define( 'aakanksha_LIB_URI', aakanksha_URI . trailingslashit( 'inc/pagebuilder/blocks' ) );		

/** Include custom custom block  */
include_once ( aakanksha_LIB_BLOCK_DIR . 'container-open.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'container-close.php');

include_once ( aakanksha_LIB_BLOCK_DIR . 'at-service-1-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-blog-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-portfolio-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-heading-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-timeline-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-clear-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-piechart-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-counter-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-client-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-testimonial-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-team-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-pricing.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-text.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-button-block.php');
include_once ( aakanksha_LIB_BLOCK_DIR . 'at-popup-video-block.php');
?>