<?php
/**
 * Equestrian Theme functions and definitions
 */

// Enqueue styles and scripts
function equestrian_theme_scripts() {
    wp_enqueue_style( 'equestrian-theme-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );
    wp_enqueue_style( 'equestrian-theme-assets', get_template_directory_uri() . '/assets/styles.css', array(), filemtime( get_template_directory() . '/assets/styles.css' ) );
    wp_enqueue_style( 'equestrian-theme-header', get_template_directory_uri() . '/header.css', array(), filemtime( get_template_directory() . '/header.css' ) );

    if ( ! is_admin() ) {
        wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), filemtime( get_template_directory() . '/assets/image-slot.js' ), true );
        wp_enqueue_script( 'equestrian-theme-app', get_template_directory_uri() . '/assets/app.js', array(), filemtime( get_template_directory() . '/assets/app.js' ), true );
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

/**
 * Episode Details meta box: audio file upload + podcast platform links.
 */
function equestrian_add_episode_meta_box() {
    add_meta_box(
        'equestrian_episode_details',
        __( 'Episode Details', 'equestrian-theme' ),
        'equestrian_render_episode_meta_box',
        'episode',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'equestrian_add_episode_meta_box' );

function equestrian_render_episode_meta_box( $post ) {
    wp_nonce_field( 'equestrian_save_episode_details', 'equestrian_episode_details_nonce' );

    $episode_number = get_post_meta( $post->ID, 'episode_number', true );
    $duration       = get_post_meta( $post->ID, 'duration', true );
    $audio_file    = get_post_meta( $post->ID, '_episode_audio_file', true );
    $apple_link    = get_post_meta( $post->ID, '_episode_apple_link', true );
    $spotify_link  = get_post_meta( $post->ID, '_episode_spotify_link', true );
    $amazon_link   = get_post_meta( $post->ID, '_episode_amazon_link', true );
    $youtube_link  = get_post_meta( $post->ID, '_episode_youtube_link', true );
    ?>
    <p>
        <label for="episode_number"><strong><?php esc_html_e( 'Episode Number', 'equestrian-theme' ); ?></strong></label><br>
        <input type="number" id="episode_number" name="episode_number" class="widefat" value="<?php echo esc_attr( $episode_number ); ?>" placeholder="e.g. 5" min="1">
    </p>
    <p>
        <label for="duration"><strong><?php esc_html_e( 'Duration', 'equestrian-theme' ); ?></strong></label><br>
        <input type="text" id="duration" name="duration" class="widefat" value="<?php echo esc_attr( $duration ); ?>" placeholder="e.g. 45 min">
    </p>
    <p>
        <label for="episode_audio_file"><strong><?php esc_html_e( 'Audio File (MP3/MP4)', 'equestrian-theme' ); ?></strong></label><br>
        <input type="text" id="episode_audio_file" name="episode_audio_file" class="widefat" value="<?php echo esc_attr( $audio_file ); ?>" placeholder="<?php esc_attr_e( 'No file selected', 'equestrian-theme' ); ?>" readonly>
        <button type="button" class="button" id="episode_audio_file_button"><?php esc_html_e( 'Select Audio File', 'equestrian-theme' ); ?></button>
        <button type="button" class="button" id="episode_audio_file_remove" <?php echo $audio_file ? '' : 'style="display:none"'; ?>><?php esc_html_e( 'Remove', 'equestrian-theme' ); ?></button>
    </p>
    <p>
        <label for="episode_apple_link"><strong><?php esc_html_e( 'Apple Podcasts Link', 'equestrian-theme' ); ?></strong></label><br>
        <input type="url" id="episode_apple_link" name="episode_apple_link" class="widefat" value="<?php echo esc_attr( $apple_link ); ?>" placeholder="https://podcasts.apple.com/...">
    </p>
    <p>
        <label for="episode_spotify_link"><strong><?php esc_html_e( 'Spotify Link', 'equestrian-theme' ); ?></strong></label><br>
        <input type="url" id="episode_spotify_link" name="episode_spotify_link" class="widefat" value="<?php echo esc_attr( $spotify_link ); ?>" placeholder="https://open.spotify.com/...">
    </p>
    <p>
        <label for="episode_amazon_link"><strong><?php esc_html_e( 'Amazon Music Link', 'equestrian-theme' ); ?></strong></label><br>
        <input type="url" id="episode_amazon_link" name="episode_amazon_link" class="widefat" value="<?php echo esc_attr( $amazon_link ); ?>" placeholder="https://music.amazon.com/...">
    </p>
    <p>
        <label for="episode_youtube_link"><strong><?php esc_html_e( 'YouTube Link', 'equestrian-theme' ); ?></strong></label><br>
        <input type="url" id="episode_youtube_link" name="episode_youtube_link" class="widefat" value="<?php echo esc_attr( $youtube_link ); ?>" placeholder="https://youtube.com/...">
    </p>
    <script>
    jQuery(function ($) {
        var frame;
        $('#episode_audio_file_button').on('click', function (e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({
                title: '<?php echo esc_js( __( 'Select Audio File', 'equestrian-theme' ) ); ?>',
                library: { type: [ 'audio', 'video' ] },
                button: { text: '<?php echo esc_js( __( 'Use this file', 'equestrian-theme' ) ); ?>' },
                multiple: false
            });
            frame.on('select', function () {
                var attachment = frame.state().get('selection').first().toJSON();
                $('#episode_audio_file').val(attachment.url);
                $('#episode_audio_file_remove').show();
            });
            frame.open();
        });
        $('#episode_audio_file_remove').on('click', function (e) {
            e.preventDefault();
            $('#episode_audio_file').val('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

function equestrian_save_episode_meta_box( $post_id ) {
    if ( ! isset( $_POST['equestrian_episode_details_nonce'] ) ||
        ! wp_verify_nonce( $_POST['equestrian_episode_details_nonce'], 'equestrian_save_episode_details' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $text_fields = array(
        'episode_number' => 'episode_number',
        'duration'       => 'duration',
    );
    foreach ( $text_fields as $input_name => $meta_key ) {
        if ( isset( $_POST[ $input_name ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $input_name ] ) ) );
        }
    }

    $url_fields = array(
        'episode_audio_file'   => '_episode_audio_file',
        'episode_apple_link'   => '_episode_apple_link',
        'episode_spotify_link' => '_episode_spotify_link',
        'episode_amazon_link'  => '_episode_amazon_link',
        'episode_youtube_link' => '_episode_youtube_link',
    );
    foreach ( $url_fields as $input_name => $meta_key ) {
        if ( isset( $_POST[ $input_name ] ) ) {
            update_post_meta( $post_id, $meta_key, esc_url_raw( trim( wp_unslash( $_POST[ $input_name ] ) ) ) );
        }
    }
}
add_action( 'save_post_episode', 'equestrian_save_episode_meta_box' );

function equestrian_enqueue_episode_admin_media( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }
    if ( 'episode' !== get_current_screen()->post_type ) {
        return;
    }
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'equestrian_enqueue_episode_admin_media' );

/**
 * ============================================================
 * WooCommerce integration
 * ============================================================
 * The theme provides its own block templates (archive-product.html,
 * single-product.html) and a "product-card" dynamic block styled to
 * match the site's existing .product/.pimg/.pbody design system
 * (see the "Wear the yard" section on the homepage). None of this
 * does anything until the WooCommerce plugin is installed & active.
 */

function equestrian_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'equestrian_woocommerce_support' );

// Our block templates provide the page structure, so drop WooCommerce's default wrapper markup.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Match the site's copy ("Add to basket" rather than "Add to cart").
add_filter( 'woocommerce_product_add_to_cart_text', function () {
    return __( 'Add to basket', 'equestrian-theme' );
} );
add_filter( 'woocommerce_product_single_add_to_cart_text', function () {
    return __( 'Add to basket', 'equestrian-theme' );
} );

/**
 * Send /store/ (the nav link URL baked into the header/footer template parts)
 * to the real WooCommerce shop page. No "store" page exists in the database —
 * this is a plain URL redirect, not a page-based one, so it must run before
 * WordPress 404s the request.
 */
function equestrian_redirect_store_page() {
    if ( ! function_exists( 'wc_get_page_permalink' ) ) {
        return;
    }
    $path = trim( wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ) ?? '', '/' );
    if ( 'store' === $path ) {
        wp_redirect( wc_get_page_permalink( 'shop' ), 301 );
        exit;
    }
}
add_action( 'template_redirect', 'equestrian_redirect_store_page' );

/**
 * Dynamic "product-card" block, used inside a Query Loop (postType: product)
 * on the Shop page. Reads postId from block context so it always renders the
 * correct product per loop iteration, mirroring the equestrian-theme/episode-*
 * blocks used for the Episode archive.
 */
function equestrian_register_product_card_block() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    register_block_type(
        'equestrian-theme/product-card',
        array(
            'uses_context'    => array( 'postId' ),
            'render_callback' => function ( $attributes, $content, $block ) {
                $post_id = $block->context['postId'] ?? get_the_ID();
                $product = wc_get_product( $post_id );
                if ( ! $product ) {
                    return '';
                }

                $badge = '';
                if ( $product->is_on_sale() ) {
                    $badge = 'Sale';
                } elseif ( $product->is_featured() ) {
                    $badge = 'Bestseller';
                }

                $terms    = get_the_terms( $post_id, 'product_cat' );
                $cat_name = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';
                $permalink = get_permalink( $post_id );
                $image     = wp_get_attachment_image( $product->get_image_id(), 'medium' );

                ob_start();
                ?>
				<div class="product">
					<a href="<?php echo esc_url( $permalink ); ?>" class="pimg">
						<?php if ( $badge ) : ?>
							<span class="tag"><?php echo esc_html( $badge ); ?></span>
						<?php endif; ?>
						<?php echo $image; ?>
					</a>
					<div class="pbody">
						<?php if ( $cat_name ) : ?>
							<span class="pcat"><?php echo esc_html( $cat_name ); ?></span>
						<?php endif; ?>
						<h3><a href="<?php echo esc_url( $permalink ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $product->get_name() ); ?></a></h3>
						<div class="prow">
							<span class="price"><?php echo $product->get_price_html(); ?></span>
							<span class="add"><?php woocommerce_template_loop_add_to_cart(); ?></span>
						</div>
					</div>
				</div>
				<?php
                return ob_get_clean();
            },
        )
    );
}
add_action( 'init', 'equestrian_register_product_card_block' );

/**
 * Dynamic "shop-filters" block: real product-category chips + result count,
 * used at the top of the Shop page and category archives.
 */
function equestrian_register_shop_filters_block() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    register_block_type(
        'equestrian-theme/shop-filters',
        array(
            'render_callback' => function () {
                if ( ! function_exists( 'wc_get_page_permalink' ) ) {
                    return '';
                }

                $shop_url     = wc_get_page_permalink( 'shop' );
                $current_term = is_tax( 'product_cat' ) ? get_queried_object() : null;
                $terms        = get_terms(
                    array(
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                    )
                );

                global $wp_query;
                $count = isset( $wp_query->found_posts ) ? (int) $wp_query->found_posts : 0;

                ob_start();
                ?>
				<div class="filter-row">
					<div class="filter-chips">
						<a href="<?php echo esc_url( $shop_url ); ?>" class="fchip<?php echo ! $current_term ? ' active' : ''; ?>">All</a>
						<?php
						if ( ! is_wp_error( $terms ) ) :
							foreach ( $terms as $term ) :
								$is_active = ( $current_term && ! is_wp_error( $current_term ) && $current_term->term_id === $term->term_id );
								?>
								<a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="fchip<?php echo $is_active ? ' active' : ''; ?>"><?php echo esc_html( $term->name ); ?></a>
								<?php
							endforeach;
						endif;
						?>
					</div>
					<span class="filter-count"><strong><?php echo esc_html( $count ); ?></strong> products</span>
				</div>
				<?php
                return ob_get_clean();
            },
        )
    );
}
add_action( 'init', 'equestrian_register_shop_filters_block' );

/**
 * The WooCommerce order-received (thank you) page renders inside the
 * page-checkout.html template, but the block tree that WooCommerce swaps in
 * for the "order received" state stops the theme's footer template part from
 * rendering. Output it manually so the footer still appears on that page.
 */
function equestrian_fix_order_received_footer() {
    if ( ! function_exists( 'is_order_received_page' ) || ! is_order_received_page() ) {
        return;
    }
    $footer_part = get_block_template( get_stylesheet() . '//equestrian-footer', 'wp_template_part' );
    if ( $footer_part && ! empty( $footer_part->content ) ) {
        echo do_blocks( $footer_part->content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}
add_action( 'wp_footer', 'equestrian_fix_order_received_footer', 5 );