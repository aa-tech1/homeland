<?php

	require get_template_directory() . '/demo-import/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function expert_business_advisor_register_recommended_plugins() {
	$plugins = array(
		
		array(
			'name'             => __( 'Contact Form 7', 'expert-business-advisor' ),
			'slug'             => 'contact-form-7',
			'required'         => false,
			'force_activation' => false,
		)

	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'expert_business_advisor_register_recommended_plugins' );