<?php
/**
 * Title: Episode Hero
 * Slug: equestrian-theme/episode-hero
 * Categories: equestrian-theme
 */
?>
<!-- wp:group {"tagName":"section","className":"ep-hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group ep-hero">
	<!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
	<div class="wp-block-group container">

		<!-- Breadcrumb -->
		<!-- wp:group {"className":"breadcrumb","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group breadcrumb">
			<!-- wp:paragraph -->
			<p><a href="/">Home</a><span>/</span><a href="/episodes">Episodes</a><span>/</span><span>Episode 24</span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- Hero Grid -->
		<!-- wp:columns {"className":"ep-hero-grid","isStackedOnMobile":false} -->
		<div class="wp-block-columns ep-hero-grid">

			<!-- Artwork -->
			<!-- wp:column {"width":"38%","className":"ep-hero-art"} -->
			<div class="wp-block-column ep-hero-art" style="flex-basis:38%">
				<!-- wp:post-featured-image {"className":"ep-art"} /-->
			</div>
			<!-- /wp:column -->

			<!-- Info -->
			<!-- wp:column {"width":"62%","className":"ep-hero-info"} -->
			<div class="wp-block-column ep-hero-info" style="flex-basis:62%">

				<!-- Tags -->
				<!-- wp:group {"className":"ep-tags","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ep-tags">
					<!-- wp:post-terms {"term":"episode_category","className":"chip"} /-->
				</div>
				<!-- /wp:group -->

				<!-- Title -->
				<!-- wp:post-title {"level":1,"className":"display ep-h1"} /-->

				<!-- Standfirst / Excerpt -->
				<!-- wp:post-excerpt {"className":"lead ep-standfirst"} /-->

				<!-- Byline -->
				<!-- wp:group {"className":"ep-byline","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group ep-byline">
					<!-- wp:group {"className":"byline-av"} --><div class="wp-block-group byline-av"><span>ED</span></div><!-- /wp:group -->
					<!-- wp:group -->
					<div class="wp-block-group">
						<!-- wp:paragraph --><p><strong>The Equestrian Dad</strong></p><!-- /wp:paragraph -->
						<!-- wp:paragraph --><p><span>Published <?php echo get_the_date(); ?> · <?php echo get_post_meta(get_the_ID(), 'duration', true); ?></span></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- Player -->
				<!-- wp:html -->
				<div class="player" data-dur="2730">
					<div class="art">
						<!-- wp:post-featured-image {"className":"player-art"} /-->
					</div>
					<div class="player-body">
						<div class="player-meta">
							<span class="ep">Episode <?php echo get_post_meta(get_the_ID(), 'episode_number', true); ?></span>
							<span style="color:var(--ink-faint);font-size:13px">The Equestrian Dad</span>
						</div>
						<div class="player-title"><?php echo get_the_title(); ?></div>
						<div class="player-controls">
							<button class="play-btn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
							<div class="progress-wrap">
								<span class="time">00:00</span>
								<div class="progress"><div class="fill"></div><div class="knob"></div></div>
								<span class="time"><?php echo get_post_meta(get_the_ID(), 'duration', true); ?></span>
							</div>
						</div>
					</div>
				</div>
				<!-- /wp:html -->

				<!-- Listen Buttons -->
				<!-- wp:group {"className":"ep-listen-row","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ep-listen-row">
					<!-- wp:paragraph {"className":"ep-listen-label"} --><p class="ep-listen-label">Also on</p><!-- /wp:paragraph -->
					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">Apple</a>
					<!-- /wp:html -->
					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">Spotify</a>
					<!-- /wp:html -->
					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">YouTube</a>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->