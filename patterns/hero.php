<?php
/**
 * Title: Hero Section
 * Slug: equestrian-theme/hero
 * Categories: equestrian-theme
 */
?>
<!-- wp:group {"tagName":"section","metadata":{"name":"Hero"},"className":"hero","layout":{"type":"default"},"lock":{"move":true,"remove":true},"templateLock":"contentOnly"} -->
<section class="wp-block-group hero">
  <!-- wp:group {"tagName":"div","className":"container hero-grid","layout":{"type":"default"},"lock":{"move":true,"remove":true},"templateLock":"contentOnly"} -->
  <div class="wp-block-group container hero-grid">

    <!-- wp:group {"tagName":"div","metadata":{"name":"Hero copy"},"className":"hero-copy","layout":{"type":"default"},"lock":{"move":true,"remove":true},"templateLock":"contentOnly"} -->
    <div class="wp-block-group hero-copy">

      <!-- wp:paragraph {"metadata":{"name":"Kicker"},"className":"kicker","lock":{"move":true,"remove":true}} -->
      <p class="kicker">A warm, honest equestrian podcast</p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"level":1,"metadata":{"name":"Hero title"},"className":"display hero-title","lock":{"move":true,"remove":true}} -->
      <h1 class="wp-block-heading display hero-title">From her first<br>pony to her own<br><span class="hl">stable yard</span></h1>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"metadata":{"name":"Lead paragraph"},"className":"lead","lock":{"move":true,"remove":true}} -->
      <p class="lead">One dad in the stands, telling the story of his daughter's life in the saddle — from a four-year-old's first wobbly trot to running her own riding school in her mid-twenties. Mental health, nerves, wins and losses, and everything young people face finding their way.</p>
      <!-- /wp:paragraph -->

      <!-- wp:html -->
      <div class="hero-actions">
        <a href="#latest" class="btn btn-primary">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>Play the latest episode
        </a>
        <a href="#about" class="btn btn-ghost">Meet the Dad</a>
      </div>
      <!-- /wp:html -->

      <!-- wp:html -->
      <div class="hero-stats">
        <div><strong>20</strong><span>years in the saddle</span></div>
        <div><strong>Weekly</strong><span>new episodes</span></div>
        <div><strong>4&nbsp;→&nbsp;24</strong><span>her whole journey</span></div>
      </div>
      <!-- /wp:html -->

    </div>
    <!-- /wp:group -->

    <!-- wp:group {"tagName":"div","metadata":{"name":"Hero media"},"className":"hero-media","layout":{"type":"default"},"lock":{"move":true,"remove":true},"templateLock":"contentOnly"} -->
    <div class="wp-block-group hero-media">

      <!-- wp:html -->
      <div class="hero-plank plank"></div>
      <!-- /wp:html -->

      <!-- wp:image {"metadata":{"name":"Hero photo"},"className":"hero-photo","aspectRatio":"4/5","scale":"cover","lock":{"move":true,"remove":true}} -->
      <figure class="wp-block-image hero-photo"><img src="<?php echo esc_url( get_template_directory_uri() . '/uploads/EquestrianDad-ComingSoon.PNG' ); ?>" alt="A warm photo of the dad and daughter"/></figure>
      <!-- /wp:image -->

      <!-- wp:html -->
      <div class="hero-float">
        <button class="mini-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div>
          <span class="mini-ep">Now playing · Ep. 24</span>
          <span class="mini-title">The day the rosettes didn't matter</span>
        </div>
      </div>
      <!-- /wp:html -->

    </div>
    <!-- /wp:group -->

  </div>
  <!-- /wp:group -->
</section>
<!-- /wp:group -->
