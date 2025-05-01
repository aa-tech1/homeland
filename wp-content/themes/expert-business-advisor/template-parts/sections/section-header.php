<header class="main-header">
    <div class="<?php if( get_theme_mod( 'expert_business_advisor_sticky_header', '0')) { ?>sticky-header<?php } else { ?>close-sticky<?php } ?>">
        <div class="middle-header-area py-md-3 py-2">
            <div class="container">
                <div class="row">
                    <!-- Logo Section -->
                    <div class="col-lg-3 col-md-4 logo-col text-md-start text-center align-self-center">
                        <div class="logo">
                            <?php 
                            if (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                // Check if both title and tagline settings are disabled
                                $expert_business_advisor_tagline_enabled = get_theme_mod('expert_business_advisor_tagline_setting', false);
                                $expert_business_advisor_title_enabled = get_theme_mod('expert_business_advisor_site_title_setting', false);

                                if (!$expert_business_advisor_tagline_enabled && !$expert_business_advisor_title_enabled) {
                                    // Display the default logo
                                    $expert_business_advisor_default_logo_url = get_template_directory_uri() . '/assets/images/logo.png'; // Replace with your default logo path
                                    echo '<a href="' . esc_url(home_url('/')) . '">';
                                    echo '<img src="' . esc_url($expert_business_advisor_default_logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                                    echo '</a>';
                                }

                                // Display tagline if the setting is enabled
                                if ($expert_business_advisor_tagline_enabled) :
                                    $expert_business_advisor_site_desc = get_bloginfo('description'); ?>
                                    <p class="site-description"><?php echo esc_html($expert_business_advisor_site_desc); ?></p>
                                <?php endif; ?>

                                <?php
                                // Display site title if the setting is enabled
                                if ($expert_business_advisor_title_enabled) : ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php echo esc_html(get_bloginfo('name')); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <!-- Menu Section -->
                    <div class="col-lg-7 col-md-4 col-12 menu-col align-self-center">
                        <div class="menubox">
                            <nav class="navbar navbar-expand-lg navbaroffcanvas">
                                <div class="navbar-menubar responsive-menu">
                                    <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'expert-business-advisor'); ?>">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="collapse navbar-collapse navbar-menu">
                                        <button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Close navigation', 'expert-business-advisor'); ?>">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location'  => 'primary',
                                            'container_class' => 'main-menu clearfix',
                                            'menu_class'      => 'clearfix',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                            'fallback_cb'     => 'wp_page_menu', // Fallback if no menu is assigned
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <!-- Call Section -->
                    <div class="call col-lg-2 col-md-4 align-self-center mb-2 mb-md-0">
                        <?php 
                        $expert_business_advisor_call_number = get_theme_mod('expert_business_advisor_call');

                        if (!empty($expert_business_advisor_call_number)) : ?>
                            <div class="phone-text">
                                <i class="fas fa-phone-volume"></i>
                                <a href="tel:<?php echo esc_attr($expert_business_advisor_call_number); ?>">
                                    <?php echo esc_html($expert_business_advisor_call_number); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>