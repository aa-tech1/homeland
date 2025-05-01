<?php
/**
 * Business Development Coaching Theme Customizer
 *
 * @package Business Development Coaching
 */

function business_development_coaching_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'business_development_coaching_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'business_development_coaching_customize_partial_blogdescription',
			)
		);
	}

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('business_development_coaching_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Business Development Theme Options', 'business-development-coaching'),
	));

	/*
	* Customizer main header section
	*/

	$wp_customize->add_setting(
		'business_development_coaching_site_title_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_site_title_text',
		array(
			'label'       => __('Enable Title', 'business-development-coaching'),
			'description' => __('Enable or Disable Title from the site', 'business-development-coaching'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'business_development_coaching_site_tagline_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_site_tagline_text',
		array(
			'label'       => __('Enable Tagline', 'business-development-coaching'),
			'description' => __('Enable or Disable Tagline from the site', 'business-development-coaching'),
			'section'     => 'title_tagline',
			'type'        => 'checkbox',
		)
	);

		$wp_customize->add_setting(
		'business_development_coaching_logo_width',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '150',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_logo_width',
		array(
			'label'       => __('Logo Width in PX', 'business-development-coaching'),
			'section'     => 'title_tagline',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 100,
	             'max' => 300,
	             'step' => 1,
	         ),
		)
	);

	/* WooCommerce custom settings */

	$wp_customize->add_section('woocommerce_custom_settings', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('WooCommerce Custom Settings', 'business-development-coaching'),
		'panel'       => 'woocommerce',
	));

	$wp_customize->add_setting(
		'business_development_coaching_per_columns',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_per_columns',
		array(
			'label'       => __('Product Per Single Row', 'business-development-coaching'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 4,
	             'step' => 1,
	         ),
		)
	);

	$wp_customize->add_setting(
		'business_development_coaching_product_per_page',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '6',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_product_per_page',
		array(
			'label'       => __('Product Per One Page', 'business-development-coaching'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 12,
	             'step' => 1,
	         ),
		)
	);

	/*Related Products Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_related_product',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_related_product',
		array(
			'label'       => __('Enable Related Product', 'business-development-coaching'),
			'description' => __('Checked to show Related Product', 'business-development-coaching'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'custom_related_products_number',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'custom_related_products_number',
		array(
			'label'       => __('Related Product Count', 'business-development-coaching'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 20,
	             'step' => 1,
	         ),
		)
	);

	$wp_customize->add_setting(
		'custom_related_products_number_per_row',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'custom_related_products_number_per_row',
		array(
			'label'       => __('Related Product Per Row', 'business-development-coaching'),
			'section'     => 'woocommerce_custom_settings',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 4,
	             'step' => 1,
	         ),
		)
	);

	/*Archive Product layout*/
	$wp_customize->add_setting('business_development_coaching_archive_product_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_archive_product_layout',array(
        'type' => 'select',
        'label' => esc_html__('Archive Product Layout','business-development-coaching'),
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','business-development-coaching'),
            'layout-2' => esc_html__('Sidebar On Left','business-development-coaching'),
            'layout-3' => esc_html__('Full Width Layout','business-development-coaching')
        ),
	) );

	/*Single Product layout*/
	$wp_customize->add_setting('business_development_coaching_single_product_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_single_product_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Product Layout','business-development-coaching'),
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','business-development-coaching'),
            'layout-2' => esc_html__('Sidebar On Left','business-development-coaching'),
            'layout-3' => esc_html__('Full Width Layout','business-development-coaching')
        ),
	) );

	$wp_customize->add_setting('business_development_coaching_woocommerce_product_sale',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
        'default'           => 'Right',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
    ));
    $wp_customize->add_control('business_development_coaching_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','business-development-coaching' ),
        'type' => 'select',
        'section' => 'woocommerce_custom_settings',
        'choices' => array(
            'Right' => __('Right','business-development-coaching'),
            'Left' => __('Left','business-development-coaching'),
            'Center' => __('Center','business-development-coaching')
        ),
    ) );


	/*Additional Options*/
	$wp_customize->add_section('business_development_coaching_additional_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Additional Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_sticky_header',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => false,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_sticky_header',
		array(
			'label'       => __('Enable Sticky Header', 'business-development-coaching'),
			'description' => __('Checked to enable sticky header', 'business-development-coaching'),
			'section'     => 'business_development_coaching_additional_section',
			'type'        => 'checkbox',
		)
	);

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_preloader',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_preloader',
		array(
			'label'       => __('Enable Preloader', 'business-development-coaching'),
			'description' => __('Checked to show preloader', 'business-development-coaching'),
			'section'     => 'business_development_coaching_additional_section',
			'type'        => 'checkbox',
		)
	);

	/*Post layout*/
	$wp_customize->add_setting('business_development_coaching_archive_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_archive_layout',array(
        'type' => 'select',
        'label' => esc_html__('Posts Layout','business-development-coaching'),
        'section' => 'business_development_coaching_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','business-development-coaching'),
            'layout-2' => esc_html__('Sidebar On Left','business-development-coaching'),
			'layout-3' => esc_html__('Full Width Layout','business-development-coaching')
        ),
	) );

	/*single post layout*/
	$wp_customize->add_setting('business_development_coaching_post_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_post_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Post Layout','business-development-coaching'),
        'section' => 'business_development_coaching_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','business-development-coaching'),
            'layout-2' => esc_html__('Sidebar On Left','business-development-coaching'),
			'layout-3' => esc_html__('Full Width Layout','business-development-coaching')
        ),
	) );

	/*single page layout*/
	$wp_customize->add_setting('business_development_coaching_page_layout',array(
        'default' => 'layout-1',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Single Page Layout','business-development-coaching'),
        'section' => 'business_development_coaching_additional_section',
        'choices' => array(
            'layout-1' => esc_html__('Sidebar On Right','business-development-coaching'),
            'layout-2' => esc_html__('Sidebar On Left','business-development-coaching'),
			'layout-3' => esc_html__('Full Width Layout','business-development-coaching')
        ),
	) );

	/*Archive Post Options*/
	$wp_customize->add_section('business_development_coaching_blog_post_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Blog Page Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_title',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_title',array(
		'label'       => __('Enable Blog Post Title', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Title', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_meta',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_meta',array(
		'label'       => __('Enable Blog Post Meta', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Meta Feilds', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_tags',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_tags',array(
		'label'       => __('Enable Blog Post Tags', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Tags', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_image',array(
		'label'       => __('Enable Blog Post Image', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Image', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_content',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_content',array(
		'label'       => __('Enable Blog Post Content', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Content', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_blog_post_button',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_blog_post_button',array(
		'label'       => __('Enable Blog Post Read More Button', 'business-development-coaching'),
		'description' => __('Checked To Show Blog Post Read More Button', 'business-development-coaching'),
		'section'     => 'business_development_coaching_blog_post_section',
		'type'        => 'checkbox',
	));

	/*Blog post Content layout*/
	$wp_customize->add_setting('business_development_coaching_blog_Post_content_layout',array(
        'default' => 'Left',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
	));
	$wp_customize->add_control('business_development_coaching_blog_Post_content_layout',array(
        'type' => 'select',
        'label' => esc_html__('Blog Post Content Layout','business-development-coaching'),
        'section' => 'business_development_coaching_blog_post_section',
        'choices' => array(
            'Left' => esc_html__('Left','business-development-coaching'),
            'Center' => esc_html__('Center','business-development-coaching'),
            'Right' => esc_html__('Right','business-development-coaching')
        ),
	) );

	/*Excerpt*/
    $wp_customize->add_setting(
		'business_development_coaching_excerpt_limit',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '25',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_excerpt_limit',
		array(
			'label'       => __('Excerpt Limit', 'business-development-coaching'),
			'section'     => 'business_development_coaching_blog_post_section',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 2,
	             'max' => 50,
	             'step' => 2,
	         ),
		)
	);

	/*Archive Button Text*/
	$wp_customize->add_setting(
		'business_development_coaching_read_more_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'Continue Reading....',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_read_more_text',
		array(
			'label'       => __('Edit Button Text ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_blog_post_section',
			'type'        => 'text',
		)
	);

	/*Single Post Options*/
	$wp_customize->add_section('business_development_coaching_single_post_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Single Post Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));
	
	$wp_customize->add_setting('business_development_coaching_enable_single_blog_post_title',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_single_blog_post_title',array(
		'label'       => __('Enable Single Post Title', 'business-development-coaching'),
		'description' => __('Checked To Show Single Blog Post Title', 'business-development-coaching'),
		'section'     => 'business_development_coaching_single_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_single_blog_post_meta',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_single_blog_post_meta',array(
		'label'       => __('Enable Single Post Meta', 'business-development-coaching'),
		'description' => __('Checked To Show Single Blog Post Meta Feilds', 'business-development-coaching'),
		'section'     => 'business_development_coaching_single_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_single_blog_post_tags',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_single_blog_post_tags',array(
		'label'       => __('Enable Single Post Tags', 'business-development-coaching'),
		'description' => __('Checked To Show Single Blog Post Tags', 'business-development-coaching'),
		'section'     => 'business_development_coaching_single_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_single_post_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_single_post_image',array(
		'label'       => __('Enable Single Post Image', 'business-development-coaching'),
		'description' => __('Checked To Show Single Post Image', 'business-development-coaching'),
		'section'     => 'business_development_coaching_single_post_section',
		'type'        => 'checkbox',
	));

	$wp_customize->add_setting('business_development_coaching_enable_single_blog_post_content',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 1,
		'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
	));
	$wp_customize->add_control('business_development_coaching_enable_single_blog_post_content',array(
		'label'       => __('Enable Single Post Content', 'business-development-coaching'),
		'description' => __('Checked To Show Single Blog Post Content', 'business-development-coaching'),
		'section'     => 'business_development_coaching_single_post_section',
		'type'        => 'checkbox',
	));

	/*Related Post Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_related_post',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_related_post',
		array(
			'label'       => __('Enable Related Post', 'business-development-coaching'),
			'description' => __('Checked to show Related Post', 'business-development-coaching'),
			'section'     => 'business_development_coaching_single_post_section',
			'type'        => 'checkbox',
		)
	);

	/*Related post Edit Text*/
	$wp_customize->add_setting(
		'business_development_coaching_related_post_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'Related Post',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_related_post_text',
		array(
			'label'       => __('Edit Related Post Text ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_single_post_section',
			'type'        => 'text',
		)
	);	

	/*Related Post Per Page*/
	$wp_customize->add_setting(
		'business_development_coaching_related_post_count',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '3',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_related_post_count',
		array(
			'label'       => __('Related Post Count', 'business-development-coaching'),
			'section'     => 'business_development_coaching_single_post_section',
			'type'        => 'number',
			'input_attrs' => array(
	            'min' => 1,
	             'max' => 9,
	             'step' => 1,
	         ),
		)
	);

		/*
	* Customizer Global COlor
	*/

	/*Global Color Options*/
	$wp_customize->add_section('business_development_coaching_global_color_section', array(
		'priority'       => 1,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Global Color Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	$wp_customize->add_setting( 'business_development_coaching_gradient_color1',
		array(
		'default'           => '#4CC7F0',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'business_development_coaching_gradient_color1',
		array(
			'label'      => esc_html__( 'Gradient Color 1', 'business-development-coaching' ),
			'section'    => 'business_development_coaching_global_color_section',
			'settings'   => 'business_development_coaching_gradient_color1',
		) ) 
	);

	$wp_customize->add_setting( 'business_development_coaching_gradient_color2',
		array(
		'default'           => '#1646BB',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'business_development_coaching_gradient_color2',
		array(
			'label'      => esc_html__( 'Gradient Color 2 (Primary color)', 'business-development-coaching' ),
			'section'    => 'business_development_coaching_global_color_section',
			'settings'   => 'business_development_coaching_gradient_color2',
		) ) 
	);

	/*Main Header Options*/
	$wp_customize->add_section('business_development_coaching_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Header Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	/*Main Header Checkbox*/
	$wp_customize->add_setting(
		'business_development_coaching_header_info',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_header_info',
		array(
			'label'       => __('Enable Topbar Details', 'business-development-coaching'),
			'description' => __('Enable or Disable Topbar Details', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'checkbox',
		)
	);

	/*Main Header Topbar Text*/
	$wp_customize->add_setting(
		'business_development_coaching_topheader_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_topheader_text',
		array(
			'label'       => __('Edit Topbar Text ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Topbar Text*/
	$wp_customize->add_setting(
		'business_development_coaching_middle_header_contact_email',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_middle_header_contact_email',
		array(
			'label'       => __('Edit Email ID', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Topbar Text*/
	$wp_customize->add_setting(
		'business_development_coaching_middle_header_contact_phone',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_middle_header_contact_phone',
		array(
			'label'       => __('Edit Phone Number', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Button Text*/
	$wp_customize->add_setting(
		'business_development_coaching_middle_header_button_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_middle_header_button_text',
		array(
			'label'       => __('Edit Middle Header Button Text ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Button Link*/
	$wp_customize->add_setting(
		'business_development_coaching_middle_header_button_link',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
	'business_development_coaching_middle_header_button_link', array( 'label'    
	  => __('Edit Middle Header Button Link ', 'business-development-coaching'),
	'section'     => 'business_development_coaching_header_section', 'type'      
	 => 'url', ) );

	/*Main Header Button Text*/
	$wp_customize->add_setting(
		'business_development_coaching_topheader_button_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 'Get Free Consultation',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_topheader_button_text',
		array(
			'label'       => __('Edit Header Button Text ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'text',
		)
	);

	/*Main Header Button Link*/
	$wp_customize->add_setting(
		'business_development_coaching_topheader_button_link',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_topheader_button_link',
		array(
			'label'       => __('Edit Header Button Link ', 'business-development-coaching'),
			'section'     => 'business_development_coaching_header_section',
			'type'        => 'url',
		)
	);

	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('business_development_coaching_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'business-development-coaching'),
			'description' => __('Checked to show the main slider', 'business-development-coaching'),
			'section'     => 'business_development_coaching_slider_section',
			'type'        => 'checkbox',
		)
	);

	for ($business_development_coaching_i=1; $business_development_coaching_i <= 3; $business_development_coaching_i++) { 

		/*Main Slider Image*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_image'.$business_development_coaching_i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'business_development_coaching_slider_image'.$business_development_coaching_i, 
				array(
			        'label' => __('Edit Slider Image ', 'business-development-coaching') .$business_development_coaching_i,
			        'description' => __('Edit the slider image.', 'business-development-coaching'),
			        'section' => 'business_development_coaching_slider_section',
				)
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_short_heading'.$business_development_coaching_i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'business_development_coaching_slider_short_heading'.$business_development_coaching_i,
			array(
				'label'       => __('Edit Short Heading Text ', 'business-development-coaching') .$business_development_coaching_i,
				'description' => __('Edit the slider heading text.', 'business-development-coaching'),
				'section'     => 'business_development_coaching_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_heading'.$business_development_coaching_i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'business_development_coaching_slider_heading'.$business_development_coaching_i,
			array(
				'label'       => __('Edit Heading Text ', 'business-development-coaching') .$business_development_coaching_i,
				'description' => __('Edit the slider heading text.', 'business-development-coaching'),
				'section'     => 'business_development_coaching_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_text'.$business_development_coaching_i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'business_development_coaching_slider_text'.$business_development_coaching_i,
			array(
				'label'       => __('Edit Content Text ', 'business-development-coaching') .$business_development_coaching_i,
				'description' => __('Edit the slider content text.', 'business-development-coaching'),
				'section'     => 'business_development_coaching_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 Text*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_button1_text'.$business_development_coaching_i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'business_development_coaching_slider_button1_text'.$business_development_coaching_i,
			array(
				'label'       => __('Edit Button #1 Text ', 'business-development-coaching') .$business_development_coaching_i,
				'description' => __('Edit the slider button text.', 'business-development-coaching'),
				'section'     => 'business_development_coaching_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 URL*/
		$wp_customize->add_setting(
			'business_development_coaching_slider_button1_link'.$business_development_coaching_i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'business_development_coaching_slider_button1_link'.$business_development_coaching_i,
			array(
				'label'       => __('Edit Button #1 URL ', 'business-development-coaching') .$business_development_coaching_i,
				'description' => __('Edit the slider button url.', 'business-development-coaching'),
				'section'     => 'business_development_coaching_slider_section',
				'type'        => 'url',
			)
		);
	}

	/*
	* Customizer Blog section
	*/
	/*Blog Options*/
	$wp_customize->add_section('business_development_coaching_events_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Blog Option', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	/*Blog Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_event',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_enable_event',
		array(
			'label'       => __('Enable Blog Section', 'business-development-coaching'),
			'description' => __('Checked to show the category', 'business-development-coaching'),
			'section'     => 'business_development_coaching_events_section',
			'type'        => 'checkbox',
		)
	);

	/*Blog Heading*/
	$wp_customize->add_setting(
		'business_development_coaching_event_heading',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_event_heading',
		array(
			'label'       => __('Edit Section Heading', 'business-development-coaching'),
			'description' => __('Edit Blog section heading', 'business-development-coaching'),
			'section'     => 'business_development_coaching_events_section',
			'type'        => 'text',
		)
	);

	/*Blog Text*/
	$wp_customize->add_setting(
		'business_development_coaching_event_text',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'business_development_coaching_event_text',
		array(
			'label'       => __('Edit Section Text', 'business-development-coaching'),
			'description' => __('Edit Blog section text', 'business-development-coaching'),
			'section'     => 'business_development_coaching_events_section',
			'type'        => 'text',
		)
	);


	$categories = get_categories();
	$cats = array();
	$business_development_coaching_i = 0;
	$cat_pst1[]= 'select';
	foreach($categories as $category){
		if($business_development_coaching_i==0){
			$default = $category->slug;
			$business_development_coaching_i++;
		}
		$cat_pst1[$category->slug] = $category->name;
	}

	$wp_customize->add_setting(
		'business_development_coaching_blog_cat',
		array(
		    'default' => 'uncategorized',
		    'sanitize_callback' => 'business_development_coaching_sanitize_choices',
  		)
  	);

  	$wp_customize->add_control(
  		'business_development_coaching_blog_cat',
  		array(
		    'type'    => 'select',
		    'choices' => $cat_pst1,
		    'label' => __('Select Category to display Blog','business-development-coaching'),
		    'section' => 'business_development_coaching_events_section',
		)
	);


	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('business_development_coaching_footer_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'business-development-coaching'),
		'panel'       => 'business_development_coaching_panel',
	));

	/*Footer Enable Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_footer',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'business_development_coaching_enable_footer',
		array(
			'label'       => __('Enable Footer', 'business-development-coaching'),
			'description' => __('Checked to show Footer', 'business-development-coaching'),
			'section'     => 'business_development_coaching_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer bg image Option*/
	$wp_customize->add_setting('business_development_coaching_footer_bg_image',array(
		'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'business_development_coaching_footer_bg_image',array(
        'label' => __('Footer Background Image','business-development-coaching'),
        'section' => 'business_development_coaching_footer_section',
        'priority' => 1,
    )));

	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'business_development_coaching_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'business_development_coaching_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'business-development-coaching'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'business-development-coaching'),
			'section'     => 'business_development_coaching_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'business_development_coaching_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'business_development_coaching_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'business_development_coaching_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'business-development-coaching'),
			'description' => __('Checked to enable Go To Top option.', 'business-development-coaching'),
			'section'     => 'business_development_coaching_footer_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting('business_development_coaching_go_to_top_position',array(
        'capability'        => 'edit_theme_options',
		'transport'         => 'refresh',
		'default'           => 'Right',
        'sanitize_callback' => 'business_development_coaching_sanitize_choices'
    ));
    $wp_customize->add_control('business_development_coaching_go_to_top_position',array(
        'type' => 'select',
        'section' => 'business_development_coaching_footer_section',
        'label' => esc_html__('Go To Top Positions','business-development-coaching'),
        'choices' => array(
            'Right' => __('Right','business-development-coaching'),
            'Left' => __('Left','business-development-coaching'),
            'Center' => __('Center','business-development-coaching')
        ),
    ) );

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'business_development_coaching_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'business_development_coaching_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'business-development-coaching'),
			'description' => __('Edit the Footer Copyright Section.', 'business-development-coaching'),
			'section'     => 'business_development_coaching_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'business_development_coaching_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_development_coaching_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_development_coaching_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_development_coaching_customize_preview_js() {
	wp_enqueue_script( 'business-development-coaching-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), BUSINESS_DEVELOPMENT_COACHING_VERSION, true );
}
add_action( 'customize_preview_init', 'business_development_coaching_customize_preview_js' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Business_Development_Coaching_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $business_development_coaching_instance = null;

		if ( is_null( $business_development_coaching_instance ) ) {
			$business_development_coaching_instance = new self;
			$business_development_coaching_instance->setup_actions();
		}

		return $business_development_coaching_instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Business_Development_Coaching_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Business_Development_Coaching_Customize_Section_Pro( $manager,'business_development_coaching_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Business Development', 'business-development-coaching' ),
			'pro_text' => esc_html__( 'Buy Pro', 'business-development-coaching' ),
			'pro_url'    => esc_url( BUSINESS_DEVELOPMENT_COACHING_BUY_NOW ),
		) )	);

		// Register sections.
		$manager->add_section( new Business_Development_Coaching_Customize_Section_Pro( $manager,'business_development_coaching_lite_documentation', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Lite Documentation', 'business-development-coaching' ),
			'pro_text' => esc_html__( 'Instruction', 'business-development-coaching' ),
			'pro_url'    => esc_url( BUSINESS_DEVELOPMENT_COACHING_LITE_DOC ),
		) )	);
		
		$manager->add_section( new Business_Development_Coaching_Customize_Section_Pro( $manager, 'business_development_coaching_live_demo', array(
			'priority'   => 1,
			'title'      => esc_html__( 'Pro Theme Demo', 'business-development-coaching' ),
			'pro_text'   => esc_html__( 'Live Preview', 'business-development-coaching' ),
			'pro_url'    => esc_url( BUSINESS_DEVELOPMENT_COACHING_LIVE_DEMO ),
		) ) );
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'business-development-coaching-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'business-development-coaching-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Business_Development_Coaching_Customize::get_instance();