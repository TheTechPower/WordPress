<?php
/**
 * Theme info page
 *
 * @package aakanksha
 */

//Add the theme page
add_action('admin_menu', 'aakanksha_add_theme_info');
function aakanksha_add_theme_info(){
	$theme_info = add_theme_page( __('aakanksha Info','aakanksha'), __('aakanksha Info','aakanksha'), 'manage_options', 'aakanksha-info.php', 'aakanksha_info_page' );
    add_action( 'load-' . $theme_info, 'aakanksha_info_hook_styles' );
}

//Callback
function aakanksha_info_page() {
?>
	<div class="info-container">
		<h2 class="info-title"><?php _e('aakanksha Info','aakanksha'); ?></h2>
		<div class="info-block"><div class="dashicons dashicons-desktop info-icon"></div><p class="info-text"><a href="http://thetechpower.com/aakanksha-unique" target="_blank"><?php _e('Theme demo','aakanksha'); ?></a></p></div>
		<div class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div><p class="info-text"><a href="http://thetechpower.com/blog/2016/07/15/aakanksha-unique-theme-documentation" target="_blank"><?php _e('Documentation','aakanksha'); ?></a></p></div>	
	</div>
<?php
}

//Styles
function aakanksha_info_hook_styles(){
   	add_action( 'admin_enqueue_scripts', 'aakanksha_info_page_styles' );
}
function aakanksha_info_page_styles() {
	wp_enqueue_style( 'aakanksha-info-style', get_template_directory_uri() . '/css/info-page.css', array(), true );
}