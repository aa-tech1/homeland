<?php
/**
 * Settings for Demo Import
 *
 * @package Whizzie
 * @since 1.0.0
 */

if ( ! defined( 'WHIZZIE_DIR' ) ) {
	define( 'WHIZZIE_DIR', dirname( __FILE__ ) );
}

require trailingslashit( WHIZZIE_DIR ) . 'importer.php';

$current_theme = wp_get_theme();
$theme_title = $current_theme->get( 'Name' );

$business_development_coaching_config['page_slug'] 	= 'business-development-coaching';
$business_development_coaching_config['page_title']	= 'Demo Import';

$business_development_coaching_config['steps'] = array(
	'widgets' => array(
		'id'			=> 'widgets',
		'title'			=> __( 'Demo Importer', 'business-development-coaching' ),
		'icon'			=> 'welcome-widgets-menus',
		'button_text_one'	=> __( 'Click On The Image To Import Customizer Demo', 'business-development-coaching' ),
		'button_text_two'	=> __( 'Click On The Image To Import Gutenberg Block Demo', 'business-development-coaching' ),
		'can_skip'		=> true,
	),
	'done' => array(
		'id'			=> 'done',
		'title'			=> __( 'All Done', 'business-development-coaching' ),
		'icon'			=> 'yes',
	)
);

if( class_exists( 'ThemeWhizzie' ) ) {
	$ThemeWhizzie = new ThemeWhizzie( $business_development_coaching_config );
}