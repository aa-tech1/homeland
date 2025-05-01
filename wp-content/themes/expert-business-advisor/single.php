<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Expert Business Advisor
 */

$expert_business_advisor_show_hide_related_post = get_theme_mod('expert_business_advisor_show_hide_related_post', '1');

get_header();
?>
<section class="blog-area inarea-blog-single-page-two">
	<div class="container">
		<div class="row">
            <?php 
                $expert_business_advisor_single_post_sidebar_setting = get_theme_mod('expert_business_advisor_single_post_sidebar_setting','1');
                $expert_business_advisor_sidebar_position = get_theme_mod('expert_business_advisor_sidebar_position', 'right');
                $expert_business_advisor_content_class = ($expert_business_advisor_single_post_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';

                // Set classes for left or right sidebar
	            $expert_business_advisor_content_order_class = ($expert_business_advisor_sidebar_position == 'left') ? 'order-lg-2' : '';
	            $expert_business_advisor_sidebar_order_class = ($expert_business_advisor_sidebar_position == 'left') ? 'order-lg-1' : '';
            ?>
            <div class="<?php echo esc_attr($expert_business_advisor_content_class . ' ' . $expert_business_advisor_content_order_class); ?>">
				<div class="singel-page-area">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
							<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php comments_template( '', true ); // show comments  ?>

					<?php if ($expert_business_advisor_show_hide_related_post == '1') : ?>
						<?php get_template_part('template-parts/content/related-posts'); ?>
					<?php endif; ?>

				</div>
			</div>
			<?php if( $expert_business_advisor_single_post_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>