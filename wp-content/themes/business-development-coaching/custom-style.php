<?php 
	$business_development_coaching_custom_css ='';

    /*----------------Related Product show/hide -------------------*/

    $business_development_coaching_enable_related_product = get_theme_mod('business_development_coaching_enable_related_product',1);

    if($business_development_coaching_enable_related_product == 0){
        $business_development_coaching_custom_css .='.related.products{';
            $business_development_coaching_custom_css .='display: none;';
        $business_development_coaching_custom_css .='}';
    }

    /*----------------blog post content alignment -------------------*/

    $business_development_coaching_blog_Post_content_layout = get_theme_mod( 'business_development_coaching_blog_Post_content_layout','Left');
    if($business_development_coaching_blog_Post_content_layout == 'Left'){
        $business_development_coaching_custom_css .='.ct-post-wrapper .card-item {';
            $business_development_coaching_custom_css .='text-align:start;';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_blog_Post_content_layout == 'Center'){
        $business_development_coaching_custom_css .='.ct-post-wrapper .card-item {';
            $business_development_coaching_custom_css .='text-align:center;';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_blog_Post_content_layout == 'Right'){
        $business_development_coaching_custom_css .='.ct-post-wrapper .card-item {';
            $business_development_coaching_custom_css .='text-align:end;';
        $business_development_coaching_custom_css .='}';
    }

    /*-------------------- Primary Color -------------------*/

    $business_development_coaching_gradient_color1 = get_theme_mod('business_development_coaching_gradient_color1', '#4CC7F0'); // Add a fallback if the color isn't set

    if ($business_development_coaching_gradient_color1) {
        $business_development_coaching_custom_css .= ':root {';
        $business_development_coaching_custom_css .= '--secondary-color: ' . esc_attr($business_development_coaching_gradient_color1) . ';';
        $business_development_coaching_custom_css .= '}';
    }	

    /*-------------------- Secondary Color -------------------*/

    $business_development_coaching_gradient_color2 = get_theme_mod('business_development_coaching_gradient_color2', '#1646BB'); // Add a fallback if the color isn't set

    if ($business_development_coaching_gradient_color2) {
        $business_development_coaching_custom_css .= ':root {';
        $business_development_coaching_custom_css .= '--tertiary-color: ' . esc_attr($business_development_coaching_gradient_color2) . ';';
        $business_development_coaching_custom_css .= '}';
    }	

	/*--------------------------- Footer background image -------------------*/

    $business_development_coaching_footer_bg_image = get_theme_mod('business_development_coaching_footer_bg_image');
    if($business_development_coaching_footer_bg_image != false){
        $business_development_coaching_custom_css .='.footer-top{';
            $business_development_coaching_custom_css .='background: url('.esc_attr($business_development_coaching_footer_bg_image).');';
        $business_development_coaching_custom_css .='}';
    }

	/*--------------------------- Go to top positions -------------------*/

    $business_development_coaching_go_to_top_position = get_theme_mod( 'business_development_coaching_go_to_top_position','Right');
    if($business_development_coaching_go_to_top_position == 'Right'){
        $business_development_coaching_custom_css .='.footer-go-to-top{';
            $business_development_coaching_custom_css .='right: 20px;';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_go_to_top_position == 'Left'){
        $business_development_coaching_custom_css .='.footer-go-to-top{';
            $business_development_coaching_custom_css .='left: 20px;';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_go_to_top_position == 'Center'){
        $business_development_coaching_custom_css .='.footer-go-to-top{';
            $business_development_coaching_custom_css .='right: 50%;left: 50%;';
        $business_development_coaching_custom_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $business_development_coaching_product_sale = get_theme_mod( 'business_development_coaching_woocommerce_product_sale','Right');
    if($business_development_coaching_product_sale == 'Right'){
        $business_development_coaching_custom_css .='.woocommerce ul.products li.product .onsale{';
            $business_development_coaching_custom_css .='left: auto; ';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_product_sale == 'Left'){
        $business_development_coaching_custom_css .='.woocommerce ul.products li.product .onsale{';
            $business_development_coaching_custom_css .='right: auto;left:0;';
        $business_development_coaching_custom_css .='}';
    }else if($business_development_coaching_product_sale == 'Center'){
        $business_development_coaching_custom_css .='.woocommerce ul.products li.product .onsale{';
            $business_development_coaching_custom_css .='right: 50%; left: 50%; ';
        $business_development_coaching_custom_css .='}';
    }