<?php
function expert_business_advisor_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'expert_business_advisor_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Options', 'expert-business-advisor' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'expert-business-advisor' ),
			'priority' => 1,
			'panel' => 'expert_business_advisor_post',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('expert_business_advisor_blog_layout_option_setting',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'expert_business_advisor_sanitize_choices'
	));
	$wp_customize->add_control(new Expert_Business_Advisor_Image_Radio_Control($wp_customize, 'expert_business_advisor_blog_layout_option_setting', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','expert-business-advisor'),
	  'section' => 'expert_business_advisor_archive_post_setting',
	  'choices' => array(
		'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
		'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
		'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout-3.png',
	))));
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'expert_business_advisor_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Timing Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_timing_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_timing_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Timings', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_timing_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_archive_post_setting',
			'settings'    => 'expert_business_advisor_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting('expert_business_advisor_excerpt_limit', array(
        'default'           => 50,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('expert_business_advisor_excerpt_limit', array(
        'label'   => __('Excerpt Word Limit', 'expert-business-advisor'),
        'section' => 'expert_business_advisor_archive_post_setting',
        'type'    => 'number',
    ));

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_133',
	array(
		'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
		$wp_customize, 'expert_business_advisor_upgrade_page_settings_133',
			array(
				'priority'      => 200,
				'section'       => 'expert_business_advisor_archive_post_setting',
				'settings'      => 'expert_business_advisor_upgrade_page_settings_133',
				'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
				'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
			)
		)
	); 

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'expert_business_advisor_single_post', array(
			'title' => esc_html__( 'Single Post', 'expert-business-advisor' ),
			'priority' => 3,
			'panel' => 'expert_business_advisor_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_timing_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_timing_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Timings', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_timing_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	// Related Posts Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_show_hide_related_post' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_show_hide_related_post', 
		array(
			'label'	      => esc_html__( 'Hide / Show Related Posts', 'expert-business-advisor' ),
			'section'     => 'expert_business_advisor_single_post',
			'settings'    => 'expert_business_advisor_show_hide_related_post',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_58',
	array(
		'sanitize_callback' => 'sanitize_text_field'
	)
	);
	$wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
		$wp_customize, 'expert_business_advisor_upgrade_page_settings_58',
			array(
				'priority'      => 200,
				'section'       => 'expert_business_advisor_single_post',
				'settings'      => 'expert_business_advisor_upgrade_page_settings_58',
				'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
				'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
			)
		)
	); 
}

add_action( 'customize_register', 'expert_business_advisor_post_setting' );