<?php
/**
 * Site Theme — functions and definitions
 *
 * Child theme of: Twenty Twenty-Five
 * Theme concept:  Emerald Editorial
 *
 * Customer inspiration sites:
 *  - Medium.com         → clean, typography-first reading experience
 *  - NationalGeographic.com → editorial richness, immersive imagery
 *  - SmashingMagazine.com   → clear content hierarchy, professional blog
 *
 * Closest available WordPress parent theme: Twenty Twenty-Five
 *  (minimalist FSE theme, strong typography, accessibility-ready)
 *
 * Content topic: Urban Gardening
 *
 * @package SiteTheme
 */

// ================================================================
// 1. ENQUEUE PARENT + CHILD STYLES AND SCRIPTS
// ================================================================
add_action( 'wp_enqueue_scripts', 'site_theme_enqueue_styles' );
function site_theme_enqueue_styles() {
	wp_enqueue_style(
		'parent-style',
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme()->parent()->get( 'Version' )
	);

	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[ 'parent-style' ],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script(
		'site-theme-elements',
		get_stylesheet_directory_uri() . '/customElements.js',
		[],
		wp_get_theme()->get( 'Version' ),
		true
	);
}

// ================================================================
// 2. THEME SETUP
// ================================================================
add_action( 'after_setup_theme', 'site_theme_setup' );
function site_theme_setup() {
	register_nav_menus( [
		'primary' => __( 'Primary Menu', 'site-theme' ),
		'footer'  => __( 'Footer Menu', 'site-theme' ),
	] );
}

