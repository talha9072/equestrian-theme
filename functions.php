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
 * Register block pattern categories.
 */
function equestrian_theme_register_pattern_categories() {
    register_block_pattern_category(
        'equestrian-theme',
        array( 'label' => __( 'Equestrian Theme', 'equestrian-theme' ) )
    );

    // Force register patterns from the patterns folder (to overcome automatic scanning issues)
    $patterns_to_force = array('listen-section', 'feature-section', 'hero', 'about-dad', 'ed-features');
    foreach ($patterns_to_force as $p) {
        $file_path = get_template_directory() . "/patterns/{$p}.php";
        if (file_exists($file_path)) {
            $content = file_get_contents($file_path);
            // Strip PHP header
            $pattern_content = preg_replace('/<\?php[\s\S]*?\?>/', '', $content);
            register_block_pattern(
                "equestrian-theme/{$p}",
                array(
                    'title'       => ucfirst(str_replace('-', ' ', $p)),
                    'categories'  => array( 'equestrian-theme' ),
                    'content'     => trim($pattern_content),
                )
            );
        }
    }
}
add_action( 'init', 'equestrian_theme_register_pattern_categories' );

add_action('init', function() {
    // 1. DELETE ANY CUSTOM TEMPLATES
    $templates = get_posts(array(
        'post_type' => 'wp_template',
        'post_status' => 'all',
        'posts_per_page' => -1,
    ));
    foreach ($templates as $t) {
        wp_delete_post($t->ID, true);
    }

    // 2. DELETE ANY CUSTOM PATTERNS (REUSABLE BLOCKS)
    $blocks = get_posts(array(
        'post_type' => 'wp_block',
        'post_status' => 'all',
        'posts_per_page' => -1,
    ));
    foreach ($blocks as $b) {
        wp_delete_post($b->ID, true);
    }

    // 3. CLEAN UP THE HOME PAGE CONTENT (IT MIGHT HAVE THE PATTERN)
    $front_id = get_option('page_on_front');
    if ($front_id) {
        $page = get_post($front_id);
        if ($page && strpos($page->post_content, 'cache-test') !== false) {
            // Remove any occurrences of the pattern from the post content
            $new_content = preg_replace('/<!-- wp:pattern {"slug":"equestrian-theme\/cache-test"} \/-->/', '', $page->post_content);
            wp_update_post(array(
                'ID' => $front_id,
                'post_content' => $new_content
            ));
        }
    }
});

// ENSURE PATTERNS ARE FRESH IN EDITOR
add_filter('should_load_remote_block_patterns', '__return_false');
add_filter('block_editor_settings_all', function($settings) {
    $settings['__experimentalFeatures']['defaults']['typography']['fontSizes'] = true;
    return $settings;
});

// FORCE NO CACHE FOR STYLES AND SCRIPTS DURING DEVELOPMENT
add_action('wp_enqueue_scripts', function() {
    $version = time(); // Use timestamp as version to bust cache
    wp_enqueue_style('equestrian-theme-styles', get_template_directory_uri() . '/style.css', array(), $version);
}, 20);

// DEV LOG: Output a comment in the head to confirm file-based execution
add_action('wp_head', function() {
    echo "\n<!-- EQU-DAD DEV MODE: File System Checked at " . date('Y-m-d H:i:s') . " -->\n";
});


error_log("DEBUG: Checking templates...");
$test_templates = get_posts(array("post_type" => "wp_template", "post_status" => "all", "posts_per_page" => -1));
error_log("DEBUG: Found " . count($test_templates) . " templates.");
foreach($test_templates as $t) { error_log("DEBUG: Template Slug: " . $t->post_name . " ID: " . $t->ID); }

