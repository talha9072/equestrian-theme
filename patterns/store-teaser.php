<?php
/**
 * Title: Store Teaser
 * Slug: equestrian-theme/store-teaser
 * Categories: equestrian-theme
 * Description: Teaser section for the shop.
 */
?>
<!-- wp:group {"tagName":"section","className":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group section">
    <!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
    <div class="wp-block-group container">
        <!-- wp:group {"className":"eyebrow-row","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group eyebrow-row">
            <!-- wp:group {"layout":{"type":"constrained"}} -->
            <div class="wp-block-group">
                <!-- wp:paragraph {"className":"kicker"} -->
                <p class="kicker">The ED Shop</p>
                <!-- /wp:paragraph -->
                <!-- wp:heading {"className":"display"} -->
                <h2 class="wp-block-heading display">Wear the yard</h2>
                <!-- /wp:heading -->
            </div>
            <!-- /wp:group -->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"btn btn-ghost"} -->
                <div class="wp-block-button btn btn-ghost"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">Visit the shop &rarr;</a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"product-grid","layout":{"type":"constrained"}} -->
        <div class="wp-block-group product-grid">
            <?php
            $teaser_products = wc_get_products( [
                'limit'   => 3,
                'status'  => 'publish',
                'orderby' => 'date',
                'order'   => 'DESC',
            ] );
            foreach ( $teaser_products as $product ) :
                $cats      = wp_get_post_terms( $product->get_id(), 'product_cat', [ 'fields' => 'names' ] );
                $cat_label = ( ! empty( $cats ) && ! is_wp_error( $cats ) ) ? esc_html( $cats[0] ) : '';
                $img_id    = $product->get_image_id();
                $img_url   = $img_id
                    ? wp_get_attachment_image_url( $img_id, 'woocommerce_thumbnail' )
                    : esc_url( get_template_directory_uri() . '/assets/images/product-placeholder.jpg' );
                $img_alt   = $img_id ? esc_attr( get_post_meta( $img_id, '_wp_attachment_image_alt', true ) ) : esc_html( $product->get_name() );
                $badge     = $product->is_featured() ? 'Featured' : '';
            ?>
            <!-- wp:group {"className":"product","layout":{"type":"constrained"}} -->
            <div class="wp-block-group product">
                <!-- wp:group {"className":"pimg","layout":{"type":"constrained"}} -->
                <div class="wp-block-group pimg">
                    <?php if ( $badge ) : ?>
                    <!-- wp:paragraph {"className":"tag"} -->
                    <p class="tag"><?php echo esc_html( $badge ); ?></p>
                    <!-- /wp:paragraph -->
                    <?php endif; ?>
                    <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
                        <!-- wp:image -->
                        <figure class="wp-block-image"><img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo $img_alt; ?>"/></figure>
                        <!-- /wp:image -->
                    </a>
                </div>
                <!-- /wp:group -->

                <!-- wp:group {"className":"pbody","layout":{"type":"constrained"}} -->
                <div class="wp-block-group pbody">
                    <?php if ( $cat_label ) : ?>
                    <!-- wp:paragraph {"className":"pcat"} -->
                    <p class="pcat"><?php echo $cat_label; ?></p>
                    <!-- /wp:paragraph -->
                    <?php endif; ?>
                    <!-- wp:heading {"level":3} -->
                    <h3 class="wp-block-heading"><a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a></h3>
                    <!-- /wp:heading -->
                    <!-- wp:group {"className":"prow","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
                    <div class="wp-block-group prow">
                        <!-- wp:paragraph {"className":"price"} -->
                        <p class="price"><?php echo $product->get_price_html(); ?></p>
                        <!-- /wp:paragraph -->
                        <!-- wp:buttons -->
                        <div class="wp-block-buttons">
                            <!-- wp:button {"className":"add"} -->
                            <div class="wp-block-button add"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"><?php echo esc_html( $product->add_to_cart_text() ); ?></a></div>
                            <!-- /wp:button -->
                        </div>
                        <!-- /wp:buttons -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <?php endforeach; ?>
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</section>
