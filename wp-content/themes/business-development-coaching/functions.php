<?php
/**
 * Business Development Coaching functions and definitions
 *
 * @package Business Development Coaching
 */

if ( ! defined( 'BUSINESS_DEVELOPMENT_COACHING_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BUSINESS_DEVELOPMENT_COACHING_VERSION', '1.0.0' );
}

function business_development_coaching_setup() {

	load_theme_textdomain( 'business-development-coaching', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "responsive-embeds" );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'business-development-coaching' ),
			'social-menu' => esc_html__('Social Menu', 'business-development-coaching'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'business_development_coaching_custom_background_args',
			array(
				'default-color' => '#fafafa',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'post-formats', array(
        'image',
        'video',
        'gallery',
        'audio', 
    ));
}
add_action( 'after_setup_theme', 'business_development_coaching_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $business_development_coaching_content_width
 */
function business_development_coaching_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_development_coaching_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_development_coaching_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_development_coaching_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'business-development-coaching' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'business-development-coaching' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'business-development-coaching' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'business-development-coaching' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'business-development-coaching' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'business-development-coaching' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'business-development-coaching' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'business-development-coaching' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'business_development_coaching_widgets_init' );


function business_development_coaching_social_menu() {
    if (has_nav_menu('social-menu')) :
        wp_nav_menu(array(
            'theme_location' => 'social-menu',
            'container' => 'ul',
            'menu_class' => 'social-menu menu',
            'menu_id'  => 'menu-social',
        ));
    endif;
}

/**
font-family: "Inder", sans-serif;
font-family: "DM Serif Display", serif;
font-family: "Shadows Into Light", cursive;
 * Enqueue scripts and styles.
 */
