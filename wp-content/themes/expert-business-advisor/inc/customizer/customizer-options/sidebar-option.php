<?php
function expert_business_advisor_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_business_advisor_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Options', 'expert-business-advisor' ),
		)
	);

	/*=========================================
	Sidebar Option  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Options', 'expert-business-advisor' ),
			'priority' => 1,
			'panel' => 'expert_business_advisor_general',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_sidebar_settings',
			'settings'    => 'expert_business_advisor_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_business_advisor_sidebar_position', array(
        'default'   => 'right',
        'sanitize_callback' => 'expert_business_advisor_sanitize_sidebar_position',
    ));

    $wp_customize->add_control( 'expert_business_advisor_sidebar_position', array(
        'label'    => __( 'Sidebar Position', 'expert-business-advisor' ),
        'section'  => 'expert_business_advisor_sidebar_settings',
        'settings' => 'expert_business_advisor_sidebar_position',
        'type'     => 'radio',
        'choices'  => array(
            'right' => __( 'Right Sidebar', 'expert-business-advisor' ),
            'left'  => __( 'Left Sidebar', 'expert-business-advisor' ),
        ),
    ));

	 $wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_15',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_15',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_sidebar_settings',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_15',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 
}

add_action( 'customize_register', 'expert_business_advisor_sidebar_setting' );