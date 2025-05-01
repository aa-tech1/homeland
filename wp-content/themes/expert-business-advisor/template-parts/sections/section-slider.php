<?php
// Fetch the slider setting from the Customizer
$expert_business_advisor_slider = get_theme_mod('expert_business_advisor_slider_setting', false);

// Check if the slider is enabled
if ('1' == $expert_business_advisor_slider) : ?>
    <section id="slider-section" class="slider-area">
        <div class="container slider-content">
            <div id="owl-carousel" class="owl-carousel owl-theme">
                <?php

                $expert_business_advisor_pages = array();
                for ($expert_business_advisor_count = 1; $expert_business_advisor_count <= 3; $expert_business_advisor_count++) {
                    $expert_business_advisor_mod = intval(get_theme_mod('expert_business_advisor_slider' . $expert_business_advisor_count));
                    if ('page-none-selected' != $expert_business_advisor_mod) {
                        $expert_business_advisor_pages[] = $expert_business_advisor_mod;
                    }
                }

                // If pages were selected, run the query
                if (!empty($expert_business_advisor_pages)) :
                    $args = array(
                        'post_type' => 'page',
                        'post__in'  => $expert_business_advisor_pages,
                        'orderby'   => 'post__in',
                    );
                    $query = new WP_Query($args);

                    // If pages were found, display them
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 align-self-center">
                                    <div class="inner_carousel">
                                        <?php
                                        // Fetch slider text from Customizer
                                        $expert_business_advisor_slider_text = get_theme_mod('expert_business_advisor_slider_text');
                                        if (!empty($expert_business_advisor_slider_text)) : ?>
                                            <p class="mb-2 slider-top-text"><?php echo esc_html($expert_business_advisor_slider_text); ?></p>
                                        <?php endif; ?>

                                        <!-- Display the page title -->
                                        <h1 class="mb-2">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h1>
                                        <p class="mb-2 slider-content"><?php echo esc_html(wp_trim_words(get_the_content(), 50)); ?></p>

                                        <div class="slider-mainbtn">
                                            <!-- First button -->
                                            <span class="slide-btn1">
                                                <a href="<?php the_permalink(); ?>" class="btn-text">
                                                    <?php esc_html_e('View More', 'expert-business-advisor'); ?>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slider image section -->
                                <div class="col-lg-6 col-md-6 slider-img-col">
                                    <div class="sliderimg">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php the_title_attribute(); ?>" />
                                        <?php else : ?>
                                            <div class="slider-color-box"></div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if (get_theme_mod('expert_business_advisor_banner_form_shortcode') != '') { ?>
                                        <div class="slider-contact-form main">
                                            <?php echo do_shortcode(get_theme_mod('expert_business_advisor_banner_form_shortcode')); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();  // Reset post data after the loop
                    else : ?>
                        <div class="no-postfound"></div>
                    <?php endif;
                endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>