// ================================================================
// 3. CREATE DEMO CONTENT ON THEME ACTIVATION
//    Runs once when the theme is activated; skips if already done.
// ================================================================
// Fires when theme is switched via WP admin
add_action( 'after_switch_theme', 'site_theme_create_demo_content' );
function site_theme_create_demo_content() {

	if ( get_option( 'site_theme_demo_content_created' ) ) {
		return;
	}

	// ---- Category -------------------------------------------
	$cat_id = wp_create_category( 'Urban Gardening' );

	// ---- POST 1: 5 Essential Tips ----------------------------
	$post1_content = '<!-- wp:paragraph -->
<p>Growing your own food in the city is more than a trend — it is a movement transforming how millions of people connect with nature, reduce their carbon footprint, and eat fresher food every day. Whether you have a rooftop, balcony, or a sunny windowsill, you can start today.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"alt":"A vibrant balcony container garden with tomatoes, herbs, and flowering plants growing in colourful terracotta pots","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://picsum.photos/seed/urbangarden/800/500" alt="A vibrant balcony container garden with tomatoes, herbs, and flowering plants growing in colourful terracotta pots" /></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Tip 1 — Start with a Sunny Spot</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Most vegetables need at least 6–8 hours of direct sunlight each day. Identify the sunniest spot in your space — a south-facing balcony or window sill is ideal. If light is limited, focus on shade-tolerant plants like lettuce, spinach, and mint.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Tip 2 — Choose the Right Containers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Containers come in all shapes and sizes. Ensure any pot you use has drainage holes — waterlogged roots are the number one killer of container plants. Fabric grow bags are excellent for tomatoes, peppers, and root vegetables because they air-prune roots naturally.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Tip 3 — Invest in Quality Potting Mix</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Never use garden soil in containers — it compacts and drains poorly. Opt for a high-quality potting mix enriched with compost. Adding perlite improves drainage, while vermiculite retains moisture — a good balance helps plants thrive.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Tip 4 — Water Consistently</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Container gardens dry out much faster than ground beds. Check soil moisture daily in summer by pushing your finger an inch into the soil — if it feels dry, water thoroughly until it drains from the bottom. Self-watering planters or a simple drip system can help on busy days.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Tip 5 — Feed Regularly</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Frequent watering leaches nutrients from potting mix quickly. Feed your plants every two weeks during the growing season with a balanced liquid fertiliser. For edibles, look for organic options — what goes into the soil goes into your food.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p><strong>Ready to get started?</strong> Browse our other posts for plant recommendations and seasonal growing guides. Your urban garden journey begins with a single seed.</p>
<!-- /wp:paragraph -->';

	$post1_id = wp_insert_post( [
		'post_title'    => '5 Essential Tips for Starting Your Urban Garden',
		'post_content'  => $post1_content,
		'post_excerpt'  => 'Whether you have a rooftop, balcony, or a sunny windowsill, these five essential tips will help you start growing your own food in the city.',
		'post_status'   => 'publish',
		'post_type'     => 'post',
		'post_category' => [ $cat_id ],
	] );

	// ---- POST 2: Best Vegetables ----------------------------
	$post2_content = '<!-- wp:paragraph -->
<p>Limited outdoor space does not mean limited harvests. Dozens of productive vegetables thrive in pots, window boxes, and compact raised beds. Here are the best crops for small-space urban gardeners — chosen for flavour, yield, and ease of care.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"alt":"An assortment of freshly harvested vegetables — tomatoes, peppers, radishes, and herbs — arranged on a rustic wooden table beside terracotta pots","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://picsum.photos/seed/vegetables2026/800/500" alt="An assortment of freshly harvested vegetables — tomatoes, peppers, radishes, and herbs — arranged on a rustic wooden table beside terracotta pots" /></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">1. Cherry Tomatoes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Cherry tomato cultivars such as <strong>Tumbling Tom</strong>, <strong>Tiny Tim</strong>, and <strong>Balcony Red</strong> were bred for containers. They produce abundantly in pots as small as 30 cm in diameter. Position them in your sunniest spot and water daily in hot weather.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">2. Cut-and-Come-Again Salad Leaves</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lettuce and spinach are arguably the most rewarding crops for beginners. Sow directly into a window box and harvest outer leaves as needed — the plant keeps producing. They tolerate partial shade, making them ideal for north-facing balconies or shaded windowsills.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">3. Radishes</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>With a harvest cycle as short as 25 days, radishes are one of the fastest crops you can grow. A 15 cm deep container works perfectly. Sow successively every two weeks for a continuous supply throughout spring and autumn.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">4. Chillies and Sweet Peppers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Chilli plants are ornamental as well as productive, and they thrive in warm, sheltered spots. Compact varieties like <strong>Prairie Fire</strong> and <strong>Apache</strong> produce hundreds of fruits per season in a standard 3-litre pot. Sweet pepper varieties like <strong>Mohawk</strong> are equally container-friendly.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">5. Herbs</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>No urban kitchen garden is complete without herbs. Basil, parsley, coriander, chives, and mint all thrive on a windowsill. Keep mint in its own container — it spreads aggressively. Rosemary, thyme, and oregano prefer drier conditions and excellent drainage.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">6. Dwarf French Beans</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Dwarf (bush) French beans do not need staking, making them perfect for containers. Sow from late spring once frost risk has passed. A single 40 cm pot holds 6–8 plants and delivers a generous harvest all summer long.</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><!-- wp:paragraph -->
<p>"The best time to plant a tree was 20 years ago. The second best time is now."</p>
<!-- /wp:paragraph --><cite>— Chinese Proverb</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:paragraph -->
<p>Whatever your space, there is a vegetable perfectly suited to it. Start with two or three varieties you love to eat, master those, then expand your garden year by year. Happy growing!</p>
<!-- /wp:paragraph -->';

	$post2_id = wp_insert_post( [
		'post_title'    => 'The Best Vegetables to Grow in Small Spaces',
		'post_content'  => $post2_content,
		'post_excerpt'  => 'Limited space does not mean limited harvests. Discover the top vegetables — from cherry tomatoes to dwarf beans — that thrive in containers, window boxes, and small raised beds.',
		'post_status'   => 'publish',
		'post_type'     => 'post',
		'post_category' => [ $cat_id ],
	] );

	// ---- ABOUT PAGE -----------------------------------------
	$about_content = '<!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">About GreenCity</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">GreenCity is dedicated to helping urban residents reclaim their relationship with nature — one pot, planter, and rooftop at a time. We believe that fresh, home-grown food should be accessible to everyone, regardless of how little outdoor space they have.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Watch: The Power of Urban Gardening</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Inspired by community leaders who have transformed neglected urban spaces into thriving food gardens, we believe every city neighbourhood can become a place of abundance. Watch this video to understand why growing food in cities matters more than ever:</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="video-embed-wrapper">
  <iframe
    title="Urban Gardening — Growing Food in the City (YouTube video about community urban farming and sustainability)"
    src="https://www.youtube.com/embed/EzZzZ_qpZ4w"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    allowfullscreen
    loading="lazy"
    referrerpolicy="strict-origin-when-cross-origin"
    aria-label="YouTube video about urban gardening and community food growing">
  </iframe>
</div>
<!-- /wp:html -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Who We Are</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Founded in 2019</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>GreenCity started as a small community blog written by a group of city gardeners sharing tips from their balconies and rooftops in Brooklyn. Today we reach over 50,000 urban growers every month.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Our Values</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul class="wp-block-list"><!-- wp:list-item --><li>Sustainability over convenience</li><!-- /wp:list-item --><!-- wp:list-item --><li>Community over competition</li><!-- /wp:list-item --><!-- wp:list-item --><li>Organic, low-impact growing methods</li><!-- /wp:list-item --><!-- wp:list-item --><li>Inclusive and accessible information</li><!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Our Story</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>It began with a single tomato plant on a Brooklyn fire escape. Our founder, Maria, had grown up watching her grandmother tend a large vegetable garden in the countryside and wanted to recreate that connection to the earth even in a cramped apartment. After a surprisingly successful first harvest, she started documenting her experiments online.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>The response was immediate. Dozens, then hundreds of city dwellers wrote in with their own balcony growing stories. GreenCity grew organically from that conversation into the resource it is today — a trusted guide for anyone who wants to grow their own food, no matter how small their outdoor space.</p>
<!-- /wp:paragraph -->';

	$about_id = wp_insert_post( [
		'post_title'   => 'About',
		'post_content' => $about_content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
	] );

	// ---- CONTACT PAGE ---------------------------------------
	$contact_content = '<!-- wp:heading {"textAlign":"center","level":1} -->
<h1 class="wp-block-heading has-text-align-center">Contact Us</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Have a question, a growing tip to share, or want to partner with us? We would love to hear from you. Visit our community garden or send us a message below.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:columns {"verticalAlignment":"top"} -->
<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Contact Details</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><strong>GreenCity Urban Gardens</strong><br>990 Washington Avenue<br>Brooklyn, NY 11225<br>United States</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Email:</strong> hello@greencity.example<br><strong>Phone:</strong> +1 (718) 555-0123<br><strong>Hours:</strong> Monday – Friday, 9 am – 5 pm EST</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Connect With Us</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Share your growing journey and tag your photos <strong>#GreenCityGrows</strong> to be featured on our site. We are active on Instagram, Facebook, and Pinterest.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Send a Message</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<form action="#" method="post" novalidate aria-label="Contact form">
  <div style="margin-bottom:1.25em;">
    <label for="contact-name" style="display:block;font-weight:600;margin-bottom:0.35em;">
      Your Name <span aria-hidden="true" style="color:#c0392b;">*</span>
      <span class="screen-reader-text"> (required)</span>
    </label>
    <input
      type="text"
      id="contact-name"
      name="name"
      required
      autocomplete="name"
      aria-required="true" />
  </div>
  <div style="margin-bottom:1.25em;">
    <label for="contact-email" style="display:block;font-weight:600;margin-bottom:0.35em;">
      Email Address <span aria-hidden="true" style="color:#c0392b;">*</span>
      <span class="screen-reader-text"> (required)</span>
    </label>
    <input
      type="email"
      id="contact-email"
      name="email"
      required
      autocomplete="email"
      aria-required="true" />
  </div>
  <div style="margin-bottom:1.25em;">
    <label for="contact-subject" style="display:block;font-weight:600;margin-bottom:0.35em;">Subject</label>
    <input type="text" id="contact-subject" name="subject" autocomplete="off" />
  </div>
  <div style="margin-bottom:1.25em;">
    <label for="contact-message" style="display:block;font-weight:600;margin-bottom:0.35em;">
      Message <span aria-hidden="true" style="color:#c0392b;">*</span>
      <span class="screen-reader-text"> (required)</span>
    </label>
    <textarea
      id="contact-message"
      name="message"
      required
      rows="6"
      aria-required="true"
      style="resize:vertical;"></textarea>
  </div>
  <button
    type="submit"
    style="background-color:#2D6A4F;color:#ffffff;border:2px solid #2D6A4F;border-radius:4px;padding:0.7em 2em;font-size:1em;font-weight:600;cursor:pointer;transition:background-color 0.2s ease;">
    Send Message
  </button>
</form>
<!-- /wp:html --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator -->
<hr class="wp-block-separator has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Find Us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We host monthly community gardening workshops at the Brooklyn Botanic Garden. Join us to learn, grow, and connect with fellow urban gardeners across the city.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="map-container">
  <iframe
    title="Map showing GreenCity Urban Gardens location at Brooklyn Botanic Garden, 990 Washington Avenue, Brooklyn, New York"
    src="https://maps.google.com/maps?q=Brooklyn+Botanic+Garden,+990+Washington+Ave,+Brooklyn,+NY+11225&output=embed&z=15"
    width="100%"
    height="450"
    style="border:0;display:block;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"
    aria-label="Interactive Google Map showing Brooklyn Botanic Garden in Brooklyn, New York">
  </iframe>
</div>
<!-- /wp:html -->';

	$contact_id = wp_insert_post( [
		'post_title'   => 'Contact',
		'post_content' => $contact_content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
	] );

	// ---- BLOG PAGE (posts index) ----------------------------
	$blog_id = wp_insert_post( [
		'post_title'   => 'Blog',
		'post_content' => '',
		'post_status'  => 'publish',
		'post_type'    => 'page',
	] );

	// ---- HOME PAGE ------------------------------------------
	$home_content = '<!-- wp:cover {"overlayColor":"accent-3","minHeight":480,"align":"full","contentPosition":"center center"} -->
<div class="wp-block-cover alignfull has-accent-3-background-color" style="min-height:480px">
<span aria-hidden="true" class="wp-block-cover__background has-accent-3-background-color has-background-dim-100 has-background-dim"></span>
<div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"clamp(2rem,5vw,3.25rem)"}}} -->
<h1 class="wp-block-heading has-text-align-center" style="color:#ffffff;font-size:clamp(2rem,5vw,3.25rem)">Grow Food. Build Community.<br>Live Sustainably.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"1.2rem"}}} -->
<p class="has-text-align-center" style="color:#ffffff;font-size:1.2rem">Your guide to urban gardening, container growing, and sustainable city living.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"base","textColor":"accent-3","style":{"typography":{"fontWeight":"700"},"border":{"radius":"4px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-accent-3-color has-base-background-color wp-element-button" style="font-weight:700;border-radius:4px">Explore the Blog</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:3rem;padding-bottom:3rem"><!-- wp:heading {"textAlign":"center","level":2} -->
<h2 class="wp-block-heading has-text-align-center">Latest from the Blog</h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"postsToShow":2,"displayFeaturedImage":true,"featuredImageSizeWidth":480,"featuredImageSizeHeight":320,"addLinkToFeaturedImage":true,"displayPostExcerpt":true,"excerptLength":30,"columns":2,"displayLayout":"grid"} /--></div>
<!-- /wp:group -->';

	$home_id = wp_insert_post( [
		'post_title'   => 'Home',
		'post_content' => $home_content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
	] );

	// ---- READING SETTINGS -----------------------------------
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home_id );
	update_option( 'page_for_posts', $blog_id );

	// ---- PRIMARY NAVIGATION MENU ----------------------------
	if ( ! wp_get_nav_menu_object( 'Primary Menu' ) ) {
		$menu_id = wp_create_nav_menu( 'Primary Menu' );

		foreach ( [
			[ 'Home',    $home_id    ],
			[ 'Blog',    $blog_id    ],
			[ 'About',   $about_id   ],
			[ 'Contact', $contact_id ],
		] as $item ) {
			wp_update_nav_menu_item( $menu_id, 0, [
				'menu-item-title'     => $item[0],
				'menu-item-object'    => 'page',
				'menu-item-object-id' => $item[1],
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
			] );
		}

		set_theme_mod( 'nav_menu_locations', [ 'primary' => $menu_id ] );
	}

	// ---- MARK COMPLETE --------------------------------------
	update_option( 'site_theme_demo_content_created', true );
}
