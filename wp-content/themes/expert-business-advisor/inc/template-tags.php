<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Expert Business Advisor
 */

if ( ! function_exists( 'expert_business_advisor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function expert_business_advisor_posted_on() {
	$expert_business_advisor_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$expert_business_advisor_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$expert_business_advisor_time_string = sprintf( $expert_business_advisor_time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$expert_business_advisor_posted_on = sprintf(
		/* translators: %s: Date. */
		esc_html_x( 'Posted on %s', 'post date', 'expert-business-advisor' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $expert_business_advisor_time_string . '</a>'
	);

	$expert_business_advisor_byline = sprintf(
		/* translators: %s: by. */
		esc_html_x( 'by %s', 'post author', 'expert-business-advisor' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $expert_business_advisor_posted_on . '</span><span class="byline"> ' . $expert_business_advisor_byline . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'expert_business_advisor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function expert_business_advisor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$expert_business_advisor_categories_list = get_the_category_list( esc_html__( ', ', 'expert-business-advisor' ) );
		if ( $expert_business_advisor_categories_list && expert_business_advisor_categorized_blog() ) {
			/* translators: %1$s: Posted. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'expert-business-advisor' ) . '</span>', $expert_business_advisor_categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$expert_business_advisor_tags_list = get_the_tag_list( '', esc_html__( ', ', 'expert-business-advisor' ) );
		if ( $expert_business_advisor_tags_list ) {
			/* translators: %1$s: Tagged. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'expert-business-advisor' ) . '</span>', $expert_business_advisor_tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'expert-business-advisor' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'expert-business-advisor' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function expert_business_advisor_categorized_blog() {
	if ( false === ( $expert_business_advisor_all_the_cool_cats = get_transient( 'expert_business_advisor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$expert_business_advisor_all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$expert_business_advisor_all_the_cool_cats = count( $expert_business_advisor_all_the_cool_cats );

		set_transient( 'expert_business_advisor_categories', $expert_business_advisor_all_the_cool_cats );
	}

	if ( $expert_business_advisor_all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so expert_business_advisor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so expert_business_advisor_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in expert_business_advisor_categorized_blog.
 */
function expert_business_advisor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'expert_business_advisor_categories' );
}
add_action( 'edit_category', 'expert_business_advisor_category_transient_flusher' );
add_action( 'save_post',     'expert_business_advisor_category_transient_flusher' );

/**
 * Register Breadcrumb for Multiple Variation
 */
function expert_business_advisor_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');
}

/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'expert_business_advisor_post_layout' )) :
function expert_business_advisor_post_layout(){
	if(is_active_sidebar('expert-business-advisor-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;