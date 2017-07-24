<?php   

/*-----------------------------------------------------------------------------------*/
/* TGM REQUIRE inc
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory(). '/inc/class-tgm-plugin-activation.php';
/*-----------------------------------------------------------------------------------*/
/* Page Builder Plugin ver 1.0.8
/*-----------------------------------------------------------------------------------*/

if(!defined('aspb_VERSION')) define( 'aspb_VERSION', '1.0.8' );
if(!defined('aspb_PATH')) 	 define( 'aspb_PATH', get_template_directory() . '/inc/pagebuilder/' );
if(!defined('aspb_DIR')) 	 define( 'aspb_DIR', get_template_directory_uri() . '/inc/pagebuilder/' );

// Required functions & classes
require_once(aspb_PATH . 'functions/aspb_config.php');
require_once(aspb_PATH . 'functions/aspb_blocks.php');
require_once(aspb_PATH . 'classes/class-as-page-builder.php');
require_once(aspb_PATH . 'classes/class-as-block.php');
require_once(aspb_PATH . 'functions/aspb_functions.php');

// Register blocks
require_once( get_template_directory() . '/inc/pagebuilder/blocks/block-init.php' );

$aspb_config 	 = as_page_builder_config();
$as_page_builder = new as_Page_Builder($aspb_config);

if(!is_network_admin()) $as_page_builder->init();

/*-----------------------------------------------------------------------------------*/
/* ReduxFramework Admin Panel
/*-----------------------------------------------------------------------------------*/

/*if ( !class_exists( 'ReduxFramework' ) ) {
 require_once( get_template_directory() . '/inc/admin-core/framework.php' );
}

if ( !isset( $redux_demo ) ) {
 require_once( get_template_directory() . '/inc/admin-core/admin-config.php' );
}*/

//include template functions:
require_once( get_template_directory() . '/inc/template.php' );
/*
	====================================
		Include Scripts
	=====================================
*/
/**
 * aakanksha functions and definitions
 *
 * @package aakanksha
 */

