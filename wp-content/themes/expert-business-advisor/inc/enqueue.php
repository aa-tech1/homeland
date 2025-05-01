<?php

// In your theme's functions.php or equivalent
add_action('customize_controls_enqueue_scripts', function() {
    $version = wp_get_theme()->get('Version');
    
    // Define parameters
    $customizer_params = array(
        'some_key' => 'some_value', // Add your parameters here
    );
    
    wp_enqueue_script(
        'expert-business-advisor-customize-section-button',
        get_theme_file_uri('assets/js/customize-controls.js'),
        ['customize-controls'],
        $version,
        true
    );

    wp_enqueue_style(
        'expert-business-advisor-customize-section-button',
        get_theme_file_uri('assets/css/customize-controls.css'),
        ['customize-controls'],
        $version
    );

    wp_localize_script(
        'expert-business-advisor-customize-section-button',
        'expert_business_advisor_customizer_params',
        $customizer_params
    );
});


 /**
 * Enqueue scripts and styles.
 */
function expert_business_advisor_scripts() {
	// Styles	 

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );
		
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	
	wp_enqueue_style('expert-business-advisor-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('expert-business-advisor-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('expert-business-advisor-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'expert-business-advisor-style', get_stylesheet_uri() );


	wp_enqueue_style('expert-business-advisor-main', get_stylesheet_uri(), array() );
	wp_style_add_data('expert-business-advisor-main', 'rtl', 'replace');
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('expert-business-advisor-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inlin css
	$expert_business_advisor_inline_style = '';

	$expert_business_advisor_slider_setting = get_theme_mod( 'expert_business_advisor_slider_setting', false);
	if($expert_business_advisor_slider_setting == false) {
	    $expert_business_advisor_inline_style .= '.page-template-template-frontpage .middle-header-area{';
	    $expert_business_advisor_inline_style .= 'position:static; border-bottom:1px solid #ccc;';
	    $expert_business_advisor_inline_style .= '}';
	}

	wp_add_inline_style( 'expert-business-advisor-style', $expert_business_advisor_inline_style );

}
add_action( 'wp_enqueue_scripts', 'expert_business_advisor_scripts' );

//Admin Enqueue for Admin
function expert_business_advisor_admin_enqueue_scripts(){
	wp_enqueue_style('expert-business-advisor-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('expert-business-advisor-dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'expert_business_advisor_admin_enqueue_scripts' );

// Function to enqueue custom CSS
function expert_business_advisor_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'expert-business-advisor-style';
    
    // Get the generated custom CSS
    $expert_business_advisor_custom_css = "";

    $expert_business_advisor_blog_layouts = get_theme_mod('expert_business_advisor_blog_layout_option_setting', 'Default');
    if ($expert_business_advisor_blog_layouts == 'Default') {
        $expert_business_advisor_custom_css .= '.blog-item{';
        $expert_business_advisor_custom_css .= 'text-align:center;';
        $expert_business_advisor_custom_css .= '}';
    } elseif ($expert_business_advisor_blog_layouts == 'Left') {
        $expert_business_advisor_custom_css .= '.blog-item{';
        $expert_business_advisor_custom_css .= 'text-align:Left;';
        $expert_business_advisor_custom_css .= '}';
    } elseif ($expert_business_advisor_blog_layouts == 'Right') {
        $expert_business_advisor_custom_css .= '.blog-item{';
        $expert_business_advisor_custom_css .= 'text-align:Right;';
        $expert_business_advisor_custom_css .= '}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $expert_business_advisor_custom_css);

    // Add inline style for Scroll to Top
    $expert_business_advisor_scroll_top_bg_color = get_theme_mod('expert_business_advisor_scroll_top_bg_color', '#0B57CA');
    $expert_business_advisor_scroll_top_color = get_theme_mod('expert_business_advisor_scroll_top_color', '#fff');
    $expert_business_advisor_scroll_custom_css = "
        #scrolltop {
            background-color: {$expert_business_advisor_scroll_top_bg_color};
        }
        #scrolltop span {
            color: {$expert_business_advisor_scroll_top_color};
        }
    ";
    wp_add_inline_style('expert-business-advisor-style', $expert_business_advisor_scroll_custom_css);

    // Add inline style for Preloader
    $expert_business_advisor_preloader_bg_color = get_theme_mod('expert_business_advisor_preloader_bg_color', '#ffffff');
    $expert_business_advisor_preloader_color = get_theme_mod('expert_business_advisor_preloader_color', '#0B57CA');
    $expert_business_advisor_preloader_custom_css = "
        .loading {
            background-color: {$expert_business_advisor_preloader_bg_color};
        }
        .loader {
            border-color: {$expert_business_advisor_preloader_color};
            color: {$expert_business_advisor_preloader_color};
            text-shadow: 0 0 10px {$expert_business_advisor_preloader_color};
        }
        .loader::before {
            border-top-color: {$expert_business_advisor_preloader_color};
            border-right-color: {$expert_business_advisor_preloader_color};
        }
        .loader span::before {
            background: {$expert_business_advisor_preloader_color};
            box-shadow: 0 0 10px {$expert_business_advisor_preloader_color};
        }
    ";
    wp_add_inline_style('expert-business-advisor-style', $expert_business_advisor_preloader_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'expert_business_advisor_enqueue_custom_css');