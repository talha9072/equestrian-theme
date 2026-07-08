<?php
/**
 * Title: Hero Section
 * Slug: equestrian-theme/hero
 * Categories: equestrian-theme
 * Description: Native Gutenberg Block Pattern for the Equestrian Dad Hero section.
 */
?>
<!-- wp:group {"tagName":"div","className":"hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero">
  <!-- wp:group {"className":"container hero-grid","layout":{"type":"constrained"}} -->
  <div class="wp-block-group container hero-grid">
    
    <!-- wp:group {"className":"hero-copy","layout":{"type":"constrained"}} -->
    <div class="wp-block-group hero-copy">
      <!-- wp:paragraph {"className":"kicker"} -->
      <p class="kicker">A warm, honest equestrian podcast</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":1,"className":"display hero-title"} -->
      <h1 class="wp-block-heading display hero-title">the equestrian<br>Dad's Podcast<br><span class="hl">My journey</span></h1>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"className":"lead"} -->
      <p class="lead">"Daddy, I'd like a pony", I didn't realise at the time these words could change my life forever! Cold mornings, travelling up and down the country, and making sure I record every jump for Instagram, and every fall, and every injury.</p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"className":"hero-actions","layout":{"type":"flex","justifyContent":"left"}} -->
      <div class="wp-block-buttons hero-actions">
        <!-- wp:button {"className":"btn-primary"} -->
        <div class="wp-block-button btn-primary">
          <a class="wp-block-button__link wp-element-button" href="#latest">Play the latest episode</a>
        </div>
        <!-- /wp:button -->

        <!-- wp:button {"className":"btn-ghost"} -->
        <div class="wp-block-button btn-ghost">
          <a class="wp-block-button__link wp-element-button" href="#about">Meet the Dad</a>
        </div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->

      <!-- wp:group {"className":"hero-stats","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
      <div class="wp-block-group hero-stats">
        <!-- wp:group {"className":"stat-item","layout":{"type":"constrained"}} -->
        <div class="wp-block-group stat-item">
          <!-- wp:paragraph -->
          <p><strong>20</strong></p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p><span>years in the saddle</span></p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"stat-item","layout":{"type":"constrained"}} -->
        <div class="wp-block-group stat-item">
          <!-- wp:paragraph -->
          <p><strong>Weekly</strong></p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p><span>new episodes</span></p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"className":"stat-item","layout":{"type":"constrained"}} -->
        <div class="wp-block-group stat-item">
          <!-- wp:paragraph -->
          <p><strong>4&nbsp;→&nbsp;24</strong></p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph -->
          <p><span>her whole journey</span></p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

    <!-- wp:group {"className":"hero-media","layout":{"type":"constrained"}} -->
    <div class="wp-block-group hero-media">
      <!-- wp:group {"className":"hero-plank plank","layout":{"type":"constrained"}} -->
      <div class="wp-block-group hero-plank plank"></div>
      <!-- /wp:group -->

      <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"hero-photo"} -->
      <figure class="wp-block-image size-full hero-photo">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-placeholder.jpg' ); ?>" alt="The Equestrian Dad Podcast Cover"/>
      </figure>
      <!-- /wp:image -->

      <!-- wp:group {"className":"hero-float","layout":{"type":"flex","flexWrap":"nowrap","alignItems":"center"}} -->
      <div class="wp-block-group hero-float">
        <!-- wp:paragraph {"className":"mini-play"} -->
        <p class="mini-play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"></path></svg></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"className":"mini-text-wrap","layout":{"type":"constrained"}} -->
        <div class="wp-block-group mini-text-wrap">
          <!-- wp:paragraph {"className":"mini-ep"} -->
          <p class="mini-ep">Now playing · Ep. 24</p>
          <!-- /wp:paragraph -->
          <!-- wp:paragraph {"className":"mini-title"} -->
          <p class="mini-title">The day the rosettes didn't matter</p>
          <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->

  </div>
  <!-- /wp:group -->
</div>
<!-- /wp:group -->
