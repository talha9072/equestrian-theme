<?php
/**
 * Title: Newsletter Section
 * Slug: equestrian-theme/ed-newsletter
 * Categories: equestrian-theme
 * Description: Newsletter signup section for Equestrian Dad theme.
 */
?>
<!-- wp:group {"tagName":"section","className":"section tight","layout":{"type":"constrained"}} -->
<section class="wp-block-group section tight">
    <!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
    <div class="wp-block-group container">
        <!-- wp:group {"style":{"color":{"background":"#C0612E"}},"backgroundColor":"accent","className":"news-band","layout":{"type":"constrained"}} -->
        <div class="wp-block-group news-band has-accent-background-color has-background">
            <!-- wp:group {"className":"news-inner","layout":{"type":"constrained"}} -->
            <div class="wp-block-group news-inner">
                <!-- wp:group {"className":"news-text","layout":{"type":"constrained"}} -->
                <div class="wp-block-group news-text">
                    <!-- wp:paragraph {"className":"kicker on-dark","style":{"color":{"text":"#ffffff"}}} -->
                    <p class="kicker on-dark has-text-color" style="color:#ffffff;opacity:0.85">Join the yard</p>
                    <!-- /wp:paragraph -->

                    <!-- wp:heading {"className":"wp-block-heading"} -->
                    <h2 class="wp-block-heading">One warm note a week, straight to your inbox</h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph -->
                    <p>New episodes, the story behind them, and the odd photo from the lorry park. No spam — just the good stuff.</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:group -->

                <!-- wp:html -->
                <form class="nl-form news-form">
                    <input type="email" placeholder="you@example.com" aria-label="Email address" required>
                    <button class="btn btn-light" type="submit">Subscribe</button>
                </form>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</section>
<!-- /wp:group -->