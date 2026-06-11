<?php
/**
 * Title: Hero Section
 * Slug: equestrian-theme/hero
 * Categories: equestrian-theme
 */
?>
<!-- wp:group {"tagName":"section","className":"hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="kicker">A warm, honest equestrian podcast</span>
      <h1 class="display hero-title">From her first<br>pony to her own<br><span class="hl">stable yard</span></h1>
      <p class="lead">One dad in the stands, telling the story of his daughter's life in the saddle — from a four-year-old's first wobbly trot to running her own riding school in her mid-twenties. Mental health, nerves, wins and losses, and everything young people face finding their way.</p>
      <div class="hero-actions">
        <a href="#latest" class="btn btn-primary">
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>Play the latest episode
        </a>
        <a href="#about" class="btn btn-ghost">Meet the Dad</a>
      </div>
      <div class="hero-stats">
        <div><strong>20</strong><span>years in the saddle</span></div>
        <div><strong>Weekly</strong><span>new episodes</span></div>
        <div><strong>4&nbsp;→&nbsp;24</strong><span>her whole journey</span></div>
      </div>
    </div>

    <div class="hero-media">
      <div class="hero-plank plank"></div>
      <image-slot id="hero-photo" class="hero-photo" shape="rounded" radius="20" placeholder="Drop a warm photo of the dad &amp; daughter"></image-slot>
      <div class="hero-float">
        <button class="mini-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div>
          <span class="mini-ep">Now playing · Ep. 24</span>
          <span class="mini-title">The day the rosettes didn't matter</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->
