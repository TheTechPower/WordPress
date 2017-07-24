<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package aakanksha
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function aakanksha_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'aakanksha_jetpack_setup' );
