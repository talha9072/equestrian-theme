<?php
/**
 * Title: Shop Grid
 * Slug: equestrian-theme/shop-grid
 * Categories: equestrian-theme
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"section","className":"section tight"} -->
<section class="wp-block-group section tight" style="padding-top:48px">
	<!-- wp:group {"className":"container"} -->
	<div class="wp-block-group container">

		<!-- wp:equestrian-theme/shop-filters /-->

		<!-- wp:query {"query":{"perPage":16,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
		<div class="wp-block-query">

			<!-- wp:post-template {"className":"product-grid"} -->
			<!-- wp:equestrian-theme/product-card /-->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
			<p>No products found yet. Add published Products in wp-admin to show them here.</p>
			<!-- /wp:query-no-results -->

			<!-- wp:query-pagination -->
			<div class="wp-block-query-pagination">
				<!-- wp:query-pagination-previous /-->
				<!-- wp:query-pagination-numbers /-->
				<!-- wp:query-pagination-next /-->
			</div>
			<!-- /wp:query-pagination -->

		</div>
		<!-- /wp:query -->

	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