if ( ! function_exists( 'aakanksha_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function aakanksha_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on aakanksha, use a find and replace
	 * to change 'aakanksha' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'aakanksha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('aakanksha-large-thumb', 830);
	add_image_size('aakanksha-medium-thumb', 550, 400, true);
	add_image_size('aakanksha-small-thumb', 230);
	add_image_size('aakanksha-service-thumb', 350);

	// This theme uses wp_nav_menu() in one location.
	/*register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'aakanksha' ),
	) );*/

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
     */

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'aakanksha_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // aakanksha_setup
add_action( 'after_setup_theme', 'aakanksha_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function aakanksha_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'aakanksha' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'aakanksha' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	//Register the front page widgets
	if ( function_exists('siteorigin_panels_activate') ) {
		register_widget( 'aakanksha_List' );
		register_widget( 'aakanksha_Services_Type_A' );
		register_widget( 'aakanksha_Services_Type_B' );
		register_widget( 'aakanksha_Facts' );
		register_widget( 'aakanksha_Clients' );
		register_widget( 'aakanksha_Testimonials' );
		register_widget( 'aakanksha_Skills' );
		register_widget( 'aakanksha_Action' );
		register_widget( 'aakanksha_Video_Widget' );
		register_widget( 'aakanksha_Social_Profile' );
		register_widget( 'aakanksha_Employees' );
		register_widget( 'aakanksha_Latest_News' );
		register_widget( 'aakanksha_Contact_Info' );
	}

}
add_action( 'widgets_init', 'aakanksha_widgets_init' );

/**
 * Load the front page widgets.
 */
if ( function_exists('siteorigin_panels_activate') ) {
	require get_template_directory() . "/widgets/fp-list.php";
	require get_template_directory() . "/widgets/fp-services-type-a.php";
	require get_template_directory() . "/widgets/fp-services-type-b.php";
	require get_template_directory() . "/widgets/fp-facts.php";
	require get_template_directory() . "/widgets/fp-clients.php";
	require get_template_directory() . "/widgets/fp-testimonials.php";
	require get_template_directory() . "/widgets/fp-skills.php";
	require get_template_directory() . "/widgets/fp-call-to-action.php";
	require get_template_directory() . "/widgets/video-widget.php";
	require get_template_directory() . "/widgets/fp-social.php";
	require get_template_directory() . "/widgets/fp-employees.php";
	require get_template_directory() . "/widgets/fp-latest-news.php";
	require get_template_directory() . "/widgets/contact-info.php";
}

/**
 * Enqueue scripts and styles.
 */
function aakanksha_scripts() {

	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'aakanksha-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) ); 
	} else {
	    wp_enqueue_style( 'aakanksha-body-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'aakanksha-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) ); 
	} else {
	    wp_enqueue_style( 'aakanksha-headings-fonts', '//fonts.googleapis.com/css?family=Raleway:400,500,600'); 
	}	

	wp_enqueue_style( 'aakanksha-style', get_stylesheet_uri() );

	wp_enqueue_style( 'aakanksha-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );		

    wp_enqueue_style( 'aakanksha-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
    
    wp_enqueue_style( 'aakanksha-font', get_template_directory_uri() . '/fonts/font-aakanksha.css' );
    
	wp_enqueue_style( 'aakanksha-ie9', get_template_directory_uri() . '/css/ie9.css', array( 'aakanksha-style' ) );
	wp_style_add_data( 'aakanksha-ie9', 'conditional', 'lte IE 9' );	

	wp_enqueue_script( 'aakanksha-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true );

    wp_enqueue_script( 'aakanksha-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'),'', true );
    
	wp_enqueue_script( 'aakanksha-main', get_template_directory_uri() . '/js/main.js', array('jquery'),'', true );

	wp_enqueue_script( 'aakanksha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( get_theme_mod('blog_layout') == 'masonry-layout' && (is_home() || is_archive()) ) {

		wp_enqueue_script( 'aakanksha-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('jquery-masonry'),'', true );		
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aakanksha_scripts' );

/**
 * Enqueue Bootstrap
 */
function aakanksha_enqueue_bootstrap() {
	//wp_enqueue_style( 'aakanksha-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'aakanksha_enqueue_bootstrap', 9 );

/**
 * Change the excerpt length
 */
function aakanksha_excerpt_length( $length ) {
  
  $excerpt = get_theme_mod('exc_lenght', '55');
  return $excerpt;

}
add_filter( 'excerpt_length', 'aakanksha_excerpt_length', 999 );

/**
 * Blog layout
 */
function aakanksha_blog_layout() {
	$layout = get_theme_mod('blog_layout','classic');
	return $layout;
}

/**
 * Menu fallback
 */
function aakanksha_menu_fallback() {
	echo '<a class="menu-fallback" href="' . admin_url('nav-menus.php') . '">' . __( 'Create your menu here', 'aakanksha' ) . '</a>';
}

/**
 * Header image overlay
 */
function aakanksha_header_overlay() {
	$overlay = get_theme_mod( 'hide_overlay', 0);
	if ( !$overlay ) {
		echo '<div class="overlay"></div>';
	}
}

/**
 * Polylang compatibility
 */
if ( function_exists('pll_register_string') ) :
function aakanksha_polylang() {
	for ( $i=1; $i<=5; $i++) {
		pll_register_string('Slide title ' . $i, get_theme_mod('slider_title_' . $i), 'aakanksha');
		pll_register_string('Slide subtitle ' . $i, get_theme_mod('slider_subtitle_' . $i), 'aakanksha');
	}
	pll_register_string('Slider button text', get_theme_mod('slider_button_text'), 'aakanksha');
	pll_register_string('Slider button URL', get_theme_mod('slider_button_url'), 'aakanksha');
}
add_action( 'admin_init', 'aakanksha_polylang' );
endif;

 /**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Page builder support
 */
require get_template_directory() . '/inc/page-builder.php';

/**
 * Slider
 */
require get_template_directory() . '/inc/slider.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';


/**
 * Woocommerce basic integration
 */
require get_template_directory() . '/inc/woocommerce.php'; 
	
	function aakanksha_script_enqueue(){
	//css
	wp_enqueue_style('style', get_stylesheet_uri());
	//js
	wp_enqueue_script('jquery', true);
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-2.1.3.min.js', array(), '2.1.3',  true);
        
	wp_enqueue_script('jquery.scrollify', get_template_directory_uri().'/js/jquery.scrollify.js', array(), '0.1.12', true);
	wp_enqueue_script('functionsjs', get_template_directory_uri().'/js/functions.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery.easing', get_template_directory_uri().'/js/jquery.easing.min.js', array(), '1.3', true);
	//wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '1.3', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3.3.6', true);
    //wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array(), '1.3', true);
}		
		add_action('wp_enqueue_scripts', 'aakanksha_script_enqueue');
/*-----------------------------------------------------------------------------------*/
/* Declared aakanksha Class
/*-----------------------------------------------------------------------------------*/
class aakanksha{
	function __construct(){
		add_action( 'init', 			  array($this,'theme_init') );
		add_action( 'wp_enqueue_scripts', array($this,'frontend_scripts') );
		add_action( 'add_meta_boxes', 	  array($this,'add_meta_boxes') );
		add_action( 'save_post', 	  	  array($this,'save_meta_boxes') );
		add_action( 'after_setup_theme',  array($this,'load_text_domain') );
		add_action( 'tgmpa_register' 	, array($this,'he_register_required_inc') );
		/* =============== ACTIONS AJAX =============== */
		add_action( 'wp_ajax_at_load_portfolio', array($this,'at_load_portfolio') );
		add_action( 'wp_ajax_nopriv_at_load_portfolio', array($this,'at_load_portfolio') );
		add_action( 'wp_ajax_et_like_post', array($this,'et_like_post') );
		add_action( 'wp_ajax_nopriv_et_like_post', array($this,'et_like_post') );
		add_action( 'wp_ajax_et_loadmore_post', array($this,'et_loadmore_post') );
		add_action( 'wp_ajax_nopriv_et_loadmore_post', array($this,'et_loadmore_post') );		
		/* =============== CUSTOM FIELDS FOR TAX =============== */		
		add_action( 'portfolio_cat_add_form_fields', array($this,'taxonomy_add_new_meta_field'), 10, 2 );
		add_action( 'portfolio_cat_edit_form_fields', array($this,'taxonomy_edit_meta_field'), 10, 2 );
		add_action( 'edited_portfolio_cat', array($this,'save_taxonomy_custom_meta'), 10, 2 );  
		add_action( 'create_portfolio_cat', array($this,'save_taxonomy_custom_meta'), 10, 2 );	
		/* =============== CUSTOM FIELDS FOR COMMENT =============== */
		add_filter('comment_form_default_fields', array($this,'modify_comment_form_fields'), 40 );
	}
	public function he_register_required_inc() {

	    $inc = array(
	        array(
	            'name'                  => 'Contact Form 7', 
	            'slug'                  => 'contact-form-7',
	            'required'              => true,
	        ),       	        
	    );
	 
	    // Change this to your theme text domain, used for internationalising strings
	    $theme_text_domain = 'aakanksha';
	 
	    $config = array(
	        'domain'            => 'aakanksha',
	        'default_path'      => '',                
	        'parent_menu_slug'  => 'themes.php',      
	        'parent_url_slug'   => 'themes.php',      
	        'menu'              => 'install-required-inc',
	        'has_notices'       => true,    
	        'is_automatic'      => false,   
	        'message'           => '',      
	        'strings'           => array(
	            'page_title'                                => __( 'Install Required inc', 'aakanksha' ),
	            'menu_title'                                => __( 'Install inc', 'aakanksha' ),
	            'installing'                                => __( 'Installing Plugin: %s', 'aakanksha' ), // %1$s = plugin name
	            'oops'                                      => __( 'Something went wrong with the plugin API.', 'aakanksha' ),
	            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following inc: %1$s.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following inc: %1$s.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s inc. Contact the administrator of this site for help on getting the inc installed.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required inc are currently inactive: %1$s.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended inc are currently inactive: %1$s.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s inc. Contact the administrator of this site for help on getting the inc activated.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following inc need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'aakanksha' ), // %1$s = plugin name(s)
	            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s inc. Contact the administrator of this site for help on getting the inc updated.', 'aakanksha' ), // %1$s = plugin name(s)
	            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing inc', 'aakanksha' ),
	            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed inc', 'aakanksha' ),
	            'return'                                    => __( 'Return to Required inc Installer', 'aakanksha' ),
	            'plugin_activated'                          => __( 'Plugin activated successfully.', 'aakanksha' ),
	            'complete'                                  => __( 'All inc installed and activated successfully. %s', 'aakanksha' ) // %1$s = dashboard link
	        )
	    );
	 
	    tgmpa( $inc, $config );
	 
	}

	public function modify_comment_form_fields($fields){

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );	
			
		$fields['author'] = '<p class="comment-form-author">'.
	                    
		'<input id="author" name="author" type="text" placeholder="Your name *" value="' . 
						
		esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
						
	    $fields['email'] = '<p class="comment-form-email">' .
	    
		'<input id="email" name="email" type="text" placeholder="Your email *" value="' . 
		
		esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
		
		$fields['url'] = '<p class="comment-form-url">'.
	    
		'<input id="url" name="url" type="text" placeholder="Website (Optional)" value="' . 
		
		esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	    return $fields;

	}
	public function load_text_domain(){
	    load_theme_textdomain('aakanksha', get_template_directory() . '/languages');
	}	
	/*-----------------------------------------------------------------------------------*/
	/* Register New Post Types & Taxonomies
	/*-----------------------------------------------------------------------------------*/		
	public function theme_init() {
		
		/*-----------------------------------------------------------------------------------*/
		/*	Register Menus
		/*-----------------------------------------------------------------------------------*/
		register_nav_menus(
			array(
			'main_nav'=>__('Main Nav', 'aakanksha'),
			)
		);
		register_nav_menus(
			array(
			'footer_nav'=>__('Footer Nav', 'aakanksha'),
			)
		);	
		
		$s_labels = array(
			'name'               => _x( 'Sliders', 'post type general name', 'aakanksha' ),
			'singular_name'      => _x( 'Slider', 'post type singular name', 'aakanksha' ),
			'menu_name'          => _x( 'Sliders', 'admin menu', 'aakanksha' ),
			'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'aakanksha' ),
			'add_new'            => _x( 'Add New', 'Slider', 'aakanksha' ),
			'add_new_item'       => __( 'Add New Slider', 'aakanksha' ),
			'new_item'           => __( 'New Slider', 'aakanksha' ),
			'edit_item'          => __( 'Edit Slider', 'aakanksha' ),
			'view_item'          => __( 'View Slider', 'aakanksha' ),
			'all_items'          => __( 'All Sliders', 'aakanksha' ),
			'search_items'       => __( 'Search Sliders', 'aakanksha' ),
			'parent_item_colon'  => __( 'Parent Sliders:', 'aakanksha' ),
			'not_found'          => __( 'No Sliders found.', 'aakanksha' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'aakanksha' ),
		);

		$s_args = array(
			'labels'             => $s_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'slider' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		/*register_post_type( 'slider', $s_args );*/

		$p_labels = array(
			'name'               => _x( 'Portfolios', 'post type general name', 'aakanksha' ),
			'singular_name'      => _x( 'Portfolio', 'post type singular name', 'aakanksha' ),
			'menu_name'          => _x( 'Portfolios', 'admin menu', 'aakanksha' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'aakanksha' ),
			'add_new'            => _x( 'Add New', 'Portfolio', 'aakanksha' ),
			'add_new_item'       => __( 'Add New Portfolio', 'aakanksha' ),
			'new_item'           => __( 'New Portfolio', 'aakanksha' ),
			'edit_item'          => __( 'Edit Portfolio', 'aakanksha' ),
			'view_item'          => __( 'View Portfolio', 'aakanksha' ),
			'all_items'          => __( 'All Portfolios', 'aakanksha' ),
			'search_items'       => __( 'Search Portfolios', 'aakanksha' ),
			'parent_item_colon'  => __( 'Parent Portfolios:', 'aakanksha' ),
			'not_found'          => __( 'No Portfolios found.', 'aakanksha' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'aakanksha' ),
		);

		$p_args = array(
			'labels'             => $p_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);
        
        $regsiter_post_type = 'register_' . 'post_type';
        
		$regsiter_post_type( 'portfolio', $p_args );	

		$test_labels = array(
			'name'               => _x( 'Testimonials', 'post type general name', 'aakanksha' ),
			'singular_name'      => _x( 'Testimonial', 'post type singular name', 'aakanksha' ),
			'menu_name'          => _x( 'Testimonials', 'admin menu', 'aakanksha' ),
			'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'aakanksha' ),
			'add_new'            => _x( 'Add New', 'Testimonial', 'aakanksha' ),
			'add_new_item'       => __( 'Add New Testimonial', 'aakanksha' ),
			'new_item'           => __( 'New Testimonial', 'aakanksha' ),
			'edit_item'          => __( 'Edit Testimonial', 'aakanksha' ),
			'view_item'          => __( 'View Testimonial', 'aakanksha' ),
			'all_items'          => __( 'All Testimonials', 'aakanksha' ),
			'search_items'       => __( 'Search Testimonials', 'aakanksha' ),
			'parent_item_colon'  => __( 'Parent Testimonials:', 'aakanksha' ),
			'not_found'          => __( 'No Testimonials found.', 'aakanksha' ),
			'not_found_in_trash' => __( 'No Testimonials found in Trash.', 'aakanksha' ),
		);

		$test_args = array(
			'labels'             => $test_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'testimonial' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		);

		$regsiter_post_type( 'testimonial', $test_args );	

		$t_labels = array(
			'name'               => _x( 'Teams', 'post type general name', 'aakanksha' ),
			'singular_name'      => _x( 'Team', 'post type singular name', 'aakanksha' ),
			'menu_name'          => _x( 'Teams', 'admin menu', 'aakanksha' ),
			'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'aakanksha' ),
			'add_new'            => _x( 'Add New', 'Team', 'aakanksha' ),
			'add_new_item'       => __( 'Add New Team', 'aakanksha' ),
			'new_item'           => __( 'New Team', 'aakanksha' ),
			'edit_item'          => __( 'Edit Team', 'aakanksha' ),
			'view_item'          => __( 'View Team', 'aakanksha' ),
			'all_items'          => __( 'All Teams', 'aakanksha' ),
			'search_items'       => __( 'Search Teams', 'aakanksha' ),
			'parent_item_colon'  => __( 'Parent Teams:', 'aakanksha' ),
			'not_found'          => __( 'No Teams found.', 'aakanksha' ),
			'not_found_in_trash' => __( 'No Teams found in Trash.', 'aakanksha' ),
		);

		$t_args = array(
			'labels'             => $t_labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title','thumbnail')
		);

		$regsiter_post_type( 'team', $t_args );	

		$tax_labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'aakanksha' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'aakanksha' ),
			'search_items'      => __( 'Search Categories', 'aakanksha' ),
			'all_items'         => __( 'All Categories', 'aakanksha' ),
			'parent_item'       => __( 'Parent Category', 'aakanksha' ),
			'parent_item_colon' => __( 'Parent Category:', 'aakanksha' ),
			'edit_item'         => __( 'Edit Category', 'aakanksha' ),
			'update_item'       => __( 'Update Category', 'aakanksha' ),
			'add_new_item'      => __( 'Add New Category', 'aakanksha' ),
			'new_item_name'     => __( 'New Category Name', 'aakanksha' ),
			'menu_name'         => __( 'Category', 'aakanksha' ),
		);

		$tax_args = array(
			'hierarchical'      => true,
			'labels'            => $tax_labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'portfolio-cat' ),
		);

        $regsiter_taxonomy = 'register_' . 'taxonomy';
        
		$regsiter_taxonomy( 'portfolio_cat', array( 'portfolio' ), $tax_args );	

		/*-----------------------------------------------------------------------------------*/
		/*	Register Images Size
		/*-----------------------------------------------------------------------------------*/
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_image_size( 'post-thumb', 570, 300, true );
		add_image_size( 'portfolio-thumb', 480, 480, true );
		add_image_size( 'portfolio-large', 770, 665, true );
	}	
	/*-----------------------------------------------------------------------------------*/
	/* Enqueue Js & Css
	/*-----------------------------------------------------------------------------------*/
	public function frontend_scripts() {
		/*============ Styles ============ */
		wp_enqueue_style( 'carousel-style',   get_template_directory_uri() . '/css/owl.carousel.css');
		wp_enqueue_style( 'bootstrap-style',  get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'animate',  		  get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style( 'font-awesome',  	  get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style( 'magnific-popup',  	  get_template_directory_uri() . '/css/magnific-popup.css');
		wp_enqueue_style( 'main-style', 	  get_stylesheet_uri() );
		wp_enqueue_style( 'custom',  		  get_template_directory_uri() . '/css/custom-css.php');		

		/*============ Javascripts ============ */
		wp_enqueue_script( 'backbone' );
		wp_enqueue_script( 'underscore' );
		wp_enqueue_script( 'bootstrap',  	get_template_directory_uri() . '/js/libs/bootstrap.min.js', array(), '3.1.1', true );
		wp_enqueue_script( 'modernizr',  	get_template_directory_uri() . '/js/libs/modernizr.custom.js', array(), '2.6.2', true );
		wp_enqueue_script( 'carousel', 	 	get_template_directory_uri() . '/js/libs/owl.carousel.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'slicknav', 	 	get_template_directory_uri() . '/js/libs/jquery.slicknav.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'waypoints',  	get_template_directory_uri() . '/js/libs/waypoints.min.js', array(), '2.0.3', true );
		wp_enqueue_script( 'sticky',  		get_template_directory_uri() . '/js/libs/waypoints-sticky.js', array(), '2.0.4', true );
		wp_enqueue_script( 'easypiechart',  get_template_directory_uri() . '/js/libs/jquery.easypiechart.min.js', array(), '2.1.0', true );
		wp_enqueue_script( 'counter',  		get_template_directory_uri() . '/js/libs/counter.js', array(), '1.0.0', true );
		wp_enqueue_script( 'hoverdir',  	get_template_directory_uri() . '/js/libs/jquery.hoverdir.js', array(), '1.1.0', true );
		wp_enqueue_script( 'classie',  		get_template_directory_uri() . '/js/libs/classie.js', array(), '1.1.0', true );
		wp_enqueue_script( 'easing',  		get_template_directory_uri() . '/js/libs/jquery.easing.min.js', array(), '1.0.0', true );
		wp_enqueue_script( 'scrollto',   	get_template_directory_uri() . '/js/libs/jquery.scrollTo.min.js', array(), '1.4.11', true );
		wp_enqueue_script( 'isotope',    	get_template_directory_uri() . '/js/libs/isotope.pkgd.min.js', array(), '1.4.11', true );
		wp_enqueue_script( 'magnific',    	get_template_directory_uri() . '/js/libs/jquery.magnific-popup.min.js', array(), '0.9.9', true );
        wp_enqueue_script( 'aakanksha-html5-scripts', get_template_directory_uri() . '/js/html5.js', array('jquery'),'', true );
        wp_enqueue_script( 'aakanksha-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'),'', true );
		wp_enqueue_script( 'front', 	 	get_template_directory_uri() . '/js/front.js', array('backbone','underscore'), '1.0.0', true );
		if(is_home() || is_category()){
			wp_enqueue_script( 'blog', 	 	get_template_directory_uri() . '/js/blog.js', array('backbone','underscore'), '1.0.0', true );
		}

		//register global variables
		$variables = array(
			'ajaxURL' 			=> admin_url('/admin-ajax.php'),
			'homeURL' 			=> home_url(),
		);
		?>
		<script type="text/javascript">
			as_globals = <?php echo json_encode($variables) ?>
		</script>
		<?php
	}
	/*-----------------------------------------------------------------------------------*/
	/* Taxonomy add meta field
	/*-----------------------------------------------------------------------------------*/
	public function taxonomy_add_new_meta_field() {
		// this will add the custom meta field to the add new term page
	?>
		<div class="form-field">
			<label for="term_meta[icon]"><?php _e( 'Portfolio Category Icon', 'aakanksha' ); ?></label>
			<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="">
			<p class="description"><?php _e( 'Enter a icon name for this field.( You can choose icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">here</a>)','aakanksha' ); ?></p>
		</div>
	<?php
	}
	public function taxonomy_edit_meta_field($term) {
	 
		// put the term ID into a variable
		$t_id = $term->term_id;
	 
		// retrieve the existing value(s) for this meta field. This returns an array
		$term_meta = get_option( "taxonomy_$t_id" ); ?>
		<tr class="form-field">
		<th scope="row" valign="top"><label for="term_meta[icon]"><?php _e( 'Portfolio Category Icon', 'aakanksha' ); ?></label></th>
			<td>
				<input type="text" name="term_meta[icon]" id="term_meta[icon]" value="<?php echo esc_attr( $term_meta['icon'] ) ? esc_attr( $term_meta['icon'] ) : ''; ?>">
				<p class="description"><?php _e( 'Enter a value for this field.(<a target="_blank" href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Example</a>)','aakanksha' ); ?></p>
			</td>
		</tr>
	<?php
	}
	public function save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_option( "taxonomy_$t_id" );
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			// Save the option array.
			update_option( "taxonomy_$t_id", $term_meta );
		}
	} 			
	/*-----------------------------------------------------------------------------------*/
	/* Add Metaboxes
	/*-----------------------------------------------------------------------------------*/	
	public function add_meta_boxes(){
		add_meta_box(
			'team_metabox',
			__( 'Team Infomation', 'aakanksha' ),
			array($this,'team_meta_box_callback'),
			'team',
			'normal',
			'high'
		);
		add_meta_box(
			'slider_metabox',
			__( 'Slider Data', 'aakanksha' ),
			array($this,'slider_meta_box_callback'),
			'slider',
			'normal',
			'high'
		);		
	}
	public function slider_meta_box_callback(){
		global $post;
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');		
		wp_nonce_field( 'as_post_nonce', 'as_post_nonce' );
		?>
		<label class="team-lbl" for="as_slider_bg"><?php _e('Slider Background Color:', 'aakanksha') ?></label>
		<input type="text" class="input-custom-field" name="as_slider_bg" id="as_slider_bg" value="<?php echo get_post_meta($post->ID, 'as_slider_bg', true) ?>"><br>
		<script type="text/javascript">
			jQuery(document).ready(function($){
			   $('#as_slider_bg').wpColorPicker();
			});
		</script>
		<style type="text/css">
			label.team-lbl {
				margin-top: 5px;
				margin-right: 10px;
				float: left;
			}
		</style>
		<?php
	}	
	public function team_meta_box_callback(){
		global $post;
		wp_nonce_field( 'as_post_nonce', 'as_post_nonce' );
		?>	
		<label class="team-lbl" for="as_team_position"><?php _e('Position:', 'aakanksha') ?></label>
		<input type="text" class="input-custom-field" name="as_team_position" id="as_team_position" placeholder="e.g: Co-Founder Creative Director"  value="<?php echo get_post_meta($post->ID, 'as_team_position', true) ?>"><br>

		<label class="team-lbl" for="as_team_fb"><?php _e('Facebook:', 'aakanksha') ?></label>
		<input type="url" class="input-custom-field" name="as_team_fb" id="as_team_fb" placeholder="http://" value="<?php echo get_post_meta($post->ID, 'as_team_fb', true) ?>"><br>

		<label class="team-lbl" for="as_team_tw"><?php _e('Twitter:', 'aakanksha') ?></label>
		<input type="url" class="input-custom-field" name="as_team_tw" id="as_team_tw" placeholder="http://" value="<?php echo get_post_meta($post->ID, 'as_team_tw', true) ?>"><br>

		<label class="team-lbl" for="as_team_db"><?php _e('Dribbble:', 'aakanksha') ?></label>
		<input type="url" class="input-custom-field" name="as_team_db" id="as_team_db" placeholder="http://" value="<?php echo get_post_meta($post->ID, 'as_team_db', true) ?>"><br>

		<label class="team-lbl" for="as_team_gplus"><?php _e('Google+:', 'aakanksha') ?></label>
		<input type="url" class="input-custom-field" name="as_team_gplus" id="as_team_gplus" placeholder="http://" value="<?php echo get_post_meta($post->ID, 'as_team_gplus', true) ?>"><br>
		<style type="text/css">
			input.input-custom-field{width: 300px;width: 300px;margin-bottom: 15px;margin-top: 15px;}label.team-lbl{display:inline-block;min-width: 70px;}
		</style>
		<?php
	}
	public function save_meta_boxes($post_id){
		if ( get_post_type( $post_id ) ==  'team' ){

			if ( ! isset( $_POST['as_post_nonce'] ) )
	    		return $post_id;

			if ( ! wp_verify_nonce( $_POST['as_post_nonce'], 'as_post_nonce' ) )
	      		return $post_id; 

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;

			if ( ! current_user_can( 'edit_post', $post_id ) )
	        	return $post_id; 

	        if(isset($_POST['as_team_position']))
				update_post_meta( $post_id, 'as_team_position', $_POST['as_team_position'] );   
	        if(isset($_POST['as_team_fb']))
				update_post_meta( $post_id, 'as_team_fb', $_POST['as_team_fb'] ); 			
	        if(isset($_POST['as_team_tw']))
				update_post_meta( $post_id, 'as_team_tw', $_POST['as_team_tw'] ); 
	        if(isset($_POST['as_team_db']))
				update_post_meta( $post_id, 'as_team_db', $_POST['as_team_db'] ); 			
	        if(isset($_POST['as_team_gplus']))
				update_post_meta( $post_id, 'as_team_gplus', $_POST['as_team_gplus'] ); 

		} 
		if ( get_post_type( $post_id ) ==  'slider' ){

			if ( ! isset( $_POST['as_post_nonce'] ) )
	    		return $post_id;

			if ( ! wp_verify_nonce( $_POST['as_post_nonce'], 'as_post_nonce' ) )
	      		return $post_id; 

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
				return;

			if ( ! current_user_can( 'edit_post', $post_id ) )
	        	return $post_id; 

	        if(isset($_POST['as_slider_bg']))
				update_post_meta( $post_id, 'as_slider_bg', $_POST['as_slider_bg'] );   

		}
		return $post_id;
	}
	/*-----------------------------------------------------------------------------------*/
	/* Ajax Like Post
	/*-----------------------------------------------------------------------------------*/	
	public function et_like_post(){
		$data = $_REQUEST['content'];
		$count = get_post_meta( $data['id'], 'at_like_count', true ) ? (int) get_post_meta( $data['id'], 'at_like_count', true ) : 0;
		$count++;
		$success = update_post_meta( $data['id'], 'at_like_count', $count );
		$response = array(
				'success' => $success,
				'count'   => get_post_meta( $data['id'], 'at_like_count', true )
			);
		wp_send_json( $response );
	}	
	/*-----------------------------------------------------------------------------------*/
	/* Ajax Portfolio
	/*-----------------------------------------------------------------------------------*/	
	public function at_load_portfolio(){
		$data = $_REQUEST['content'];
		$portfolio = get_post($data['id']);
		$cats = '';
		$terms = get_the_terms( $portfolio->ID, 'portfolio_cat' );
		foreach ($terms as $term) {
			$cats .= ' '.$term->name;
		}
		// Get sharing options & button get in touch
		$sharing_sites  	 = get_theme_mod('social_share_port');
		$get_in_touch  	     = get_theme_mod('btn_port_getintouch');
		$get_in_touch_link   = get_theme_mod('btn_port_getintouch_link');
		
		$twitter_share	= '';
		$fb_share 		= '';
		$google_share 	= '';
		$btn_get 		= '';
		
		if( $get_in_touch == 1 || $get_in_touch == true ) $btn_get = '<a href="'.$get_in_touch_link.'" class="btn get-in-touch">'.__('Get In Touch', 'aakanksha').'</a>';
		
		foreach ( $sharing_sites as $key => $value ) {
			
			// Twitter
			if ( $key == 'twitter' && $value ) {
				$twitter_share = '<li><a class="sb-twitter" href="http://twitter.com/share?url='.home_url().'/#portfolio-page&amp;lang=en&amp;text=Check%20out%20this%20awesome%20project:&amp;" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620\');return false;" data-count="none" data-via=" "><i class="fa fa-twitter"></i></a></li>';	
			}
			
			// Facebook
			if ( $key == 'facebook' && $value ) {
				$fb_share = '<li><a class="sb-facebook" href="http://www.facebook.com/sharer/sharer.php?u='.home_url().'/#portfolio-page" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660\');return false;" target="_blank"><i class="fa fa-facebook"></i></a></li>';
			}
			
			// Google+
			if ( $key == 'google_plus' && $value ) {
				$google_share = '<li><a class="sb-google" href="https://plus.google.com/share?url='.home_url().'" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500\');return false;"><i class="fa fa-google-plus"></i></a></li>';
			}
			
		}
		
		$html = '<div class="mask-color-port">
					<div id="preview-area">
		  <div id="loading">
            <div id="loader-wrapper">
			<div id="loader"></div>
            <div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
        </div>
    </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="title-port-wrapper col-md-12">
						<h1 class="title-port">'.$portfolio->post_title.'</h1>
						<span class="category">'.$cats.'</span>
					</div>
				</div>
				<div class="port-data">
					<div class="row">
						<div class="col-md-8 port-thumb">
							<div class="thumbnail-img">
								'.get_the_post_thumbnail( $portfolio->ID, 'portfolio-large' ).'
							</div>
						</div>
						<div class="col-md-4 port-excerpt">
							'.apply_filters( 'the_content', $portfolio->post_content ).'
							<div class="clearfix"></div>
							<div class="social-share">
								'.$btn_get.'
								<ul class="social">
									'.$fb_share.'
									'.$twitter_share.'
									'.$google_share.'
								</ul>
							</div>
						</div>
					</div>
				</div>';
		$response = array(
				'success'   => true,
				'html'	    => $html,
				'prev_post' => get_next_previous_port_id($portfolio->ID, 'next'),
				'next_post' => get_next_previous_port_id($portfolio->ID, 'prev'),
			);
		wp_send_json( $response );
	}
	public function et_loadmore_post(){

		$data = $_REQUEST['content'];
		$posts = array();
		global $post;
		$query = new WP_Query(array(
				'paged' => $data['page'],
				'post_type' => 'post'
			));
		if($query->have_posts()){
			while($query->have_posts()){
				$query->the_post();

				$posts[] = $post;
				$at_like_count = get_post_meta($post->ID, 'at_like_count', true) ? get_post_meta($post->ID, 'at_like_count', true) : 0;
				$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

				if ( comments_open() ) {
					if ( $num_comments == 0 ) {
						$comments = __('No Comments', 'aakanksha');
					} elseif ( $num_comments > 1 ) {
						$comments = $num_comments . __(' Comments', 'aakanksha');
					} else {
						$comments = __('1 Comment', 'aakanksha');
					}
					$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
				} else {
					$write_comments =  __('Comments are off for this post.', 'aakanksha');
				}			
				$post->html = '
					<div class="col-md-6 at-blog-post">
		            	<div class="image-blog-wrapper">
							'.get_the_post_thumbnail( $post->ID, 'full', array('class' => 'at-post-thumbnail img-responsive') ).'
		                </div>
						<div class="clearfix"></div>
						<div class="at-post-data container">
							<div class="row">
								<div class="col-md-2 at-post-data-left">
									<span class="at-post-month">'.get_the_time('M').'</span>
									<span class="at-post-date">'.get_the_time('d').'</span>
									<a href="#" data-id="'.$post->ID.'" class="at-like-post '.is_like_post($post->ID).'">
										<span class="at-post-heart"><i class="fa fa-heart"></i><span class="count">'.$at_like_count.'</span></span>
									</a>
								</div>
								<div class="col-md-10 at-post-data-right">
									<h1 class="title-blog">'.get_the_title().'</h1>
									<div class="at-post-info">
										'.__('Post by','aakanksha').get_the_author().' | '.get_the_category_list().' | '.$write_comments.'
									</div>
									<div class="clearfix"></div>
									<div class="at-post-excerpt">
										'.get_the_excerpt().'
									</div>
									<div class="clearfix"></div>
									<a href="'.get_permalink().'" class="read-more"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;'.__('Read more','aakanksha').'</a>
								</div>
							</div>
						</div>
					</div>			
						';
			}
			$response = array(
					'success'   	=> true,
					'posts'	    	=> $posts,
					'current_page'  => $data['page'],
				);
		} else {
			$response = array(
					'success'   => false,
				);	
		}
		wp_send_json( $response );
	}		
}

new aakanksha();
?>