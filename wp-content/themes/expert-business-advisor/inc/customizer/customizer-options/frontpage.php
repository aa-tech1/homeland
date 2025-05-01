<?php
function expert_business_advisor_blog_setting( $wp_customize ) {
$wp_customize->register_control_type( 'Expert_Business_Advisor_Control_Upgrade' );

	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_business_advisor_frontpage_sections', array(
			'priority' => 1,
			'title' => esc_html__( 'Frontpage Sections', 'expert-business-advisor' ),
		)
	);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'expert-business-advisor' ),
			'priority' => 13,
			'panel' => 'expert_business_advisor_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_slider_setting' , 
			array(
			'default' => false,
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_slider_section',
			'settings'    => 'expert_business_advisor_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Slider 1
    $wp_customize->add_setting(
        'expert_business_advisor_slider1',
        array(
            'default'           => get_page_id_by_slug('slider-page'), // This function should be defined (see below)
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
            'priority'          => 1,
        )
    );

    $wp_customize->add_control(
        'expert_business_advisor_slider1',
        array(
            'label'    => __('Slider 1', 'expert-business-advisor'),
            'section'  => 'expert_business_advisor_slider_section',
            'type'     => 'dropdown-pages',
            'transport' => $selective_refresh,  // Or $selective_refresh if you want selective refresh
        )
    );

    // Slider 2
    $wp_customize->add_setting(
        'expert_business_advisor_slider2',
        array(
            'default'           => get_page_id_by_slug('slider-pages'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
            'priority'          => 2,
        )
    );

    $wp_customize->add_control(
        'expert_business_advisor_slider2',
        array(
            'label'    => __('Slider 2', 'expert-business-advisor'),
            'section'  => 'expert_business_advisor_slider_section',
            'type'     => 'dropdown-pages',
            'transport' => $selective_refresh,
        )
    );

    // Slider 3
    $wp_customize->add_setting(
        'expert_business_advisor_slider3',
        array(
            'default'           => get_page_id_by_slug('slider-pagess'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint',
            'priority'          => 3,
        )
    );

    $wp_customize->add_control(
        'expert_business_advisor_slider3',
        array(
            'label'    => __('Slider 3', 'expert-business-advisor'),
            'section'  => 'expert_business_advisor_slider_section',
            'type'     => 'dropdown-pages',
            'transport' => $selective_refresh,
        )
    );

	// Slider Text
	$wp_customize->add_setting( 
    	'expert_business_advisor_slider_text',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'expert_business_advisor_slider_text',
		array(
		    'label'   		=> __('Add Slider Top Text','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);


 	$wp_customize->add_setting('expert_business_advisor_banner_form_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_business_advisor_banner_form_shortcode',array(
		'label'	=> __('Add Contact Form Shortcode','expert-business-advisor'),
		'section'=> 'expert_business_advisor_slider_section',
		'type'=> 'text',
	));

	
	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_3',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_slider_section',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_3',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 


	/*=========================================
	service Section
	=========================================*/

	$wp_customize->add_section(
		'expert_business_advisor_service_section', array(
			'title' => esc_html__( 'Our Services Section', 'expert-business-advisor' ),
			'priority' => 14,
			'panel' => 'expert_business_advisor_frontpage_sections',
		)
	);

	// Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_service_show_hide' , 
			array(
			'default' => true,
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_service_show_hide', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_service_section',
			'settings'    => 'expert_business_advisor_service_show_hide',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
    	'expert_business_advisor_section_small_text',
    	array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_section_small_text',
		array(
		    'label'   		=> __('Add Small Title','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_service_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'expert_business_advisor_section_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'expert_business_advisor_section_title',
		array(
		    'label'   		=> __('Add Heading','expert-business-advisor'),
		    'section'		=> 'expert_business_advisor_service_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$expert_business_advisor_categories = get_categories();
    $expert_business_advisor_cats = array();
    $expert_business_advisor_i = 0;
    $expert_business_advisor_offer_cat[]= 'select';
    foreach($expert_business_advisor_categories as $expert_business_advisor_category){
        if($expert_business_advisor_i==0){
            $expert_business_advisor_default = $expert_business_advisor_category->slug;
            $expert_business_advisor_i++;
        }
        $expert_business_advisor_offer_cat[$expert_business_advisor_category->slug] = $expert_business_advisor_category->name;
    }

    $wp_customize->add_setting(
    	'expert_business_advisor_offer_section_category',
    	array(
	        'default'   => 'uncategorized',
	        'sanitize_callback' => 'expert_business_advisor_sanitize_choices',
    	)
    );
    $wp_customize->add_control(
    	'expert_business_advisor_offer_section_category',
    	array(
	        'type'    => 'select',
	        'choices' => $expert_business_advisor_offer_cat,
	        'label' => __('Select Category','expert-business-advisor'),
	        'section' => 'expert_business_advisor_service_section',
    	)
    );

   $wp_customize->add_setting('expert_business_advisor_header_button',array(
		'default'=> 'View More Projects',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('expert_business_advisor_header_button',array(
		'label'	=> __('Add Button Text','expert-business-advisor'),
		'section'=> 'expert_business_advisor_service_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('expert_business_advisor_header_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_business_advisor_header_link',array(
		'label'	=> __('Add Button Link','expert-business-advisor'),
		'section'=> 'expert_business_advisor_service_section',
		'type'=> 'url'
	));

	
	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_44',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_44',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_service_section',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_44',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 

}

add_action( 'customize_register', 'expert_business_advisor_blog_setting' );

// service selective refresh
function expert_business_advisor_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'expert_business_advisor_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'expert_business_advisor_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'expert_business_advisor_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'expert_business_advisor_blog_section_partials' );

// blog_title
function expert_business_advisor_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function expert_business_advisor_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function expert_business_advisor_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}