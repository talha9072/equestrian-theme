<?php
/**
 * Equestrian Theme functions and definitions
 */

function equestrian_theme_scripts() {
	// Enqueue the main stylesheet.
	wp_enqueue_style( 'equestrian-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // If you have extra scripts, enqueue them here.
}
add_action( 'wp_enqueue_scripts', 'equestrian_theme_scripts' );

/**
 * Add theme support for block styles.
 */
function equestrian_theme_support() {
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'equestrian_theme_support' );
