<?php
/**
 * Title: Product Hero
 * Slug: equestrian-theme/product-hero
 * Categories: equestrian-theme
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

global $product;
if ( ! $product instanceof WC_Product ) {
	$product = wc_get_product( get_the_ID() );
}
if ( ! $product ) {
	return;
}

$terms = get_the_terms( get_the_ID(), 'product_cat' );
?>
<!-- wp:group {"tagName":"section","className":"ep-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group ep-hero">

	<!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
	<div class="wp-block-group container">

		<!-- wp:group {"className":"breadcrumb","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group breadcrumb">
			<!-- wp:html -->
			<p><a href="/">Home</a><span>/</span><a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">Shop</a><span>/</span><?php echo esc_html( $product->get_name() ); ?></p>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ep-hero-grid"} -->
		<div class="wp-block-group ep-hero-grid">

			<!-- wp:group {"className":"ep-hero-art"} -->
			<div class="wp-block-group ep-hero-art">
				<!-- wp:post-featured-image {"className":"ep-art"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ep-hero-info"} -->
			<div class="wp-block-group ep-hero-info">

				<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
				<!-- wp:html -->
				<div class="ep-tags">
					<?php foreach ( $terms as $term ) : ?>
						<span class="chip"><?php echo esc_html( $term->name ); ?></span>
					<?php endforeach; ?>
				</div>
				<!-- /wp:html -->
				<?php endif; ?>

				<!-- wp:post-title {"level":1,"className":"display ep-h1"} /-->

				<?php if ( $product->get_short_description() ) : ?>
				<!-- wp:html -->
				<div class="lead ep-standfirst"><?php echo wp_kses_post( wpautop( $product->get_short_description() ) ); ?></div>
				<!-- /wp:html -->
				<?php endif; ?>

				<!-- wp:html -->
				<div class="product-price-row"><?php echo $product->get_price_html(); ?></div>
				<!-- /wp:html -->

				<!-- wp:html -->
				<div class="single-add-to-cart">
					<?php woocommerce_template_single_add_to_cart(); ?>
				</div>
				<!-- /wp:html -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