function business_development_coaching_scripts() {

	// Load fonts locally
	require_once get_theme_file_path('revolution/inc/wptt-webfont-loader.php');

	$business_development_coaching_font_families = array(
		'DM+Serif+Display:ital@0;1',
		'Inder',
		'Inter:wght@100..900',
		'Shadows+Into+Light',
	);
	
	$business_development_coaching_fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $business_development_coaching_font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	wp_enqueue_style('business-development-coaching-google-fonts', wptt_get_webfont_url(esc_url_raw($business_development_coaching_fonts_url)), array(), '1.0.0');
	
	// Font Awesome CSS
	wp_enqueue_style('font-awesome-5', get_template_directory_uri() . '/revolution/assets/vendors/font-awesome-5/css/all.min.css', array());

	wp_enqueue_style('owl.carousel.style', get_template_directory_uri() . '/revolution/assets/css/owl.carousel.css', array());
	
	wp_enqueue_style( 'business-development-coaching-style', get_stylesheet_uri(), array(), BUSINESS_DEVELOPMENT_COACHING_VERSION );

	require get_parent_theme_file_path( '/custom-style.php' );
	wp_add_inline_style( 'business-development-coaching-style',$business_development_coaching_custom_css );

	wp_style_add_data('business-development-coaching-style', 'rtl', 'replace');

	wp_enqueue_script( 'business-development-coaching-navigation', get_template_directory_uri() . '/js/navigation.js', array(), BUSINESS_DEVELOPMENT_COACHING_VERSION, true );

	wp_enqueue_script( 'owl.carousel.jquery', get_template_directory_uri() . '/revolution/assets/js/owl.carousel.js', array(), BUSINESS_DEVELOPMENT_COACHING_VERSION, true );

	wp_enqueue_script( 'business-development-coaching-custom-js', get_template_directory_uri() . '/revolution/assets/js/custom.js', array('jquery'), BUSINESS_DEVELOPMENT_COACHING_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_development_coaching_scripts' );

if (!function_exists('business_development_coaching_related_post')) :
    /**
     * Display related posts from same category
     *
     */

    function business_development_coaching_related_post($post_id){        
        $business_development_coaching_categories = get_the_category($post_id);
        if ($business_development_coaching_categories) {
            $business_development_coaching_category_ids = array();
            $business_development_coaching_category = get_category($business_development_coaching_category_ids);
            $business_development_coaching_categories = get_the_category($post_id);
            foreach ($business_development_coaching_categories as $business_development_coaching_category) {
                $business_development_coaching_category_ids[] = $business_development_coaching_category->term_id;
            }
            $business_development_coaching_count = $business_development_coaching_category->category_count;
            if ($business_development_coaching_count > 1) { ?>

         	<?php
		$business_development_coaching_related_post_wrap = absint(get_theme_mod('business_development_coaching_enable_related_post', 1));
		if($business_development_coaching_related_post_wrap == 1){ ?>
                <div class="related-post">
                    
                    <h2 class="post-title"><?php esc_html_e(get_theme_mod('business_development_coaching_related_post_text', __('Related Post', 'business-development-coaching'))); ?></h2>
                    <?php
                    $business_development_coaching_cat_post_args = array(
                        'category__in' => $business_development_coaching_category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' =>  get_theme_mod( 'business_development_coaching_related_post_count', '3' ),
                        'post_status' => 'publish',
						'orderby'           => 'rand',
                        'ignore_sticky_posts' => true
                    );
                    $business_development_coaching_featured_query = new WP_Query($business_development_coaching_cat_post_args);
                    ?>
                    <div class="rel-post-wrap">
                        <?php
                        if ($business_development_coaching_featured_query->have_posts()) :

                        while ($business_development_coaching_featured_query->have_posts()) : $business_development_coaching_featured_query->the_post();
                            ?>

							<div class="card-item rel-card-item">
								<div class="card-content">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="card-media">
                                            <?php business_development_coaching_post_thumbnail(); ?>
                                        </div>
                                    <?php } else {
                                        // Fallback default image
                                        $business_development_coaching_default_post_thumbnail = get_template_directory_uri() . '/revolution/assets/images/blogs2.png';
                                        echo '<img class="default-post-img" src="' . esc_url( $business_development_coaching_default_post_thumbnail ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                                    } ?>
									<div class="entry-title">
										<h3>
											<a href="<?php the_permalink() ?>">
												<?php the_title(); ?>
											</a>
										</h3>
									</div>
									<div class="entry-meta">
                                        <?php
                                        business_development_coaching_posted_on();
                                        business_development_coaching_posted_by();
                                        ?>
                                    </div>
								</div>
							</div>
                        <?php
                        endwhile;
                        ?>
                <?php
                endif;
                wp_reset_postdata();
                ?>
                </div>
                <?php } ?>
                <?php
            }
        }
    }
endif;
add_action('business_development_coaching_related_posts', 'business_development_coaching_related_post', 10, 1);

function business_development_coaching_sanitize_choices( $business_development_coaching_input, $business_development_coaching_setting ) {
    global $wp_customize; 
    $business_development_coaching_control = $wp_customize->get_control( $business_development_coaching_setting->id ); 
    if ( array_key_exists( $business_development_coaching_input, $business_development_coaching_control->choices ) ) {
        return $business_development_coaching_input;
    } else {
        return $business_development_coaching_setting->default;
    }
}

//Excerpt 
function business_development_coaching_excerpt_function($business_development_coaching_excerpt_count = 35) {
    $business_development_coaching_excerpt = get_the_excerpt();
    $business_development_coaching_text_excerpt = wp_strip_all_tags($business_development_coaching_excerpt);
    $business_development_coaching_excerpt_limit = (int) get_theme_mod('business_development_coaching_excerpt_limit', $business_development_coaching_excerpt_count);
    $business_development_coaching_words = preg_split('/\s+/', $business_development_coaching_text_excerpt); 
    $business_development_coaching_trimmed_words = array_slice($business_development_coaching_words, 0, $business_development_coaching_excerpt_limit);
    $business_development_coaching_theme_excerpt = implode(' ', $business_development_coaching_trimmed_words);

    return $business_development_coaching_theme_excerpt;
}


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$business_development_coaching_checked`
 * as a boolean value, either TRUE or FALSE.
 */
function business_development_coaching_sanitize_checkbox($business_development_coaching_checked)
{
    // Boolean check.
    return ((isset($business_development_coaching_checked) && true == $business_development_coaching_checked) ? true : false);
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/revolution/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/revolution/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/revolution/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/revolution/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/revolution/inc/jetpack.php';
}
/**
* GET START.
*/
require get_template_directory() . '/getstarted/business_development_coaching_about_page.php';

/**
* DEMO IMPORT.
*/
require get_template_directory() . '/demo-import/business_development_coaching_config_file.php';

/**
 * Breadcrumb File.
 */
require get_template_directory() . '/revolution/inc/breadcrumbs.php';

function business_development_coaching_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'business_development_coaching_remove_customize_register', 11 );

/**
 * WooCommerce custom filters
 */
add_filter('loop_shop_columns', 'business_development_coaching_loop_columns');

if (!function_exists('business_development_coaching_loop_columns')) {

	function business_development_coaching_loop_columns() {

		$business_development_coaching_columns = get_theme_mod( 'business_development_coaching_per_columns', 3 );

		return $business_development_coaching_columns;
	}
}

/************************************************************************************/

add_filter( 'loop_shop_per_page', 'business_development_coaching_per_page', 20 );

function business_development_coaching_per_page( $business_development_coaching_cols ) {

  	$business_development_coaching_cols = get_theme_mod( 'business_development_coaching_product_per_page', 9 );

	return $business_development_coaching_cols;
}

/************************************************************************************/

add_filter( 'woocommerce_output_related_products_args', 'business_development_coaching_products_args' );

function business_development_coaching_products_args( $business_development_coaching_args ) {

    $business_development_coaching_args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );

    $business_development_coaching_args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );

    return $business_development_coaching_args;
}

/************************************************************************************/

/**
 * Custom logo
 */

function business_development_coaching_custom_css() {
?>
	<style type="text/css" id="custom-theme-colors" >
        :root {
           
            --business_development_coaching_logo_width: <?php echo absint(get_theme_mod('business_development_coaching_logo_width')); ?> ;   
        }
        .site-branding img {
            max-width:<?php echo esc_html(get_theme_mod('business_development_coaching_logo_width')); ?>px ;    
        }         
	</style>
<?php
}
add_action( 'wp_head', 'business_development_coaching_custom_css' );

/* Excerpt Limit Begin */
function business_development_coaching_string_limit_words($string, $business_development_coaching_word_limit) {
	$business_development_coaching_words = explode(' ', $string, ($business_development_coaching_word_limit + 1));
	if(count($business_development_coaching_words) > $business_development_coaching_word_limit)
	array_pop($business_development_coaching_words);
	return implode(' ', $business_development_coaching_words);
}

define('BUSINESS_DEVELOPMENT_COACHING_FREE_SUPPORT',__('https://wordpress.org/support/theme/business-development-coaching/','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_PRO_SUPPORT',__('https://www.revolutionwp.com/pages/community/','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_REVIEW',__('https://wordpress.org/support/theme/business-development-coaching/reviews/#new-post','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_BUY_NOW',__('https://www.revolutionwp.com/products/business-coaching-wordpress-theme','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_LIVE_DEMO',__('https://demo.revolutionwp.com/business-development-coaching-pro/','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_PRO_DOC',__('https://demo.revolutionwp.com/wpdocs/business-development-coaching-pro/','business-development-coaching'));
define('BUSINESS_DEVELOPMENT_COACHING_LITE_DOC',__('https://demo.revolutionwp.com/wpdocs/business-development-coaching-free','business-development-coaching'));



// Add admin notice
function business_development_coaching_admin_notice() { 
    global $pagenow;
    $business_development_coaching_theme_args      = wp_get_theme();
    $business_development_coaching_meta            = get_option( 'business_development_coaching_admin_notice' );
    $name            = $business_development_coaching_theme_args->__get( 'Name' );
    $business_development_coaching_current_screen  = get_current_screen();

    if( !$business_development_coaching_meta ){
	    if( is_network_admin() ){
	        return;
	    }

	    if( ! current_user_can( 'manage_options' ) ){
	        return;
	    } 
		
		if($business_development_coaching_current_screen->base != 'appearance_page_business_development_coaching_guide' ) { ?>
			<div class="notice notice-success">
				<h2><?php esc_html_e('Hey, Thank you for installing Business Development Coaching Theme!', 'business-development-coaching'); ?><span><a class="info-link" href="<?php echo esc_url( admin_url( 'themes.php?page=business-development-coaching-getstart-page' ) ); ?>"><?php esc_html_e('Click Here for more Details', 'business-development-coaching'); ?></a></span></h2>
				<p class="dismiss-link"><strong><a href="?business_development_coaching_admin_notice=1"><?php esc_html_e( 'Dismiss', 'business-development-coaching' ); ?></a></strong></p>
			</div>
			<?php
		}

	}
}

add_action( 'admin_notices', 'business_development_coaching_admin_notice' );

if( ! function_exists( 'business_development_coaching_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function business_development_coaching_update_admin_notice(){
    if ( isset( $_GET['business_development_coaching_admin_notice'] ) && $_GET['business_development_coaching_admin_notice'] = '1' ) {
        update_option( 'business_development_coaching_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'business_development_coaching_update_admin_notice' );


add_action('after_switch_theme', 'business_development_coaching_setup_options');
function business_development_coaching_setup_options () {
    update_option('business_development_coaching_admin_notice', FALSE );
}

function get_changelog_from_readme() {
    $business_development_coaching_file_path = get_template_directory() . '/readme.txt'; // Adjust path if necessary

    if (file_exists($business_development_coaching_file_path)) {
        $business_development_coaching_content = file_get_contents($business_development_coaching_file_path);

        // Extract changelog section
        $business_development_coaching_changelog_start = strpos($business_development_coaching_content, "== Changelog ==");
        $business_development_coaching_changelog = substr($business_development_coaching_content, $business_development_coaching_changelog_start);

        // Split changelog into versions
        preg_match_all('/\*\s([\d\.]+)\s-\s(.+?)\n((?:\t-\s.+?\n)+)/', $business_development_coaching_changelog, $business_development_coaching_matches, PREG_SET_ORDER);
        
        return $business_development_coaching_matches;
    }
    return [];
}

function business_development_coaching_customize_scss() {
    // Retrieve the two colors from the customizer settings.
    $business_development_coaching_color1 = get_theme_mod('business_development_coaching_gradient_color1', '#4CC7F0'); // Default start color
    $business_development_coaching_color2 = get_theme_mod('business_development_coaching_gradient_color2', '#1646BB'); // Default end color

    // Generate the gradient.
    $business_development_coaching_gradient = "linear-gradient(90deg, $business_development_coaching_color1 0%, $business_development_coaching_color2 100%)";
    ?>
    <style type="text/css">
        :root {
            --tertiary-color: <?php echo esc_html($business_development_coaching_color2); ?>; /* Fallback color (color1) */
            --primary-gradient: <?php echo esc_html($business_development_coaching_gradient); ?>; /* Dynamically generated gradient */
        }
    </style>
    <?php
}
add_action('wp_head', 'business_development_coaching_customize_scss');