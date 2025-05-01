<?php
function expert_business_advisor_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_business_advisor_general', array(
			'priority' => 2,
			'title' => esc_html__( 'General Options', 'expert-business-advisor' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Options', 'expert-business-advisor' ),
			'priority' => 1,
			'panel' => 'expert_business_advisor_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'expert_business_advisor_breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'expert_business_advisor_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'expert_business_advisor_breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','expert-business-advisor'),
			'section' => 'expert_business_advisor_breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_breadcrumb_setting',
			'settings'    => 'expert_business_advisor_hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);


	$wp_customize->add_setting(
    	'expert_business_advisor_breadcrumb_seprator',
    	array(
			'default' => '/',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_business_advisor_breadcrumb_seprator',
		array(
		    'label'   		=> __('Breadcrumb separator','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_breadcrumb_setting',
			'type' 			=> 'text',
		)  
	);

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_5',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_5',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_breadcrumb_setting',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_5',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 

	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_preloader_section_setting', array(
			'title' => esc_html__( 'Preloader Options', 'expert-business-advisor' ),
			'priority' => 3,
			'panel' => 'expert_business_advisor_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_preloader_setting' , 
			array(
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_preloader_section_setting',
			'settings'    => 'expert_business_advisor_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	
	$wp_customize->add_setting(
    	'expert_business_advisor_preloader_text',
    	array(
			'default' => 'Loading',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'expert_business_advisor_preloader_text',
		array(
		    'label'   		=> __('Preloader Text','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_preloader_section_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	// Preloader Background Color Setting
    $wp_customize->add_setting(
        'expert_business_advisor_preloader_bg_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'expert_business_advisor_preloader_bg_color',
            array(
                'label' => esc_html__('Preloader Background Color', 'expert-business-advisor'),
                'section' => 'expert_business_advisor_preloader_section_setting', // Adjust section if needed
                'settings' => 'expert_business_advisor_preloader_bg_color',
            )
        )
    );

    // Preloader Color Setting
    $wp_customize->add_setting(
        'expert_business_advisor_preloader_color',
        array(
            'default' => '#0B57CA',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability' => 'edit_theme_options',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'expert_business_advisor_preloader_color',
            array(
                'label' => esc_html__('Preloader Color', 'expert-business-advisor'),
                'section' => 'expert_business_advisor_preloader_section_setting', // Adjust section if needed
                'settings' => 'expert_business_advisor_preloader_color',
            )
        )
    );

    $wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_6',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_6',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_preloader_section_setting',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_6',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 


	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top Options', 'expert-business-advisor' ),
			'priority' => 3,
			'panel' => 'expert_business_advisor_footer_section',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_scroll_to_top_section_setting',
			'settings'    => 'expert_business_advisor_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	// Scroll To Top Color Setting
	$wp_customize->add_setting(
		'expert_business_advisor_scroll_top_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'expert_business_advisor_scroll_top_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Color', 'expert-business-advisor' ),
				'section'  => 'expert_business_advisor_scroll_to_top_section_setting',
				'settings' => 'expert_business_advisor_scroll_top_color',
			)
		)
	);

	// Scroll To Top Background Color Setting
	$wp_customize->add_setting(
		'expert_business_advisor_scroll_top_bg_color',
		array(
			'default'           => '#0B57CA',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'expert_business_advisor_scroll_top_bg_color',
			array(
				'label'    => esc_html__( 'Scroll To Top Background Color', 'expert-business-advisor' ),
				'section'  => 'expert_business_advisor_scroll_to_top_section_setting',
				'settings' => 'expert_business_advisor_scroll_top_bg_color',
			)
		)
	);

	 $wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_7',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_7',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_scroll_to_top_section_setting',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_7',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 

	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'expert-business-advisor' ),
			'priority' => 3,
			'panel' => 'woocommerce',
		)
	);

	$wp_customize->add_setting(
    	'expert_business_advisor_custom_shop_per_columns',
    	array(
			'default' => '3',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_custom_shop_per_columns',
		array(
		    'label'   		=> __('Product Per Columns','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'expert_business_advisor_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_woocommerce_section_setting',
			'settings'    => 'expert_business_advisor_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		)
	);
	
	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_8',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
		$wp_customize, 'expert_business_advisor_upgrade_page_settings_8',
			array(
				'priority'      => 200,
				'section'       => 'woocommerce_section_setting',
				'settings'      => 'expert_business_advisor_upgrade_page_settings_8',
				'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
				'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
			)
		)
	); 

	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
		'sticky_header_section_setting', array(
			'title' => esc_html__( 'Sticky Header Options', 'expert-business-advisor' ),
			'priority' => 3,
			'panel' => 'expert_business_advisor_general',
		)
	);

	// Sticky Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_sticky_header' , 
			array(
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);

	$wp_customize->add_control(
	'expert_business_advisor_sticky_header', 
		array(
			'label'	      => esc_html__( 'Hide / Show Sticky Header', 'expert-business-advisor' ),
			'section'     => 'sticky_header_section_setting',
			'settings'    => 'expert_business_advisor_sticky_header',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_9',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
		$wp_customize, 'expert_business_advisor_upgrade_page_settings_9',
			array(
				'priority'      => 200,
				'section'       => 'sticky_header_section_setting',
				'settings'      => 'expert_business_advisor_upgrade_page_settings_9',
				'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
				'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
			)
		)
	); 

	/*=========================================
	404 Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_404_section', array(
			'title' => esc_html__( '404 Page Options', 'expert-business-advisor' ),
			'priority' => 1,
			'panel' => 'expert_business_advisor_general',
		)
	);

	$wp_customize->add_setting(
		'expert_business_advisor_404_title',
		array(
			'default' => '404',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_404_title',
		array(
			'label'   		=> __('404 Heading','expert-business-advisor'),
			'section'		=> 'expert_business_advisor_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
		'expert_business_advisor_404_Text',
		array(
			'default' => 'Page Not Found',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_404_Text',
		array(
			'label'   		=> __('404 Title','expert-business-advisor'),
			'section'		=> 'expert_business_advisor_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
		'expert_business_advisor_404_content',
		array(
			'default' => 'The page you were looking for could not be found.',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_404_content',
		array(
			'label'   		=> __('404 Content','expert-business-advisor'),
			'section'		=> 'expert_business_advisor_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_10',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
		$wp_customize, 'expert_business_advisor_upgrade_page_settings_10',
			array(
				'priority'      => 200,
				'section'       => 'expert_business_advisor_404_section',
				'settings'      => 'expert_business_advisor_upgrade_page_settings_10',
				'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
				'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
			)
		)
	); 

}

add_action( 'customize_register', 'expert_business_advisor_general_setting' );