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

		<!-- wp:group {"className":"breadcrumb","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group breadcrumb">
			<!-- wp:paragraph -->
			<p><a href="/">Home</a><span>/</span><a href="#">Episodes</a><span>/</span><span>Episode 24</span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"ep-hero-grid","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group ep-hero-grid">

			<!-- wp:group {"className":"ep-hero-art","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ep-hero-art">
				<!-- wp:image {"sizeSlug":"full","className":"ep-art"} -->
				<figure class="wp-block-image size-full ep-art"><img src="" alt="Episode Artwork"/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"ep-hero-info","layout":{"type":"constrained"}} -->
			<div class="wp-block-group ep-hero-info">

				<!-- wp:group {"className":"ep-tags","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ep-tags">
					<!-- wp:paragraph {"className":"chip accent"} --><p class="chip accent">Episode 24</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"chip"} --><p class="chip">Mental health</p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"chip"} --><p class="chip">Wins &amp; losses</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"level":1,"className":"display ep-h1"} -->
				<h1 class="wp-block-heading display ep-h1">The day the rosettes<br>didn't matter</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"lead ep-standfirst"} -->
				<p class="lead ep-standfirst">After a hard season of near-misses, a fall at the county show could have broken her. Instead it became the moment everything changed — for her, and for me in the stands.</p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"ep-byline","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
				<div class="wp-block-group ep-byline">
					<!-- wp:group {"className":"byline-av"} --><div class="wp-block-group byline-av"><span>ED</span></div><!-- /wp:group -->
					<!-- wp:group --><div class="wp-block-group"><p><strong>The Equestrian Dad</strong></p><p><span>Published 9 June 2026 · 45 min listen</span></p></div><!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:html -->
				<div class="player" data-dur="2730">
					<div class="art">
						<img src="" alt="" style="width:60px;height:60px;border-radius:14px;object-fit:cover;">
					</div>
					<div class="player-body">
						<div class="player-meta">
							<span class="ep">Episode 24</span>
							<span style="color:var(--ink-faint);font-size:13px">The Equestrian Dad</span>
						</div>
						<div class="player-title">The day the rosettes didn't matter</div>
						<div class="player-controls">
							<button class="play-btn" aria-label="Play">
								<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
							</button>
							<div class="progress-wrap">
								<span class="time" data-cur>15:28</span>
								<div class="progress"><div class="fill"></div><div class="knob"></div></div>
								<span class="time" data-dur>45:30</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /wp:html -->

				<!-- wp:group {"className":"ep-listen-row","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ep-listen-row">
					<!-- wp:paragraph {"className":"ep-listen-label"} --><p class="ep-listen-label">Also on</p><!-- /wp:paragraph -->

					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">
						<svg viewBox="0 0 24 24" style="color:var(--apple)"><circle cx="12" cy="10.5" r="2.1" fill="currentColor"/><path fill="currentColor" d="M12 14c-1.4 0-2.5 1-2.7 2.4l-.5 3.3a1 1 0 0 0 1 1.2h4.4a1 1 0 0 0 1-1.2l-.5-3.3C14.5 15 13.4 14 12 14Z"/><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M7.3 14.2a6 6 0 1 1 9.4 0"/></svg>
						Apple
					</a>
					<!-- /wp:html -->

					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">
						<svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--spotify)"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.6 14.4a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.96a.62.62 0 1 1-.28-1.2c3.8-.87 7.08-.5 9.72 1.1.3.18.39.57.21.85Zm1.23-2.74a.78.78 0 0 1-1.07.26c-2.69-1.65-6.79-2.13-9.97-1.17a.78.78 0 1 1-.45-1.49c3.63-1.1 8.15-.56 11.24 1.33.36.22.48.7.25 1.07Z"/></svg>
						Spotify
					</a>
					<!-- /wp:html -->

					<!-- wp:html -->
					<a href="#" class="ep-listen-btn">
						<svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--youtube)"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.8 12 4.8 12 4.8s-7 0-8.9.6A3 3 0 0 0 1 7.5C.4 9.4.4 12 .4 12s0 2.6.6 4.5a3 3 0 0 0 2.1 2.1c1.9.6 8.9.6 8.9.6s7 0 8.9-.6a3 3 0 0 0 2.1-2.1c.6-1.9.6-4.5.6-4.5s0-2.6-.6-4.5ZM9.8 15.3V8.7l5.7 3.3-5.7 3.3Z"/></svg>
						YouTube
					</a>
					<!-- /wp:html -->
				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->