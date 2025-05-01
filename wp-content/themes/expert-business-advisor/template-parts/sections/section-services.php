<?php 
// Check if the service section is enabled in Customizer
$expert_business_advisor_servicesec = get_theme_mod('expert_business_advisor_service_show_hide', true);

if ('1' == $expert_business_advisor_servicesec) : ?>
<section id="service-section">
  <div class="container">
    <div class="serv-head mb-3 text-center">
      <?php if (get_theme_mod('expert_business_advisor_section_small_text')) : ?>
        <p class="small-title"><?php echo esc_html(get_theme_mod('expert_business_advisor_section_small_text')); ?></p>
      <?php endif; ?>
      
      <?php if (get_theme_mod('expert_business_advisor_section_title')) : ?>
        <h2 class="text-capitalize mt-2" id="section-title"><?php echo esc_html(get_theme_mod('expert_business_advisor_section_title')); ?></h2>
      <?php endif; ?>
    </div>
    
    <div class="row">
      <?php
      $expert_business_advisor_post_category = get_theme_mod('expert_business_advisor_offer_section_category','uncategorized');
      if ($expert_business_advisor_post_category) :
        $expert_business_advisor_category_id = term_exists($expert_business_advisor_post_category, 'category');
        
        if ($expert_business_advisor_category_id !== 0 && $expert_business_advisor_category_id !== null) :
          $expert_business_advisor_page_query = new WP_Query(array(
            'category_name' => sanitize_text_field($expert_business_advisor_post_category),
          ));

          if ($expert_business_advisor_page_query->have_posts()) :
            while ($expert_business_advisor_page_query->have_posts()) : $expert_business_advisor_page_query->the_post();
      ?>
              <div class="col-lg-4 col-md-4">
                <div class="serv-box mb-3">
                  <div class="inner-box-image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" alt="<?php the_title_attribute(); ?>" />
                    <?php else : ?>
                      <div class="serv-color"></div>
                    <?php endif; ?>
                  </div>
                  
                  <div class="inner-box text-start py-3">
                    <div class="row">
                      <div class="col-lg-10 col-md-9 col-9">
                        <h3 class="mb-2 text-capitalize"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      </div>
                      <div class="col-lg-2 col-md-3 col-3">
                        <div class="serv-icon text-md-end text-center">
                          <a href="<?php the_permalink(); ?>"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="main-serv-content"><?php echo esc_html(wp_trim_words(get_the_content(), 18)); ?></p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <div class="no-postfound"><?php esc_html_e('No posts found.', 'expert-business-advisor'); ?></div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php 
      $expert_business_advisor_header_button = get_theme_mod('expert_business_advisor_header_button', __('View More Projects', 'expert-business-advisor'));
      $expert_business_advisor_header_link = get_theme_mod('expert_business_advisor_header_link', '');

      if (!empty($expert_business_advisor_header_button) && !empty($expert_business_advisor_header_link)) : ?>
      <span class="serv-btn text-center mt-3">
          <a target="_blank" href="<?php echo esc_url($expert_business_advisor_header_link); ?>" class="offer-text" rel="noopener noreferrer">
              <?php echo esc_html($expert_business_advisor_header_button); ?>
          </a>
      </span>
    <?php endif; ?>
    
  </div>
</section>
<?php endif; ?>