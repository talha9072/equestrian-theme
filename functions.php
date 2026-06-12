<?php
/**
 * Equestrian Theme functions and definitions
 */

function equestrian_theme_scripts() {
	// Enqueue the main stylesheet.
	wp_enqueue_style( 'equestrian-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Explicitly enqueue assets/styles.css and header.css
    wp_enqueue_style( 'equestrian-theme-assets', get_template_directory_uri() . '/assets/styles.css', array(), '1.0.0' );
    wp_enqueue_style( 'equestrian-theme-header', get_template_directory_uri() . '/header.css', array(), '1.0.0' );
    
    // Enqueue original assets (Frontend only)
    if (!is_admin()) {
        wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), '1.0.0', true );
        wp_enqueue_script( 'equestrian-theme-app', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'equestrian_theme_scripts' );

// Ensure scripts are treated as modules (safer check)
add_filter('script_loader_tag', function($tag, $handle, $src) {
    if (in_array($handle, ['equestrian-theme-image-slot', 'equestrian-theme-app'])) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}, 10, 3);

/**
 * Add theme support for block styles.
 */
function equestrian_theme_support() {
	add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    
    // Load local styles into the editor
    add_editor_style( 'style.css' );
    add_editor_style( 'assets/styles.css' );
    add_editor_style( 'assets/editor-styles.css' );
}
add_action( 'after_setup_theme', 'equestrian_theme_support' );

/**
 * Enqueue editor assets.
 */
function equestrian_editor_assets() {
    // Load custom element script in the editor too - but only for the iframe
    wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), '1.0.0', true );
}
add_action( 'enqueue_block_editor_assets', 'equestrian_editor_assets' );

/**
 * Register block pattern categories and patterns manually to ensure 100% reliability.
 */
function equestrian_theme_register_patterns() {
    register_block_pattern_category(
        'equestrian-theme',
        array( 'label' => __( 'Equestrian Theme', 'equestrian-theme' ) )
    );

    $hero_php = get_theme_file_path( 'patterns/hero.php' );
    if ( file_exists( $hero_php ) ) {
        ob_start();
        include $hero_php;
        $pattern_content = ob_get_clean();
        
        // Strip the PHP comment header if present
        $pattern_content = preg_replace( '/^.*?-->/s', '', trim( $pattern_content ) );
        
        register_block_pattern(
            'equestrian-theme/hero',
            array(
                'title'       => __( 'Hero Section', 'equestrian-theme' ),
                'categories'  => array( 'equestrian-theme' ),
                'content'     => trim( $pattern_content ),
            )
        );
    }
}
add_action( 'init', 'equestrian_theme_register_patterns' );
