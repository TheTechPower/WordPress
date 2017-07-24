    <?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package aakanksha
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
	<?php if ( get_theme_mod('site_favicon') ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
	<?php endif; ?>
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="load_screen">
		<div id="loading">
            <div id="loader-wrapper">
			<div id="loader"></div>
            <div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
            </div>
        </div>
    </div>
  <?php if( is_front_page()){ ?>  
<!--<div id="page" class="hfeed site">-->
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aakanksha' ); ?></a>
    
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
            <div class="container">
                <div class="row">
				<div class="col-md-1 col-sm-2 col-xs-12">
		        <?php if ( get_theme_mod('site_logo') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
		        <?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	        
		        <?php endif; ?>
				</div>
				<div class="col-md-10 col-sm-9 col-xs-12">
					<div class="btn-menu"></div>
					<nav id="mainnav" class="mainnav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'main_nav', 'fallback_cb' => 'aakanksha_menu_fallback' ) ); ?>                
					</nav><!-- #site-navigation -->
                    
					</div>
                    <div class="col-md-1 col-sm-1 col-xs-12 nav-search">
                    <a href="#search" class="header-search-icon nav-search fa fa-search"></a>
                    </div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
        
<div id="search" class="nav-search">
    <button type="button" class="close">×</button>
    <form  class="search-form" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input type="text" name="s" placeholder="<?php echo esc_attr_x( __('Type your keyword(s) here', 'aakanksha'), 'search placeholder', 'aakanksha' ); ?>" />
        <button type="submit" name="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'aakanksha' ); ?>"><i class="fa fa-search"></i> Search</button>
    </form>
</div>
<section>
    <div id="home">
	<?php aakanksha_slider_template(); ?>  
	<div class="header-image">
		<?php aakanksha_header_overlay(); ?>
		<img class="header-inner" src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php bloginfo('name'); ?>">
	</div>
        </div>
    </section>
    <?php } ?>
	<!--<div id="content" class="page-wrap">
		<div class="container content-wrapper">
			<div class="row">	-->