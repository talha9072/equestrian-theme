<?php
/**
 * Title: Listen Section
 * Slug: equestrian-theme/listen-section
 * Categories: equestrian-theme
 * Description: A row of podcast platform links.
 */
?>
<!-- wp:group {"tagName":"section","className":"section tight listen-row-section","layout":{"type":"constrained"}} -->
<section class="wp-block-group section tight listen-row-section">
    <!-- wp:group {"className":"container","layout":{"type":"constrained"}} -->
    <div class="wp-block-group container">
        <!-- wp:group {"className":"listen-head","layout":{"type":"constrained"}} -->
        <div class="wp-block-group listen-head">
            <!-- wp:paragraph {"align":"center","className":"kicker"} -->
            <p class="has-text-align-center kicker">Subscribe &amp; follow</p>
            <!-- /wp:paragraph -->

            <!-- wp:heading {"textAlign":"center","level":2,"className":"display"} -->
            <h2 class="wp-block-heading has-text-align-center display">Listen wherever you are</h2>
            <!-- /wp:heading -->
        </div>
        <!-- /wp:group -->

        <!-- wp:columns {"className":"listen-grid"} -->
        <div class="wp-block-columns listen-grid">
            
            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"listen-card","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group listen-card">
                    <!-- wp:html -->
                    <span class="pico apple"><svg viewBox="0 0 24 24" width="24" height="24"><circle cx="12" cy="10.5" r="2.1" fill="currentColor"/><path fill="currentColor" d="M12 14c-1.4 0-2.5 1-2.7 2.4l-.5 3.3a1 1 0 0 0 1 1.2h4.4a1 1 0 0 0 1-1.2l-.5-3.3C14.5 15 13.4 14 12 14Z"/><path fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" d="M7.3 14.2a6 6 0 1 1 9.4 0M9.6 12.1a3 3 0 1 1 4.8 0"/></svg></span>
                    <!-- /wp:html -->
                    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"className":"plabel"} -->
                        <p class="plabel">Listen on</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"pname"} -->
                        <p class="pname">Apple Podcasts</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"listen-card","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group listen-card">
                    <!-- wp:html -->
                    <span class="pico spotify"><svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20Zm4.6 14.4a.62.62 0 0 1-.86.21c-2.35-1.44-5.3-1.76-8.79-.96a.62.62 0 1 1-.28-1.2c3.8-.87 7.08-.5 9.72 1.1.3.18.39.57.21.85Zm1.23-2.74a.78.78 0 0 1-1.07.26c-2.69-1.65-6.79-2.13-9.97-1.17a.78.78 0 1 1-.45-1.49c3.63-1.1 8.15-.56 11.24 1.33.36.22.48.7.25 1.07Zm.1-2.85C14.83 8.96 9.1 8.78 5.86 9.76a.93.93 0 1 1-.54-1.78c3.72-1.13 10.05-.91 13.4 1.08a.93.93 0 1 1-.95 1.6Z"/></svg></span>
                    <!-- /wp:html -->
                    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"className":"plabel"} -->
                        <p class="plabel">Listen on</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"pname"} -->
                        <p class="pname">Spotify</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"listen-card","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group listen-card">
                    <!-- wp:html -->
                    <span class="pico amazon"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M14 4v8.7a3 3 0 1 0 1.8 2.8V8h3V4h-4.8Z"/><path fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" d="M4 18.5c3.2 1.8 6.8 1.8 10 0"/></svg></span>
                    <!-- /wp:html -->
                    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"className":"plabel"} -->
                        <p class="plabel">Listen on</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"pname"} -->
                        <p class="pname">Amazon Music</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:group {"className":"listen-card","layout":{"type":"flex","flexWrap":"nowrap"}} -->
                <div class="wp-block-group listen-card">
                    <!-- wp:html -->
                    <span class="pico youtube"><svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M23 7.5a3 3 0 0 0-2.1-2.1C19 4.8 12 4.8 12 4.8s-7 0-8.9.6A3 3 0 0 0 1 7.5C.4 9.4.4 12 .4 12s0 2.6.6 4.5a3 3 0 0 0 2.1 2.1c1.9.6 8.9.6 8.9.6s7 0 8.9-.6a3 3 0 0 0 2.1-2.1c.6-1.9.6-4.5.6-4.5s0-2.6-.6-4.5ZM9.8 15.3V8.7l5.7 3.3-5.7 3.3Z"/></svg></span>
                    <!-- /wp:html -->
                    <!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
                    <div class="wp-block-group">
                        <!-- wp:paragraph {"className":"plabel"} -->
                        <p class="plabel">Watch on</p>
                        <!-- /wp:paragraph -->
                        <!-- wp:paragraph {"className":"pname"} -->
                        <p class="pname">YouTube</p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->
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
