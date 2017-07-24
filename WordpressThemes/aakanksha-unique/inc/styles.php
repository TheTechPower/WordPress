<?php
/**
 * @package aakanksha
 */

//Converts hex colors to rgba for the menu background color
function aakanksha_hex2rgba($color, $opacity = false) {

        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map('hexdec', $hex);
        //$opacity = 0.9;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        return $output;
}

//Dynamic styles
function aakanksha_custom_styles($custom) {

	$custom = '';
	//Header
	if ( (get_theme_mod('front_header_type','slider') == 'nothing' && is_front_page()) || (get_theme_mod('site_header_type') == 'nothing' && !is_front_page()) ) {
		$menu_bg_color = get_theme_mod( 'menu_bg_color', '#000000' );
		$rgba 	= aakanksha_hex2rgba($menu_bg_color, 0.9);
		$custom .= ".site-header { position:relative;background-color:" . esc_attr($rgba) . ";}" . "\n";
		$custom .= ".admin-bar .site-header,.admin-bar .site-header.float-header { top:0;}"."\n";
		$custom .= ".site-header.fixed {position:relative;}"."\n";
		$custom .= ".site-header.float-header {padding:20px 0;}"."\n";
	}
	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
    $menus_fonts = get_theme_mod('menu_font_family');
    $body_color = get_theme_mod('body_color');	
	$menu_color = get_theme_mod('menu_color');
    $heading_color = get_theme_mod('heading_color');
	if ( $body_fonts !='' ) {
		$custom .= "body { font-family:" . $body_fonts . "!important;}"."\n";
	}
    if ( $body_color !='' ) {
		$custom .= "body { color:" . $body_color . "!important;}"."\n";
	}
    
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6, .portfolio-info, .roll-testimonials .name, .roll-team .team-content .name, .roll-team .team-item .team-pop .name, .roll-tabs .menu-tab li a, .roll-testimonials .name, .roll-project .project-filter li a, .roll-button, .roll-counter .name-count, .roll-counter .numb-count button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] { font-family:" . $headings_fonts . "!important;}"."\n";
	}
    if ( $heading_color !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6, .portfolio-info, .roll-testimonials .name, .roll-team .team-content .name, .roll-team .team-item .team-pop .name, .roll-tabs .menu-tab li a, .roll-testimonials .name, .roll-project .project-filter li a, .roll-button, .roll-counter .name-count, .roll-counter .numb-count button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] { color:" . $heading_color . "!important;}"."\n";
	}
    
    if ( $menus_fonts !='' ) {
		$custom .= "#mainnav ul li a, #mainnav ul ul a, #mainnav-mobi, .header-wrap, .site-title, .site-description { font-family:" . $menus_fonts . "!important;}"."\n";
	}
    if ( $menu_color !='' ) {
		$custom .= "#mainnav ul li a, #mainnav ul ul a, #mainnav-mobi, .header-wrap, .site-title, .site-description { color:" . $menu_color . "!important;}"."\n";
	}
    
    //Site title
    $site_title_size = get_theme_mod( 'site_title_size', '32' );
    if ($site_title_size) {
        $custom .= ".site-title { font-size:" . intval($site_title_size) . "px !important; }"."\n";
    }
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '16' );
    if ($site_desc_size) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px !important; }"."\n";
    }
    //Menu
    $menu_size = get_theme_mod( 'menu_size', '14' );
    if ($menu_size) {
        $custom .= "#mainnav ul li a { font-size:" . intval($menu_size) . "px !important; }"."\n";
    }    	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size','52' );
	if ($h1_size) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px !important; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size','42' );
    if ($h2_size) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px !important; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size','32' );
    if ($h3_size) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px !important; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size','25' );
    if ($h4_size) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px !important; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size','20' );
    if ($h5_size) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px !important; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size','18' );
    if ($h6_size) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px !important; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size', '14' );
    if ($body_size) {
        $custom .= "body { font-size:" . intval($body_size) . "px !important; }"."\n";
    }

	//Header image
	$header_bg_size = get_theme_mod('header_bg_size','cover');	
	$header_height = get_theme_mod('header_height','300');
	$custom .= ".header-image{ background-size:" . esc_attr($header_bg_size) . ";}"."\n";
	$custom .= ".header-image, .header-inner { height:" . intval($header_height) . "px !important; }"."\n";

	//Menu style
	$sticky_menu = get_theme_mod('sticky_menu','sticky');
	if ($sticky_menu == 'static') {
		$custom .= ".site-header.fixed { position: absolute !important;}"."\n";
	}
	$menu_style = get_theme_mod('menu_style','inline');
	if ($menu_style == 'centered') {
		$custom .= ".header-wrap .col-md-4, .header-wrap .col-md-8 { width: 100%; text-align: center;}"."\n";
		$custom .= "#mainnav { float: none;}"."\n";
		$custom .= "#mainnav li { float: none; display: inline-block;}"."\n";
		$custom .= "#mainnav ul ul li { display: block; text-align: left;}"."\n";
		$custom .= ".site-logo, .header-wrap .col-md-4 { margin-bottom: 15px; }"."\n";
		$custom .= ".btn-menu { margin: 0 auto; float: none; }"."\n";
	}	


	//__COLORS
	//Primary color
	$primary_color = get_theme_mod( 'primary_color', '#f71e1e' );
	if ( $primary_color != '#f71e1e' ) {
	$custom .= ".widget-area .widget_fp_social a,#mainnav ul li a:hover, .aakanksha_contact_info_widget span, .roll-team .team-content .name,.roll-team .team-item .team-pop .team-social li:hover a,.roll-infomation li.address:before,.roll-infomation li.phone:before,.roll-infomation li.email:before,.roll-testimonials .name,.roll-button.border,.roll-button:hover,.roll-icon-list .icon i,.roll-icon-list .content h3 a:hover,.roll-icon-box.white .content h3 a,.roll-icon-box .icon i,.roll-icon-box .content h3 a:hover,.switcher-container .switcher-icon a:focus, .hentry .meta-post a:hover,#mainnav > ul > li > a.active, #mainnav > ul > li > a:hover, button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover, .text-color, .social-menu-widget a, .social-menu-widget a:hover, .archive .team-social li a,  a:hover, .prev:hover, .next:hover, .close-port:hover i, .read-more:hover, .read-more i, .view-all-blog:hover, .view-all-blog:hover span i, .btn.get-in-touch:hover, .at-post-data-left.single-blog a.home-icon:hover i, .form-submit input[type=\"submit\"]:hover, .social-footer li a:hover i, .contact-form-wrapper input[type=\"submit\"]:hover, #test_content .item .name-client, h1.title-blog a:hover, .btn.btn-oe:hover, a:focus, ul.portfolio-category li a:hover span.icon-categories i, ul.portfolio-category li a:hover, ul.portfolio-category li a.active span.icon-categories i, ul.portfolio-category li a.active { color:" . esc_attr($primary_color) . "!important}"."\n";
	$custom .= ".preloader .pre-bounce1, .preloader .pre-bounce2,.roll-team .team-item .team-pop,.roll-progress .progress-animate,.roll-socials li a:hover,.roll-project .project-item .project-pop,.roll-project .project-filter li.active,.roll-project .project-filter li:hover,.roll-button.light:hover,.roll-button.border:hover,.roll-button,.roll-icon-box.white .icon,.owl-theme .owl-controls .owl-page.active span,.owl-theme .owl-controls.clickable .owl-page:hover span,.go-top,.bottom .socials li:hover a,.sidebar .widget:before,.blog-pagination ul li.active,.blog-pagination ul li:hover a,.content-area .hentry:after,.text-slider .maintitle:after,.error-wrap #search-submit:hover,#mainnav .sub-menu li:hover > a,#mainnav ul li ul:after, button, input[type=\"button\"], input[type=\"reset\"], .panel-grid-cell .widget-title:after, .social-share.single-blog-share ul.social li a:hover, .button-video { background-color:" . esc_attr($primary_color) . "!important}"."\n";
	$custom .= ".roll-socials li a:hover,.roll-socials li a,.roll-button.light:hover,.roll-button.border,.roll-button,.roll-icon-list .icon,.roll-icon-box .icon,.owl-theme .owl-controls .owl-page span,.comment .comment-detail,.widget-tags .tag-list a:hover,.blog-pagination ul li,.hentry blockquote,.error-wrap #search-submit:hover,textarea:focus,input[type=\"text\"]:focus,input[type=\"password\"]:focus,input[type=\"datetime\"]:focus,input[type=\"datetime-local\"]:focus,input[type=\"date\"]:focus,input[type=\"month\"]:focus,input[type=\"time\"]:focus,input[type=\"week\"]:focus,input[type=\"number\"]:focus,input[type=\"email\"]:focus,input[type=\"url\"]:focus,input[type=\"search\"]:focus,input[type=\"tel\"]:focus,input[type=\"color\"]:focus, button, input[type=\"button\"], input[type=\"reset\"], .archive .team-social li a, .close-port:hover, .view-all-blog:hover span, .btn.get-in-touch:hover, .image-blog-wrapper, .at-post-data-left.single-blog a.home-icon:hover, .form-submit input[type=\"submit\"]:hover, .contact-form-wrapper input[type=\"submit\"]:hover, .btn.btn-oe:hover, .popup-video:hover .icon-play-video, .blog-filer ul li.active a, .blog-filer ul li:hover a, .roll-button, .button-video, input[type=\"submit\"]:hover, input[type=\"submit\"], ul.portfolio-category li a:hover span.icon-categories, ul.portfolio-category li a.active span.icon-categories { border-color:" . esc_attr($primary_color) . "!important}"."\n";
    $custom .= "#loader, #loader:after, #loader:before {border-top-color:" . esc_attr($primary_color) . "!important}"."\n";
    $custom .= ".owl-theme .owl-controls.clickable .owl-buttons div:hover, .pricing-sign-up:hover, .blog-filer ul li.active a, .blog-filer ul li:hover a, input[type=\"submit\"], .social-share ul.social li a:hover {background:" . esc_attr($primary_color) . "!important}"."\n";   
    $hover_rgba = aakanksha_hex2rgba($primary_color, 0.4);
    $custom .= "#portfolio_list div.item a div.hover {background:" . esc_attr($hover_rgba) . "!important}"."\n";        
	}
	//Menu background
	$menu_bg_color = get_theme_mod( 'menu_bg_color', '#000000' );
	$rgba = aakanksha_hex2rgba($menu_bg_color, 0.9);
	$custom .= ".site-header.float-header { background-color:" . esc_attr($rgba) . "!important;}" . "\n";
	$custom .= "@media only screen and (max-width: 1024px) { .site-header { background-color:" . esc_attr($menu_bg_color) . "!important;}}" . "\n";
	//Site title
	$site_title = get_theme_mod( 'site_title_color', '#ffffff' );
	$custom .= ".site-title a, .site-title a:hover { color:" . esc_attr($site_title) . "}"."\n";
	//Site desc
	$site_desc = get_theme_mod( 'site_desc_color', '#ffffff' );
	$custom .= ".site-description { color:" . esc_attr($site_desc) . "}"."\n";
	//Top level menu items color
	$top_items_color = get_theme_mod( 'top_items_color', '#f71e1e' );
	$custom .= "#mainnav ul li a, .nav-search a, #mainnav ul li::before, #mainnav ul li a:hover, #mainnav ul li a.active, .btn-menu { color:" . esc_attr($top_items_color) . "!important;  border-bottom-color:". esc_attr($top_items_color) ."!important;}"."\n";
	//Sub menu items color
	$submenu_items_color = get_theme_mod( 'submenu_items_color', '#ffffff' );
	$custom .= "#mainnav .sub-menu li a { color:" . esc_attr($submenu_items_color) . "!important}"."\n";
	//Sub menu background
	$submenu_background = get_theme_mod( 'submenu_background', '#1c1c1c' );
	$custom .= "#mainnav .sub-menu li a { background:" . esc_attr($submenu_background) . "!important}"."\n";
	//Header slider text
	$slider_text = get_theme_mod( 'slider_text', '#ffffff' );
	$custom .= ".text-slider .maintitle, .text-slider .subtitle { color:" . esc_attr($slider_text) . "!important;}"."\n";
	//Body
	$body_text = get_theme_mod( 'body_text_color', '#767676' );
	$custom .= "body { color:" . esc_attr($body_text) . "}"."\n";
	//Sidebar background
	$sidebar_background = get_theme_mod( 'sidebar_background', '#ffffff' );
	$custom .= "#secondary { background-color:" . esc_attr($sidebar_background) . "}"."\n";
	//Sidebar color
	$sidebar_color = get_theme_mod( 'sidebar_color', '#767676' );
	$custom .= "#secondary, #secondary a, #secondary .widget-title { color:" . esc_attr($sidebar_color) . "}"."\n";	
	//Footer widget area background
	/*$footer_widgets_background = get_theme_mod( 'footer_widgets_background', '#252525' );
	$custom .= ".footer-widgets { background-color:" . esc_attr($footer_widgets_background) . "}"."\n";	*/
	//Footer widget area color
	/*$footer_widgets_color = get_theme_mod( 'footer_widgets_color', '#767676' );
	if ( $footer_widgets_color != '#767676' ) {
		$custom .= "#sidebar-footer,#sidebar-footer a,.footer-widgets .widget-title { color:" . esc_attr($footer_widgets_color) . "}"."\n";	
	}*/
	//Footer background
	/*$footer_background = get_theme_mod( 'footer_background', '#1c1c1c' );
	$custom .= ".site-footer { background-color:" . esc_attr($footer_background) . "}"."\n";*/	
	//Footer color
	/*$footer_color = get_theme_mod( 'footer_color', '#666666' );
	$custom .= ".site-footer,.site-footer a { color:" . esc_attr($footer_color) . "}"."\n";*/	
	//Rows overlay
	$rows_overlay = get_theme_mod( 'rows_overlay', '#000000' );
	$custom .= ".overlay { background-color:" . esc_attr($rows_overlay) . "}"."\n";	

	//Page wrapper padding
	$pw_top_padding = get_theme_mod( 'wrapper_top_padding', '83' );
	$pw_bottom_padding = get_theme_mod( 'wrapper_bottom_padding', '100' );
	$custom .= ".page-wrap { padding-top:" . intval($pw_top_padding) . "px;}"."\n";	
	$custom .= ".page-wrap { padding-bottom:" . intval($pw_bottom_padding) . "px;}"."\n";	

	//Output all the styles
	wp_add_inline_style( 'aakanksha-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'aakanksha_custom_styles' );