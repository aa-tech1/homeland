<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Business Development Coaching
 */

function business_development_coaching_body_classes( $business_development_coaching_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$business_development_coaching_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$business_development_coaching_classes[] = 'no-sidebar'; 
	}

	return $business_development_coaching_classes;
}
add_filter( 'body_class', 'business_development_coaching_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function business_development_coaching_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'business_development_coaching_pingback_header' );
