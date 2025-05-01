<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary">

    <?php 
    $business_development_coaching_main_slider_wrap = absint(get_theme_mod('business_development_coaching_enable_slider', 1));
    if($business_development_coaching_main_slider_wrap == 1){ 
    ?>

    <section id="main-slider-wrap">
        <div class="owl-carousel">
            <?php for ($i=1; $i <= 3; $i++) { ?>
                <?php if ( get_theme_mod('business_development_coaching_slider_image'.$i) ||  get_theme_mod('business_development_coaching_slider_short_heading'.$i) || get_theme_mod('business_development_coaching_slider_heading'.$i) || get_theme_mod('business_development_coaching_slider_text'.$i) || get_theme_mod('business_development_coaching_slider_button1_text'.$i) || get_theme_mod('business_development_coaching_slider_button1_link'.$i)) : ?>
                    <div class="main-slider-inner-box">
                        <?php if ( get_theme_mod('business_development_coaching_slider_image'.$i) ) : ?>
                            <img src="<?php echo esc_url( get_theme_mod('business_development_coaching_slider_image'.$i) ); ?>">
                        <?php else : ?>
                            <div class="image-box"></div>
                        <?php endif; ?>
                        <?php if ( get_theme_mod('business_development_coaching_slider_short_heading'.$i) || get_theme_mod('business_development_coaching_slider_heading'.$i) || get_theme_mod('business_development_coaching_slider_text'.$i) || get_theme_mod('business_development_coaching_slider_button1_text'.$i) || get_theme_mod('business_development_coaching_slider_button1_link'.$i)) : ?>
                            <div class="main-slider-content-box">
                                <div class="slider-content">
                                    <?php if ( get_theme_mod('business_development_coaching_slider_short_heading'.$i) ) : ?><h4><?php echo esc_html( get_theme_mod('business_development_coaching_slider_short_heading'.$i) ); ?></h4><?php endif; ?>
                                    <?php if ( get_theme_mod('business_development_coaching_slider_heading'.$i) ) : ?><h3><?php echo esc_html( get_theme_mod('business_development_coaching_slider_heading'.$i) ); ?></h3><?php endif; ?>
                                </div>
                                <?php if ( get_theme_mod('business_development_coaching_slider_text'.$i) ) : ?><p><?php echo esc_html( get_theme_mod('business_development_coaching_slider_text'.$i) ); ?></p><?php endif; ?>
                                <div class="main-slider-button">
                                    <?php if ( get_theme_mod('business_development_coaching_slider_button1_link'.$i) ||  get_theme_mod('business_development_coaching_slider_button1_text'.$i )) : ?><a href="<?php echo esc_url( get_theme_mod('business_development_coaching_slider_button1_link'.$i) ); ?>"><?php echo esc_html( get_theme_mod('business_development_coaching_slider_button1_text'.$i) ); ?></a><?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>
    </section>

    <?php } ?>

    <?php 
    $business_development_coaching_main_expert_wrap = absint(get_theme_mod('business_development_coaching_enable_event', 1));
    if($business_development_coaching_main_expert_wrap == 1){ 
    ?>

    <section id="main-expert-wrap">
        <div class="container">
            <div class="heading-expert-wrap">
                <?php if ( get_theme_mod('business_development_coaching_event_heading') ) : ?><h4><?php echo esc_html( get_theme_mod('business_development_coaching_event_heading') ); ?></h4><?php endif; ?>
                <?php if ( get_theme_mod('business_development_coaching_event_text') ) : ?><h3><?php echo esc_html( get_theme_mod('business_development_coaching_event_text') ); ?></h3><?php endif; ?>
            </div>
            <div id="primary">
                <div class="owl-carousel">
                    <?php
                    $business_development_coaching_catData2=  get_theme_mod('business_development_coaching_blog_cat');if($business_development_coaching_catData2){ 
                    $page_query = new WP_Query(array( 'category_name' => esc_html($business_development_coaching_catData2 ,'business-development-coaching')));?>
                    <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                        <div class="box">
                            <div class="box-image">
                                <?php 
                                  if(has_post_thumbnail()) { ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php } ?>
                            </div>
                            <div class="box-content">
                                <div class="date-box">
                                    <span><i class="fas fa-user"></i><a target="_blank" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                                    <span><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date(' M d Y') ); ?></span>
                                </div>
                                <h3><?php the_title();?></h3>
                                <p><?php $business_development_coaching_excerpt = get_the_excerpt(); echo esc_html( business_development_coaching_string_limit_words( $business_development_coaching_excerpt, 20)); ?></p>
                                <hr>
                                <div class="category-btn">
                                    <a href="<?php echo esc_url( get_permalink() );?>" class="slide-btn-2" title="<?php esc_attr_e( 'Read More', 'business-development-coaching' ); ?>"><?php esc_html_e('Read More','business-development-coaching'); ?><i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"></div> 
                        </div>          
                    <?php endwhile; 
                    wp_reset_postdata();
                    }?>
                </div>
            </div>                
        </div>
    </section>

    <?php } ?>
    
</main>

<?php
get_footer();