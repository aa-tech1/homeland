<?php
function expert_business_advisor_typography_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_business_advisor_typography', array(
			'priority' => 31,
			'title' => esc_html__( 'Typography Options', 'expert-business-advisor' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_typography_settings', array(
			'title' => esc_html__( 'Heading/Content Typography Options', 'expert-business-advisor' ),
			'priority' => 1,
			'panel' => 'expert_business_advisor_typography',
		)
	);
	$expert_business_advisor_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
		'Inter:400' => 'Inter',
	);

	$wp_customize->add_setting( 'expert_business_advisor_headings_text', array(
		'sanitize_callback' => 'expert_business_advisor_sanitize_fonts',
	));

	$wp_customize->add_control( 'expert_business_advisor_headings_text', array(
		'type' => 'select',
		'description' => __('Select your appropriate font for the headings.', 'expert-business-advisor'),
		'section' => 'expert_business_advisor_typography_settings',
		'choices' => $expert_business_advisor_font_choices

	));

	$wp_customize->add_setting( 'expert_business_advisor_body_text', array(
		'sanitize_callback' => 'expert_business_advisor_sanitize_fonts'
	));

	$wp_customize->add_control( 'expert_business_advisor_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your appropriate font for the body.', 'expert-business-advisor' ),
		'section' => 'expert_business_advisor_typography_settings',
		'choices' => $expert_business_advisor_font_choices
	) );
	
	$wp_customize->add_section(
	'expert_business_advisor_dynamic_color_settings', array(
		'title' => esc_html__( 'Dynamic Color Options', 'expert-business-advisor' ),
		'priority' => 1,
		'panel' => 'expert_business_advisor_typography',
		)
	);

	$wp_customize->add_setting('expert_business_advisor_dynamic_color_one', array(
        'default'           => '#0B57CA',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'expert_business_advisor_dynamic_color_one', array(
        'label'    => __('First Dynamic Color', 'expert-business-advisor'),
        'section'  => 'expert_business_advisor_dynamic_color_settings',
    )));

	$wp_customize->add_setting('expert_business_advisor_dynamic_color_two', array(
        'default'           => '#c3815b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'expert_business_advisor_dynamic_color_two', array(
        'label'    => __('Second Dynamic Color', 'expert-business-advisor'),
        'section'  => 'expert_business_advisor_dynamic_color_settings',
    )));

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_20_color',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_20_color',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_dynamic_color_settings',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_20_color',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_20',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_20',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_typography_settings',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_20',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_business_advisor_typography_setting' );