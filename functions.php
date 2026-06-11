<?php
/**
 * Equestrian Theme functions and definitions
 */

function equestrian_theme_scripts() {
	// Enqueue the main stylesheet.
	wp_enqueue_style( 'equestrian-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
    
    // Enqueue original assets
    wp_enqueue_script( 'equestrian-theme-image-slot', get_template_directory_uri() . '/assets/image-slot.js', array(), '1.0.0', true );
    wp_enqueue_script( 'equestrian-theme-app', get_template_directory_uri() . '/assets/app.js', array(), '1.0.0', true );
    
    // Ensure scripts are treated as modules if needed
    add_filter('script_loader_tag', function($tag, $handle, $src) {
        if (in_array($handle, ['equestrian-theme-image-slot', 'equestrian-theme-app'])) {
            return '<script type="module" src="' . esc_url($src) . '"></script>';
        }
        return $tag;
    }, 10, 3);
}
add_action( 'wp_enqueue_scripts', 'equestrian_theme_scripts' );

/**
 * Add theme support for block styles.
 */
function equestrian_theme_support() {
	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'equestrian_theme_support' );

/**
 * Register block patterns.
 */
function equestrian_theme_register_patterns() {
    register_block_pattern_category(
        'equestrian-theme',
        array( 'label' => __( 'Equestrian Theme', 'equestrian-theme' ) )
    );

    register_block_pattern(
        'equestrian-theme/hero',
        array(
            'title'       => __( 'Hero Section', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"hero","layout":{"type":"constrained"}} -->
<section class="wp-block-group hero">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="kicker">A warm, honest equestrian podcast</span>
      <h1 class="display hero-title">From her first<br>pony to her own<br><span class="hl">stable yard</span></h1>
      <p class="lead">One dad in the stands, telling the story of his daughter\'s life in the saddle — from a four-year-old\'s first wobbly trot to running her own riding school in her mid-twenties. Mental health, nerves, wins and losses, and everything young people face finding their way.</p>
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
          <span class="mini-title">The day the rosettes didn\'t matter</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/listen-row',
        array(
            'title'       => __( 'Listen Row', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section tight","layout":{"type":"constrained"}} -->
<section class="wp-block-group section tight" id="listen" style="padding-top:0">
  <div class="container">
    <div class="listen-head">
      <span class="kicker">Subscribe & follow</span>
      <h2 class="display">Listen wherever you are</h2>
    </div>
    <div class="listen-grid">
      <a class="listen-card" href="#">
        <span class="pico apple"><svg viewBox="0 0 24 24"><circle cx="12" cy="10.5" r="2.1" fill="currentColor"/><path fill="currentColor" d="M12 14c-1.4 0-2.5 1-2.7 2.4l-.5 3.3a1 1 0 0 0 1 1.2h4.4a1 1 0 0 0 1-1.2l-.5-3.3C14.5 15 13.4 14 12 14Z"/><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M7.3 14.2a6 6 0 1 1 9.4 0M9.6 12.1a3 3 0 1 1 4.8 0"/></svg></span>
        <span><span class="plabel">Listen on</span><br><span class="pname">Apple Podcasts</span></span>
      </a>
      <a class="listen-card" href="#">
        <span class="pico spotify"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.6 14.4a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.96a.62.62 0 1 1-.28-1.2c3.8-.87 7.08-.5 9.72 1.1.3.18.39.57.21.85Zm1.23-2.74a.78.78 0 0 1-1.07.26c-2.69-1.65-6.79-2.13-9.97-1.17a.78.78 0 1 1-.45-1.49c3.63-1.1 8.15-.56 11.24 1.33.36.22.48.7.25 1.07Zm.1-2.85C14.83 8.96 9.1 8.78 5.86 9.76a.93.93 0 1 1-.54-1.78c3.72-1.13 10.05-.91 13.4 1.08a.93.93 0 1 1-.95 1.6Z"/></svg></span>
        <span><span class="plabel">Listen on</span><br><span class="pname">Spotify</span></span>
      </a>
      <a class="listen-card" href="#">
        <span class="pico amazon"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M14 4v8.7a3 3 0 1 0 1.8 2.8V8h3V4h-4.8Z"/><path fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" d="M4 18.5c3.2 1.8 6.8 1.8 10 0"/></svg></span>
        <span><span class="plabel">Listen on</span><br><span class="pname">Amazon Music</span></span>
      </a>
      <a class="listen-card" href="#">
        <span class="pico youtube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.8 12 4.8 12 4.8s-7 0-8.9.6A3 3 0 0 0 1 7.5C.4 9.4.4 12 .4 12s0 2.6.6 4.5a3 3 0 0 0 2.1 2.1c1.9.6 8.9.6 8.9.6s7 0 8.9-.6a3 3 0 0 0 2.1-2.1c.6-1.9.6-4.5.6-4.5s0-2.6-.6-4.5ZM9.8 15.3V8.7l5.7 3.3-5.7 3.3Z"/></svg></span>
        <span><span class="plabel">Watch on</span><br><span class="pname">YouTube</span></span>
      </a>
    </div>
  </div>
</section>',
        )
    );

    register_block_pattern(
        'equestrian-theme/about-dad',
        array(
            'title'       => __( 'About Dad Section', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group section" id="about">
  <div class="container about-grid">
    <div class="about-media">
      <div class="about-plank plank"></div>
      <image-slot id="about-photo" class="about-photo" shape="rounded" radius="20" placeholder="A photo from the lorry park"></image-slot>
    </div>
    <div class="about-copy">
      <span class="kicker">Meet the Equestrian Dad</span>
      <h2 class="display" style="font-size:clamp(34px,4.5vw,54px);margin:12px 0 0">I held the lead rope. She did the brave bit.</h2>
      <p class="serif about-lead">It started when she was four years old and sat on a pony for the very first time. I had no idea that wobbly little trot was the start of twenty years of early mornings, muddy boots, tears in the lorry park, and a quiet kind of courage I\'m still learning from.</p>
      <p class="serif about-lead">Now she\'s in her mid-twenties, running her own riding school and an alternative provision for young people who need somewhere to belong. This is her journey — told honestly, from the one place I\'ve always had: the seat in the stands.</p>
      <div class="about-sign">
        <span class="hand">— Dad</span>
        <a href="episode.html" class="btn btn-dark">Start from episode one</a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/themes-grid',
        array(
            'title'       => __( 'Themes Grid', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"backgroundColor":"cream-deep","layout":{"type":"constrained"}} -->
<section class="wp-block-group section has-cream-deep-background-color has-background" style="background-color:var(--cream-deep)">
  <div class="container">
    <div class="section-head center">
      <span class="kicker">What we talk about</span>
      <h2>The real stuff, with an equestrian twist</h2>
      <p class="lead">Every episode sits a true story from the yard next to the things every young person wrestles with growing up.</p>
    </div>
    <div class="themes-grid">
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-4.5-9.5-9C.8 8.5 2.5 5 6 5c2 0 3.2 1.2 4 2.4C10.8 6.2 12 5 14 5c3.5 0 5.2 3.5 3.5 7-2.5 4.5-5.5 9-5.5 9Z"/></svg></div>
        <h3>Mental health</h3>
        <p>Talking openly about the heavy days — and how the yard can be both the pressure and the cure.</p>
      </div>
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6l7-3Z"/><path d="M9.5 12l1.8 1.8L15 10"/></svg></div>
        <h3>Overcoming anxiety</h3>
        <p>Competition nerves, the fear after a fall, and the small rituals that get you back in the saddle.</p>
      </div>
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8M12 17v4M6 4h12v4a6 6 0 0 1-12 0V4ZM6 5H3v2a3 3 0 0 0 3 3M18 5h3v2a3 3 0 0 1-3 3"/></svg></div>
        <h3>Wins & losses</h3>
        <p>Holding a rosette lightly and a heartbreak gently — and why the result was never the point.</p>
      </div>
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18c3-6 5-9 8-9s5 3 8 9M12 9V4M9 6l3-2 3 2"/></svg></div>
        <h3>Obstacles</h3>
        <p>Injuries, setbacks and the jumps that look too big — and learning to ride at them anyway.</p>
      </div>
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M3 20a6 6 0 0 1 12 0M16 6a3 3 0 0 1 0 6M18 20a6 6 0 0 0-3-5.2"/></svg></div>
        <h3>Peer pressure</h3>
        <p>Finding your own line when everyone else is jumping — friendship, fitting in, and staying true.</p>
      </div>
      <div class="theme-card">
        <div class="theme-ico"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M15.5 8.5l-2 5-5 2 2-5 5-2Z"/></svg></div>
        <h3>Finding your way</h3>
        <p>From pony-mad kid to running her own yard — building a life and a livelihood you believe in.</p>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/episodes-list',
        array(
            'title'       => __( 'Episodes List', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group section" id="latest">
  <div class="container">
    <div class="eyebrow-row">
      <div><span class="kicker">From the archive</span><h2 class="display">Recent episodes</h2></div>
      <a href="episode.html" class="btn btn-ghost">Browse all episodes →</a>
    </div>
    <div class="ep-list">
      <a class="ep-row" href="episode.html">
        <button class="ep-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div><span class="ep-num">EP 24</span><h3>The day the rosettes didn\'t matter</h3><p>Losing well, the pressure we put on our kids, and learning the result was never the point.</p></div>
        <div class="ep-side"><span class="dur">45 min</span><br>9 Jun 2026</div>
      </a>
      <a class="ep-row" href="episode.html">
        <button class="ep-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div><span class="ep-num">EP 23</span><h3>First day at the new yard</h3><p>Starting again, feeling like the outsider, and the friend who made all the difference.</p></div>
        <div class="ep-side"><span class="dur">38 min</span><br>2 Jun 2026</div>
      </a>
      <a class="ep-row" href="episode.html">
        <button class="ep-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div><span class="ep-num">EP 22</span><h3>The fall, and getting back on</h3><p>What really happens to your confidence after a bad one — and how we rebuilt it, jump by jump.</p></div>
        <div class="ep-side"><span class="dur">52 min</span><br>26 May 2026</div>
      </a>
      <a class="ep-row" href="episode.html">
        <button class="ep-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div><span class="ep-num">EP 21</span><h3>When she said she wanted to teach</h3><p>The conversation that turned a hobby into a calling — and a business plan written on a feed-room wall.</p></div>
        <div class="ep-side"><span class="dur">41 min</span><br>19 May 2026</div>
      </a>
      <a class="ep-row" href="episode.html">
        <button class="ep-play" aria-label="Play"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></button>
        <div><span class="ep-num">EP 20</span><h3>The pony nobody else wanted</h3><p>A tricky little mare, a stubborn ten-year-old, and the unlikely partnership that taught us both patience.</p></div>
        <div class="ep-side"><span class="dur">36 min</span><br>12 May 2026</div>
      </a>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/quote-band',
        array(
            'title'       => __( 'Quote Band', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"quote-band plank","layout":{"type":"constrained"}} -->
<section class="wp-block-group quote-band plank">
  <div class="container">
    <svg class="quote-mark" viewBox="0 0 24 24" fill="currentColor"><path d="M10 7H6a4 4 0 0 0-4 4v6h7v-6H5a1 1 0 0 1 1-1h2V7Zm12 0h-4a4 4 0 0 0-4 4v6h7v-6h-4a1 1 0 0 1 1-1h2V7Z"/></svg>
    <blockquote class="quote-text serif">Listening on the school run, my daughter turned to me and said, “Dad, that\'s exactly how I feel.” This podcast started a conversation we\'d never managed to have.</blockquote>
    <p class="quote-cite">— A listener, somewhere in a muddy lorry park</p>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/store-teaser',
        array(
            'title'       => __( 'Store Teaser', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section","layout":{"type":"constrained"}} -->
<section class="wp-block-group section" id="shop">
  <div class="container">
    <div class="eyebrow-row">
      <div><span class="kicker">The ED Shop</span><h2 class="display">Wear the yard</h2></div>
      <a href="store.html" class="btn btn-ghost">Visit the shop →</a>
    </div>
    <div class="product-grid">
      <div class="product">
        <div class="pimg"><span class="tag">Bestseller</span><image-slot id="p-hoodie" shape="rect" placeholder="Hoodie photo"></image-slot></div>
        <div class="pbody">
          <span class="pcat">Apparel</span>
          <h3>Equestrian Dad Hoodie</h3>
          <div class="prow"><span class="price">£42</span><button class="add" data-name="Equestrian Dad Hoodie">Add to basket</button></div>
        </div>
      </div>
      <div class="product">
        <div class="pimg"><image-slot id="p-mug" shape="rect" placeholder="Mug photo"></image-slot></div>
        <div class="pbody">
          <span class="pcat">Yard kit</span>
          <h3>“Seat in the Stands” Mug</h3>
          <div class="prow"><span class="price">£14</span><button class="add" data-name="Seat in the Stands Mug">Add to basket</button></div>
        </div>
      </div>
      <div class="product">
        <div class="pimg"><span class="tag">New</span><image-slot id="p-tote" shape="rect" placeholder="Tote photo"></image-slot></div>
        <div class="pbody">
          <span class="pcat">Accessories</span>
          <h3>Muck & Manners Tote</h3>
          <div class="prow"><span class="price">£18</span><button class="add" data-name="Muck & Manners Tote">Add to basket</button></div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );

    register_block_pattern(
        'equestrian-theme/newsletter',
        array(
            'title'       => __( 'Newsletter Section', 'equestrian-theme' ),
            'categories'  => array( 'equestrian-theme' ),
            'content'     => '<!-- wp:group {"tagName":"section","className":"section tight","layout":{"type":"constrained"}} -->
<section class="wp-block-group section tight">
  <div class="container">
    <div class="news-band" style="background:var(--accent)">
      <div class="news-inner">
        <div>
          <span class="kicker on-dark" style="color:#fff;opacity:.85">Join the yard</span>
          <h2>One warm note a week, straight to your inbox</h2>
          <p>New episodes, the story behind them, and the odd photo from the lorry park. No spam — just the good stuff.</p>
        </div>
        <form class="nl-form news-form">
          <input type="email" placeholder="you@example.com" aria-label="Email address" required>
          <button class="btn btn-light" type="submit">Subscribe</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /wp:group -->',
        )
    );
}
add_action( 'init', 'equestrian_theme_register_patterns' );

/**
 * Register block patterns and categories.
 */
function equestrian_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'equestrian_theme_setup' );
