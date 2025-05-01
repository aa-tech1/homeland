<?php
/*This file is part of Portfolio Expert child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
$portfolio_expert_lite_theme = wp_get_theme();
if (!defined('PORTFOLIO_EXPERT_LITE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('PORTFOLIO_EXPERT_LITE_VERSION', $portfolio_expert_lite_theme->get('Version'));
}

function portfolio_expert_lite_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Poppins:400,600';
	$font_families[] = 'Lato:400,600,700';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');

	return esc_url_raw($fonts_url);
}


function portfolio_expert_lite_enqueue_child_styles()
{
	wp_enqueue_style('portfolio-expert-lite-google-font', portfolio_expert_lite_fonts_url(), array(), null);
	wp_enqueue_style('portfolio-expert-lite-parent-style', get_template_directory_uri() . '/style.css', array('portfolio-expert-style'), PORTFOLIO_EXPERT_LITE_VERSION, 'all');
	wp_enqueue_style('portfolio-expert-lite-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('bootstrap', 'portfolio-expert-style', 'portfolio-expert-main-style', 'portfolio-expert-default-style'), PORTFOLIO_EXPERT_LITE_VERSION, 'all');

	wp_enqueue_script(
		'portfolio-expert-lite-scroll-animations',
		get_stylesheet_directory_uri() . '/assets/js/scroll-animations.js',
		array('jquery'),
		PORTFOLIO_EXPERT_LITE_VERSION,
		true
	);
}
add_action('wp_enqueue_scripts', 'portfolio_expert_lite_enqueue_child_styles');





add_filter('excerpt_more', 'portfolio_expert_lite_exerpt_empty_string', 999);
function portfolio_expert_lite_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
function portfolio_expert_lite_excerpt_length($length)
{
	if (is_admin()) {
		return $length;
	}
	return 20;
}
add_filter('excerpt_length', 'portfolio_expert_lite_excerpt_length', 999);


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function portfolio_expert_lite_body_classes($classes)
{
	// Remove theme-dark class using array_filter
	$classes = array_filter($classes, function ($class) {
		return $class !== 'theme-dark';
	});

	// Add theme-light class
	$classes[] = 'theme-light';

	return $classes;
}
add_filter('body_class', 'portfolio_expert_lite_body_classes', 20);
