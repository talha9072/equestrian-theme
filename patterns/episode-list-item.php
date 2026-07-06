<?php
/**
 * Title: Episode List Item
 * Slug: equestrian-theme/episode-list-item
 * Categories: equestrian-theme
 * Inserter: no
 */
$ep_num    = get_post_meta( get_the_ID(), 'episode_number', true );
$duration  = get_post_meta( get_the_ID(), 'duration', true );
$permalink = get_permalink();
?>
<!-- wp:html -->
<div class="ep-row">
	<div class="ep-play">
		<a href="<?php echo esc_url( $permalink ); ?>" aria-label="Play episode" style="display:flex;align-items:center;justify-content:center;color:inherit;">
			<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
		</a>
	</div>
	<div class="ep-content">
		<?php if ( $ep_num ) : ?>
		<p class="ep-num">EP <?php echo esc_html( $ep_num ); ?></p>
		<?php endif; ?>
		<h3><a href="<?php echo esc_url( $permalink ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( get_the_title() ); ?></a></h3>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
	</div>
	<div class="ep-side">
		<?php if ( $duration ) : ?>
		<p class="dur"><?php echo esc_html( $duration ); ?></p>
		<?php endif; ?>
		<p><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></p>
	</div>
</div>
<!-- /wp:html -->
