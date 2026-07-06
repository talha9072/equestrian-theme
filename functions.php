<?php
/**
 * Equestrian Theme functions and definitions
 */

// Enqueue styles and scripts
function equestrian_theme_scripts() {
    wp_enqueue_style( 'equestrian-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
    wp_enqueue_style( 'equestrian-theme-assets', get_template_directory_uri() . '/assets/styles.css', array(), '1.0.0' );
    wp_enqueue_style( 'equestrian-theme-header', get_template_directory_uri() . '/header.css', array(), '1.0.0' );

    if ( ! is_admin() ) {
        wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), '1.0.0', true );
        wp_enqueue_script( 'equestrian-theme-app', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'equestrian_theme_scripts' );

// Make scripts modules
add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
    if ( in_array( $handle, [ 'equestrian-theme-image-slot', 'equestrian-theme-app' ] ) ) {
        return '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }
    return $tag;
}, 10, 3 );

// Theme supports
function equestrian_theme_support() {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );
    add_editor_style( 'assets/styles.css' );
    add_editor_style( 'assets/editor-styles.css' );
}
add_action( 'after_setup_theme', 'equestrian_theme_support' );

// Editor assets
function equestrian_editor_assets() {
    wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), '1.0.0', true );
}
add_action( 'enqueue_block_editor_assets', 'equestrian_editor_assets' );

/**
 * Register only the pattern category.
 * All patterns in /patterns/ folder will be auto-discovered by WordPress.
 */
function equestrian_theme_register_pattern_category() {
    register_block_pattern_category(
        'equestrian-theme',
        array( 'label' => __( 'Equestrian Theme', 'equestrian-theme' ) )
    );
}
add_action( 'init', 'equestrian_theme_register_pattern_category' );




/**
 * Register Custom Post Type: Episode
 */
function equestrian_register_episode_post_type() {

    $labels = array(
        'name'                  => _x( 'Episodes', 'Post type general name', 'equestrian-theme' ),
        'singular_name'         => _x( 'Episode', 'Post type singular name', 'equestrian-theme' ),
        'menu_name'             => _x( 'Episodes', 'Admin Menu text', 'equestrian-theme' ),
        'name_admin_bar'        => _x( 'Episode', 'Add New on Toolbar', 'equestrian-theme' ),
        'add_new'               => __( 'Add New', 'equestrian-theme' ),
        'add_new_item'          => __( 'Add New Episode', 'equestrian-theme' ),
        'new_item'              => __( 'New Episode', 'equestrian-theme' ),
        'edit_item'             => __( 'Edit Episode', 'equestrian-theme' ),
        'view_item'             => __( 'View Episode', 'equestrian-theme' ),
        'all_items'             => __( 'All Episodes', 'equestrian-theme' ),
        'search_items'          => __( 'Search Episodes', 'equestrian-theme' ),
        'parent_item_colon'     => __( 'Parent Episodes:', 'equestrian-theme' ),
        'not_found'             => __( 'No episodes found.', 'equestrian-theme' ),
        'not_found_in_trash'    => __( 'No episodes found in Trash.', 'equestrian-theme' ),
        'featured_image'        => __( 'Episode Artwork', 'equestrian-theme' ),
        'set_featured_image'    => __( 'Set episode artwork', 'equestrian-theme' ),
        'remove_featured_image' => __( 'Remove episode artwork', 'equestrian-theme' ),
        'use_featured_image'    => __( 'Use as episode artwork', 'equestrian-theme' ),
        'archives'              => __( 'Episode Archives', 'equestrian-theme' ),
        'insert_into_item'      => __( 'Insert into episode', 'equestrian-theme' ),
        'uploaded_to_this_item' => __( 'Uploaded to this episode', 'equestrian-theme' ),
        'filter_items_list'     => __( 'Filter episodes list', 'equestrian-theme' ),
        'items_list_navigation' => __( 'Episodes list navigation', 'equestrian-theme' ),
        'items_list'            => __( 'Episodes list', 'equestrian-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'episode' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-microphone',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true, // Important for Gutenberg
    );

    register_post_type( 'episode', $args );
}
add_action( 'init', 'equestrian_register_episode_post_type' );


/**
 * Register Taxonomy for Episodes (Optional but Recommended)
 */
function equestrian_register_episode_taxonomy() {

    $labels = array(
        'name'              => _x( 'Episode Categories', 'taxonomy general name', 'equestrian-theme' ),
        'singular_name'     => _x( 'Episode Category', 'taxonomy singular name', 'equestrian-theme' ),
        'search_items'      => __( 'Search Episode Categories', 'equestrian-theme' ),
        'all_items'         => __( 'All Episode Categories', 'equestrian-theme' ),
        'parent_item'       => __( 'Parent Episode Category', 'equestrian-theme' ),
        'parent_item_colon' => __( 'Parent Episode Category:', 'equestrian-theme' ),
        'edit_item'         => __( 'Edit Episode Category', 'equestrian-theme' ),
        'update_item'       => __( 'Update Episode Category', 'equestrian-theme' ),
        'add_new_item'      => __( 'Add New Episode Category', 'equestrian-theme' ),
        'new_item_name'     => __( 'New Episode Category Name', 'equestrian-theme' ),
        'menu_name'         => __( 'Categories', 'equestrian-theme' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'episode-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'episode_category', array( 'episode' ), $args );
}
add_action( 'init', 'equestrian_register_episode_taxonomy' );

/**
 * Send /episodes/ (old static page) to the real Episode archive.
 */
function equestrian_redirect_episodes_page() {
    if ( is_page( 'episodes' ) ) {
        wp_redirect( get_post_type_archive_link( 'episode' ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'equestrian_redirect_episodes_page' );

/**
 * Dynamic blocks used inside the Episode archive Query Loop to output
 * per-post custom fields (episode_number, duration) and the play link.
 * These read the postId from block context, unlike shortcodes/global
 * $post which is not reliably updated per row inside a Query Loop.
 */
function equestrian_register_episode_query_blocks() {
    register_block_type( 'equestrian-theme/episode-number', array(
        'uses_context'    => array( 'postId' ),
        'render_callback' => function ( $attributes, $content, $block ) {
            $post_id = $block->context['postId'] ?? get_the_ID();
            $num     = get_post_meta( $post_id, 'episode_number', true );
            return $num ? '<p class="ep-num">EP ' . esc_html( $num ) . '</p>' : '';
        },
    ) );

    register_block_type( 'equestrian-theme/episode-duration', array(
        'uses_context'    => array( 'postId' ),
        'render_callback' => function ( $attributes, $content, $block ) {
            $post_id = $block->context['postId'] ?? get_the_ID();
            $dur     = get_post_meta( $post_id, 'duration', true );
            return $dur ? '<p class="dur">' . esc_html( $dur ) . '</p>' : '';
        },
    ) );

    register_block_type( 'equestrian-theme/episode-play', array(
        'uses_context'    => array( 'postId' ),
        'render_callback' => function ( $attributes, $content, $block ) {
            $post_id = $block->context['postId'] ?? get_the_ID();
            return '<a href="' . esc_url( get_permalink( $post_id ) ) . '" aria-label="Play episode" style="display:flex;align-items:center;justify-content:center;color:inherit;"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></a>';
        },
    ) );
}
add_action( 'init', 'equestrian_register_episode_query_blocks' );