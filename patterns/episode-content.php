<?php
/**
 * Title: Episode Content
 * Slug: equestrian-theme/episode-content
 * Categories: equestrian-theme
 */
?>
<!-- wp:group {"tagName":"section","className":"ep-content","layout":{"type":"constrained"}} -->
<section class="wp-block-group ep-content">

	<!-- wp:group {"className":"container content-grid"} -->
	<div class="wp-block-group container content-grid">

		<!-- wp:group {"tagName":"article","className":"prose"} -->
		<article class="wp-block-group prose">

			<!-- wp:post-content /-->

			<!-- wp:html -->
			<?php $episode_terms = get_the_terms( get_the_ID(), 'episode_category' ); ?>
			<?php if ( $episode_terms && ! is_wp_error( $episode_terms ) ) : ?>
				<div class="prose-tags">
					<?php foreach ( $episode_terms as $episode_term ) : ?>
						<a href="<?php echo esc_url( get_term_link( $episode_term ) ); ?>" class="chip"><?php echo esc_html( $episode_term->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="prose-share">
				<span>Share this episode</span>
				<div class="share-btns">
					<button type="button" class="share-fb" aria-label="Share on Facebook" data-url="<?php echo esc_url( get_permalink() ); ?>"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M14 9h3V6h-3a4 4 0 0 0-4 4v2H7v3h3v6h3v-6h3l1-3h-4v-2a1 1 0 0 1 1-1Z"/></svg></button>
					<button type="button" class="share-x" aria-label="Share on X" data-url="<?php echo esc_url( get_permalink() ); ?>" data-title="<?php echo esc_attr( get_the_title() ); ?>"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 3h3l-7 8 8 10h-6l-4-5-5 5H3l7-9L2 3h6l4 5 5-5Z"/></svg></button>
					<button type="button" class="share-copy" aria-label="Copy link" data-url="<?php echo esc_url( get_permalink() ); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M10 13a4 4 0 0 0 6 .5l2-2a4 4 0 0 0-6-6l-1 1M14 11a4 4 0 0 0-6-.5l-2 2a4 4 0 0 0 6 6l1-1"/></svg></button>
				</div>
			</div>
			<!-- /wp:html -->

		</article>
		<!-- /wp:group -->

		<!-- wp:html -->
		<?php
		$apple_link   = get_post_meta( get_the_ID(), '_episode_apple_link', true );
		$spotify_link = get_post_meta( get_the_ID(), '_episode_spotify_link', true );
		$amazon_link  = get_post_meta( get_the_ID(), '_episode_amazon_link', true );
		$youtube_link = get_post_meta( get_the_ID(), '_episode_youtube_link', true );
		?>
		<aside class="sidebar">

			<?php if ( $apple_link || $spotify_link || $amazon_link || $youtube_link ) : ?>
			<div class="side-card subscribe-card">
				<h3>Follow the journey</h3>
				<p>New episode every week. Never miss one.</p>
				<?php if ( $apple_link ) : ?>
				<a href="<?php echo esc_url( $apple_link ); ?>" class="sub-btn" target="_blank" rel="noopener">
					<span class="pico apple"><svg viewBox="0 0 24 24"><circle cx="12" cy="10.5" r="2.1" fill="currentColor"/><path fill="currentColor" d="M12 14c-1.4 0-2.5 1-2.7 2.4l-.5 3.3a1 1 0 0 0 1 1.2h4.4a1 1 0 0 0 1-1.2l-.5-3.3C14.5 15 13.4 14 12 14Z"/><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M7.3 14.2a6 6 0 1 1 9.4 0"/></svg></span>Apple Podcasts
				</a>
				<?php endif; ?>
				<?php if ( $spotify_link ) : ?>
				<a href="<?php echo esc_url( $spotify_link ); ?>" class="sub-btn" target="_blank" rel="noopener">
					<span class="pico spotify"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.6 14.4a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.96a.62.62 0 1 1-.28-1.2c3.8-.87 7.08-.5 9.72 1.1.3.18.39.57.21.85Z"/></svg></span>Spotify
				</a>
				<?php endif; ?>
				<?php if ( $amazon_link ) : ?>
				<a href="<?php echo esc_url( $amazon_link ); ?>" class="sub-btn" target="_blank" rel="noopener">
					<span class="pico amazon"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M14 4v8.7a3 3 0 1 0 1.8 2.8V8h3V4h-4.8Z"/></svg></span>Amazon Music
				</a>
				<?php endif; ?>
				<?php if ( $youtube_link ) : ?>
				<a href="<?php echo esc_url( $youtube_link ); ?>" class="sub-btn" target="_blank" rel="noopener">
					<span class="pico youtube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.8 12 4.8 12 4.8s-7 0-8.9.6A3 3 0 0 0 1 7.5C.4 9.4.4 12 .4 12s0 2.6.6 4.5a3 3 0 0 0 2.1 2.1c1.9.6 8.9.6 8.9.6s7 0 8.9-.6a3 3 0 0 0 2.1-2.1c.6-1.9.6-4.5.6-4.5s0-2.6-.6-4.5ZM9.8 15.3V8.7l5.7 3.3-5.7 3.3Z"/></svg></span>YouTube
				</a>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<?php
			$related = new WP_Query(
				array(
					'post_type'      => 'episode',
					'posts_per_page' => 3,
					'post__not_in'   => array( get_the_ID() ),
					'orderby'        => 'date',
					'order'          => 'DESC',
					'no_found_rows'  => true,
				)
			);
			if ( $related->have_posts() ) :
				?>
				<div class="side-card">
					<h3>Keep listening</h3>
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						$rel_num = get_post_meta( get_the_ID(), 'episode_number', true );
						?>
						<a class="related" href="<?php the_permalink(); ?>">
							<span class="rel-art"><?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); ?></span>
							<span>
								<span class="rel-num"><?php echo $rel_num ? 'EP ' . esc_html( $rel_num ) : ''; ?></span>
								<span class="rel-title"><?php the_title(); ?></span>
							</span>
						</a>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<?php
			endif;
			?>

			<div class="side-card news-card">
				<h3>Join the yard</h3>
				<p>One warm note a week, straight to your inbox.</p>
				<form class="nl-form side-form">
					<input type="email" placeholder="you@example.com" aria-label="Email" required>
					<button class="btn btn-primary" type="submit" style="width:100%;justify-content:center">Subscribe</button>
				</form>
			</div>

		</aside>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
