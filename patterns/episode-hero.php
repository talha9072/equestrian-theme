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
			<p><a href="/">Home</a><span>/</span><a href="/episodes">Episodes</a><span>/</span>Episode <?php echo get_post_meta(get_the_ID(), 'episode_number', true); ?></p>
			<!-- /wp:paragraph -->
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

				<!-- wp:html -->
				<div class="ep-tags">
					<?php
					$episode_number = get_post_meta( get_the_ID(), 'episode_number', true );
					if ( $episode_number ) :
						?>
						<span class="chip accent">Episode <?php echo esc_html( $episode_number ); ?></span>
						<?php
					endif;
					$episode_terms = get_the_terms( get_the_ID(), 'episode_category' );
					if ( $episode_terms && ! is_wp_error( $episode_terms ) ) :
						foreach ( $episode_terms as $episode_term ) :
							?>
							<span class="chip"><?php echo esc_html( $episode_term->name ); ?></span>
							<?php
						endforeach;
					endif;
					?>
				</div>
				<!-- /wp:html -->

				<!-- wp:post-title {"level":1,"className":"display ep-h1"} /-->

				<!-- wp:post-excerpt {"className":"lead ep-standfirst"} /-->

				<!-- wp:html -->
				<div class="ep-byline">
					<span class="byline-av"><span>ED</span></span>
					<div>
						<strong>The Equestrian Dad</strong>
						<span>Published <?php echo esc_html( get_the_date( 'j F Y' ) ); ?> · <?php echo esc_html( get_post_meta( get_the_ID(), 'duration', true ) ); ?></span>
					</div>
				</div>
				<!-- /wp:html -->

				<!-- wp:html -->
				<?php
				$audio_url = get_post_meta( get_the_ID(), '_episode_audio_file', true );
				$art_url   = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
				?>
				<div class="player" <?php echo $audio_url ? 'data-audio="' . esc_url( $audio_url ) . '"' : 'data-dur="2730"'; ?>>
					<?php if ( $audio_url ) : ?>
						<audio class="player-audio" src="<?php echo esc_url( $audio_url ); ?>" preload="metadata"></audio>
					<?php endif; ?>
					<div class="art">
						<?php if ( $art_url ) : ?>
							<img src="<?php echo esc_url( $art_url ); ?>" alt="" style="width:60px;height:60px;border-radius:14px;object-fit:cover;">
						<?php endif; ?>
					</div>
					<div class="player-body">
						<div class="player-meta">
							<span class="ep">Episode <?php echo esc_html( get_post_meta( get_the_ID(), 'episode_number', true ) ); ?></span>
							<span style="color:var(--ink-faint);font-size:13px">The Equestrian Dad</span>
						</div>
						<div class="player-title"><?php echo get_the_title(); ?></div>
						<div class="player-controls">
							<button class="play-btn" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
							<div class="progress-wrap">
								<span class="time" data-cur>00:00</span>
								<div class="progress"><div class="fill"></div><div class="knob"></div></div>
								<span class="time" data-dur>45:30</span>
							</div>
						</div>
					</div>
				</div>
				<!-- /wp:html -->

				<!-- wp:group {"className":"ep-listen-row","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group ep-listen-row">
					<!-- wp:paragraph {"className":"ep-listen-label"} -->
					<p class="ep-listen-label">Also on</p>
					<!-- /wp:paragraph -->

					<?php
					$apple_link   = get_post_meta( get_the_ID(), '_episode_apple_link', true );
					$spotify_link = get_post_meta( get_the_ID(), '_episode_spotify_link', true );
					$youtube_link = get_post_meta( get_the_ID(), '_episode_youtube_link', true );
					?>

					<?php if ( $apple_link ) : ?>
					<!-- wp:html -->
					<a href="<?php echo esc_url( $apple_link ); ?>" class="ep-listen-btn" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" style="color:var(--apple)"><circle cx="12" cy="10.5" r="2.1" fill="currentColor"/><path fill="currentColor" d="M12 14c-1.4 0-2.5 1-2.7 2.4l-.5 3.3a1 1 0 0 0 1 1.2h4.4a1 1 0 0 0 1-1.2l-.5-3.3C14.5 15 13.4 14 12 14Z"/><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M7.3 14.2a6 6 0 1 1 9.4 0"/></svg> Apple
					</a>
					<!-- /wp:html -->
					<?php endif; ?>

					<?php if ( $spotify_link ) : ?>
					<!-- wp:html -->
					<a href="<?php echo esc_url( $spotify_link ); ?>" class="ep-listen-btn" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--spotify)"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.6 14.4a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.96a.62.62 0 1 1-.28-1.2c3.8-.87 7.08-.5 9.72 1.1.3.18.39.57.21.85Zm1.23-2.74a.78.78 0 0 1-1.07.26c-2.69-1.65-6.79-2.13-9.97-1.17a.78.78 0 1 1-.45-1.49c3.63-1.1 8.15-.56 11.24 1.33.36.22.48.7.25 1.07Z"/></svg> Spotify
					</a>
					<!-- /wp:html -->
					<?php endif; ?>

					<?php if ( $youtube_link ) : ?>
					<!-- wp:html -->
					<a href="<?php echo esc_url( $youtube_link ); ?>" class="ep-listen-btn" target="_blank" rel="noopener">
						<svg viewBox="0 0 24 24" fill="currentColor" style="color:var(--youtube)"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.8 12 4.8 12 4.8s-7 0-8.9.6A3 3 0 0 0 1 7.5C.4 9.4.4 12 .4 12s0 2.6.6 4.5a3 3 0 0 0 2.1 2.1c1.9.6 8.9.6 8.9.6s7 0 8.9-.6a3 3 0 0 0 2.1-2.1c.6-1.9.6-4.5.6-4.5s0-2.6-.6-4.5ZM9.8 15.3V8.7l5.7 3.3-5.7 3.3Z"/></svg> YouTube
					</a>
					<!-- /wp:html -->
					<?php endif; ?>
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