<?php
/**
 * @package Demo Import
 * @since 1.0.0
 */

class ThemeWhizzie {

	protected $version = '1.1.0';

	/** @var string Current theme name, used as namespace in actions. */
	protected $theme_name = '';
	protected $theme_title = '';

	/** @var string Demo Import page slug and title. */
	protected $page_slug = '';
	protected $page_title = '';
	public $parent_slug;
	/** @var array Demo Import steps set by user. */
	protected $config_steps = array();

	/**
	 * Constructor
	 *
	 * @param $business_development_coaching_config	Our config parameters
	*/
	public function __construct( $business_development_coaching_config ) {
		$this->set_vars( $business_development_coaching_config );
		$this->init();
	}

	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $business_development_coaching_config	Our config parameters
	*/
	public function set_vars( $business_development_coaching_config ) {
		if( isset( $business_development_coaching_config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $business_development_coaching_config['page_slug'] );
		}
		if( isset( $business_development_coaching_config['page_title'] ) ) {
			$this->page_title = esc_attr( $business_development_coaching_config['page_title'] );
		}
		if( isset( $business_development_coaching_config['steps'] ) ) {
			$this->config_steps = $business_development_coaching_config['steps'];
		}

		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-demoimport' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );
	}

	/**
	 * Hooks and filters
	 * @since 1.0.0
	*/
	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'demo-import-style', get_template_directory_uri() . '/demo-import/assets/css/demo-import-style.css');
		wp_register_script( 'demo-import-script', get_template_directory_uri() . '/demo-import/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script(
			'demo-import-script',
			'business_development_coaching_whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'business-development-coaching' )
			)
		);
		wp_enqueue_script( 'demo-import-script' );
	}

	/**  Make a modal screen for the wizard **/
	public function menu_page() {
		add_menu_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'business_development_coaching_guide' ) ,'',40);
	}

	/** Make an interface for the wizard **/
	public function wizard_page() {
		/* If we arrive here, we have the filesystem */ ?>
		<div class="wrap">
			<?php echo '<div class="whizzie-wrap">';
				// The wizard is a list with only one item visible at a time
				$steps = $this->get_steps();
				echo '<ul class="whizzie-nav wizard-icon-nav">';?>
				<?php
					$stepI=1;
					foreach( $steps as $step ) {
						$stepAct=($stepI ==1)? 1 : 0;
						if( isset( $step['icon_text'] ) && $step['icon_text'] ) {
							echo '<li class="commom-cls nav-step-' . esc_attr( $step['id'] ) . '" wizard-steps="step-'.esc_attr( $step['id'] ).'" data-enable="'.$stepAct.'">
							<p>'.esc_attr( $step['icon_text'] ).'</p>
							</li>';
						}
					$stepI++;}
			 	echo '</ul>';
				echo '<ul class="whizzie-menu wizard-menu-page">';
				foreach( $steps as $step ) {
					$class = 'step step-' . esc_attr( $step['id'] );
					echo '<li data-step="' . esc_attr( $step['id'] ) . '" class="' . esc_attr( $class ) . '" >';
						$content = call_user_func( array( $this, $step['view'] ) );
						printf('<div class="wizard-button-wrapper">');
							if( isset( $step['button_text_one'] )) {
								printf(
									'<div class="button-wrap button-wrap-one">
										<a href="#" class="button button-primary do-it" data-callback="install_widgets" data-step="widgets"><p class="demo-type-text">%s</p></a>
									</div>',
									esc_html( $step['button_text_one'] )
								);
							}
						printf('</div>');
					echo '</li>';
				}
				echo '</ul>';
				?>
				<div class="step-loading"><span class="spinner">
					<img src="<?php echo esc_url(get_template_directory_uri().'/demo-import/assets/images/Spinner-Animaion.gif'); ?>">
				</span></div>
			<?php echo '</div>';?>
		</div>
	<?php }

	/**
	 * Set options for the steps
	 * @return Array
	*/
	public function get_steps() {
		$dev_steps = $this->config_steps;
		$steps = array(
			'widgets' => array(
				'id'			=> 'widgets',
				'title'			=> __( 'Customizer', 'business-development-coaching' ),
				'icon'			=> 'welcome-widgets-menus',
				'view'			=> 'get_step_widgets',
				'callback'		=> 'install_widgets',
				'button_text_one'	=> __( 'Import Demo', 'business-development-coaching' ),
				'can_skip'		=> true,
				'icon_text'      => 'Import Demo'
			),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'business-development-coaching' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> '',
				'icon_text'      => 'Done'
			)
		);
		// Iterate through each step and replace with dev config values
		if( $dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from config.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $dev_steps as $dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $dev_step['id'] ) ) {
					$id = $dev_step['id'];
					if( isset( $steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $dev_step[$element] ) ) {
								$steps[$id][$element] = $dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $steps;
	}

	/**    Print the content for the intro step     **/
		public function get_step_importer() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this Business Development Coaching Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.','business-development-coaching'); ?>
			</p>
		</div>
	<?php }

	/**   Print the content for the widgets step   **/
	public function get_step_widgets() { ?>
		<div class="summary">
			<p>
				<?php esc_html_e('This theme allows you to import demo content and add widgets. Install them using the button below. You can also update or deactivate them using the Customizer.','business-development-coaching'); ?>
			</p>
		</div>
	<?php }

	/** Print the content for the final step **/
	public function get_step_done() { ?>

		<div class="setup-finish">
			<p>
				<?php echo esc_html('Your demo content has been imported successfully. Click the finish button for more information.'); ?>
			</p>
			<div class="finish-buttons">
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=business-development-coaching-getstart-page' ) ); ?>" class="wz-btn-customizer" target="_blank"><?php esc_html_e('About Business Development Coaching','business-development-coaching') ?></a>
				<a href="<?php echo esc_url(admin_url('/customize.php')); ?>" class="wz-btn-customizer" target="_blank"><?php esc_html_e('Customize Your Demo','business-development-coaching') ?></a>
				<a href="" class="wz-btn-builder" target="_blank"><?php esc_html_e('Customize Your Demo','business-development-coaching'); ?></a>
				<a href="<?php echo esc_url(site_url()); ?>" class="wz-btn-visit-site" target="_blank"><?php esc_html_e('Visit Your Site','business-development-coaching'); ?></a>
			</div>
			<div class="finish-buttons">
				<a href="<?php echo esc_url(admin_url()); ?>" class="button button-primary"><?php esc_html_e('Finish','business-development-coaching'); ?></a>
			</div>
		</div>

	<?php }


	public function business_development_coaching_customizer_nav_menu() {
		// ------- Create Primary Menu --------
		$business_development_coaching_themename = 'Business Development Coaching'; // Ensure the theme name is set
		$business_development_coaching_menuname = $business_development_coaching_themename . ' Primary Menu';
		$business_development_coaching_menulocation = 'menu-1';
		$business_development_coaching_menu_exists = wp_get_nav_menu_object($business_development_coaching_menuname);

		if (!$business_development_coaching_menu_exists) {
			$business_development_coaching_menu_id = wp_create_nav_menu($business_development_coaching_menuname);

			// Home
			wp_update_nav_menu_item($business_development_coaching_menu_id, 0, array(
				'menu-item-title' => __('Home', 'business-development-coaching'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'),
				'menu-item-status' => 'publish'
			));

			// About
			$business_development_coaching_page_about = get_page_by_path('about');
			if($business_development_coaching_page_about){
				wp_update_nav_menu_item($business_development_coaching_menu_id, 0, array(
					'menu-item-title' => __('About', 'business-development-coaching'),
					'menu-item-classes' => 'about',
					'menu-item-url' => get_permalink($business_development_coaching_page_about),
					'menu-item-status' => 'publish'
				));
			}

			// Services
			$business_development_coaching_page_services = get_page_by_path('services');
			if($business_development_coaching_page_services){
				wp_update_nav_menu_item($business_development_coaching_menu_id, 0, array(
					'menu-item-title' => __('Services', 'business-development-coaching'),
					'menu-item-classes' => 'services',
					'menu-item-url' => get_permalink($business_development_coaching_page_services),
					'menu-item-status' => 'publish'
				));
			}

			// Blog
			$business_development_coaching_page_blog = get_page_by_path('blog');
			if($business_development_coaching_page_blog){
				wp_update_nav_menu_item($business_development_coaching_menu_id, 0, array(
					'menu-item-title' => __('Blog', 'business-development-coaching'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink($business_development_coaching_page_blog),
					'menu-item-status' => 'publish'
				));
			}

			// Contact Us
			$business_development_coaching_page_contact = get_page_by_path('contact');
			if($business_development_coaching_page_contact){
				wp_update_nav_menu_item($business_development_coaching_menu_id, 0, array(
					'menu-item-title' => __('Contact Us', 'business-development-coaching'),
					'menu-item-classes' => 'contact',
					'menu-item-url' => get_permalink($business_development_coaching_page_contact),
					'menu-item-status' => 'publish'
				));
			}

			// Assign menu to location if not set
			if (!has_nav_menu($business_development_coaching_menulocation)) {
				$business_development_coaching_locations = get_theme_mod('nav_menu_locations');
				$business_development_coaching_locations[$business_development_coaching_menulocation] = $business_development_coaching_menu_id; // Use $business_development_coaching_menu_id here
				set_theme_mod('nav_menu_locations', $business_development_coaching_locations);
			}
		}
	}
	
	public function business_development_coaching_social_menu() {

		// ------- Create Social Menu --------
		$business_development_coaching_menuname = $business_development_coaching_themename . 'Social Menu';
		$business_development_coaching_menulocation = 'social-menu';
		$business_development_coaching_menu_exists = wp_get_nav_menu_object( $business_development_coaching_menuname );

		if( !$business_development_coaching_menu_exists){
			$business_development_coaching_menu_id = wp_create_nav_menu($business_development_coaching_menuname);

			wp_update_nav_menu_item( $business_development_coaching_menu_id, 0, array(
				'menu-item-title'  => __( 'Facebook', 'business-development-coaching' ),
				'menu-item-url'    => 'https://www.facebook.com',
				'menu-item-status' => 'publish',
			) );

			wp_update_nav_menu_item( $business_development_coaching_menu_id, 0, array(
				'menu-item-title'  => __( 'Pinterest', 'business-development-coaching' ),
				'menu-item-url'    => 'https://www.pinterest.com',
				'menu-item-status' => 'publish',
			) );
	
			wp_update_nav_menu_item( $business_development_coaching_menu_id, 0, array(
				'menu-item-title'  => __( 'Twitter', 'business-development-coaching' ),
				'menu-item-url'    => 'https://www.twitter.com',
				'menu-item-status' => 'publish',
			) );
	
			wp_update_nav_menu_item( $business_development_coaching_menu_id, 0, array(
				'menu-item-title'  => __( 'Youtube', 'business-development-coaching' ),
				'menu-item-url'    => 'https://www.youtube.com',
				'menu-item-status' => 'publish',
			) );

			wp_update_nav_menu_item( $business_development_coaching_menu_id, 0, array(
				'menu-item-title'  => __( 'Instagram', 'business-development-coaching' ),
				'menu-item-url'    => 'https://www.instagram.com',
				'menu-item-status' => 'publish',
			) );

			if( !has_nav_menu( $business_development_coaching_menulocation ) ){
					$locations = get_theme_mod('nav_menu_locations');
					$locations[$business_development_coaching_menulocation] = $business_development_coaching_menu_id;
					set_theme_mod( 'nav_menu_locations', $locations );
			}
		}
	}

	/**
	* Imports the Demo Content
	* @since 1.1.0
	*/
	public function setup_widgets() {

		//................................................. MENU PAGES .................................................//
		
		$business_development_coaching_home_id='';
		$business_development_coaching_home_content = '';

		$business_development_coaching_home_title = 'Home';
		$business_development_coaching_home = array(
				'post_type' => 'page',
				'post_title' => $business_development_coaching_home_title,
				'post_content'  => $business_development_coaching_home_content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'home'
		);
		$business_development_coaching_home_id = wp_insert_post($business_development_coaching_home);

		//Set the home page template
		add_post_meta( $business_development_coaching_home_id, '_wp_page_template', 'revolution-home.php' );

		//Set the static front page
		$business_development_coaching_home = get_page_by_title( 'Home' );
		update_option( 'page_on_front', $business_development_coaching_home->ID );
		update_option( 'show_on_front', 'page' );


		// Create a posts page and assign the template
		$business_development_coaching_blog_title = 'Blog';
		$business_development_coaching_blog_check = get_page_by_path('blog');
		if (!$business_development_coaching_blog_check) {
			$business_development_coaching_blog = array(
				'post_type'    => 'page',
				'post_title'   => $business_development_coaching_blog_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'blog' // Unique slug for the blog page
			);
			$business_development_coaching_blog_id = wp_insert_post($business_development_coaching_blog);

			// Set the posts page
			if (!is_wp_error($business_development_coaching_blog_id)) {
				update_option('page_for_posts', $business_development_coaching_blog_id);
			}
		}

		// Create a Contact Us page and assign the template
		$business_development_coaching_contact_title = 'Contact Us';
		$business_development_coaching_contact_check = get_page_by_path('contact');
		if (!$business_development_coaching_contact_check) {
			$business_development_coaching_contact = array(
				'post_type'    => 'page',
				'post_title'   => $business_development_coaching_contact_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'contact' // Unique slug for the Contact Us page
			);
			wp_insert_post($business_development_coaching_contact);
		}

		// Create a About page and assign the template
		$business_development_coaching_about_title = 'About';
		$business_development_coaching_about_check = get_page_by_path('about');
		if (!$business_development_coaching_about_check) {
			$business_development_coaching_about = array(
				'post_type'    => 'page',
				'post_title'   => $business_development_coaching_about_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'about' // Unique slug for the About page
			);
			wp_insert_post($business_development_coaching_about);
		}

		// Create a Services page and assign the template
		$business_development_coaching_services_title = 'Services';
		$business_development_coaching_services_check = get_page_by_path('services');
		if (!$business_development_coaching_services_check) {
			$business_development_coaching_services = array(
				'post_type'    => 'page',
				'post_title'   => $business_development_coaching_services_title,
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_name'    => 'services' // Unique slug for the Services page
			);
			wp_insert_post($business_development_coaching_services);
		}


		// ------------------------------------------ Header -------------------------------------- //

			set_theme_mod('business_development_coaching_topheader_text','ANY MAJOR ANNOUNCEMENT ABOUT YOUR BRAND OR ORGANIZATION GOES HERE!');
			set_theme_mod('business_development_coaching_middle_header_contact_email','Mail: example.com');
			set_theme_mod('business_development_coaching_middle_header_contact_phone','Phone: +12345678909');

			set_theme_mod('business_development_coaching_middle_header_button_text','Get Free Consultation');
			set_theme_mod('business_development_coaching_middle_header_button_link','#');

			set_theme_mod('business_development_coaching_topheader_button_text','Get Free Life Coach Magazine!');
			set_theme_mod('business_development_coaching_topheader_button_link','#');


		// ------------------------------------------ Slider Section -------------------------------------- //

			for($i=1;$i<=3;$i++){
				set_theme_mod( 'business_development_coaching_slider_image'.$i,get_template_directory_uri().'/revolution/assets/images/slider'.$i.'.png' );
				set_theme_mod( 'business_development_coaching_slider_short_heading'.$i, 'Welcome to Business Developmemt Coaching WordPress Theme' );
				set_theme_mod( 'business_development_coaching_slider_heading'.$i, 'We Help you live a Better Life!' );
				set_theme_mod( 'business_development_coaching_slider_text'.$i, 'Aliquam malesuada bibendum arcu vitae elementum curabitur vitae ven pellentesque.' );
				set_theme_mod( 'business_development_coaching_slider_button1_text'.$i, 'Get Started' );
				set_theme_mod( 'business_development_coaching_slider_button1_link'.$i, '#' );
			}

		// ------------------------------------------ Chef Section -------------------------------------- //

			set_theme_mod('business_development_coaching_event_heading','Our Exclusive Blog');
			set_theme_mod('business_development_coaching_event_text','Our Articles & News');

			set_theme_mod('business_development_coaching_blog_cat','uncategorized');

			wp_delete_post(1);
			$blog_title=array('Our strategy create a low advantage','Our strategy create a low advantage','Our strategy create a low advantage');
			for($i=1;$i<=3;$i++){
				$title =$blog_title[$i-1];
				$content = 'There are many variations of passages of Lorem Ipsum but the available';

				// Create post object
				$my_post = array(
					'post_title'    => wp_strip_all_tags( $title ),
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'post',
				);

				// Insert the post into the database
				$post_id = wp_insert_post( $my_post );

				$image_url = get_template_directory_uri().'/revolution/assets/images/blogs'.$i.'.png';
	
				$image_name= 'blogs'.$i.'.png';
				$upload_dir       = wp_upload_dir();
				// Set upload folder
				$image_data       = file_get_contents($image_url);
				// Get image data
				$unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
				// Generate unique name
				$filename= basename( $unique_file_name );
				// Create image file name
				// Check folder permission and define file location
				if( wp_mkdir_p( $upload_dir['path'] ) ) {
					 $file = $upload_dir['path'] . '/' . $filename;
				} else {
					 $file = $upload_dir['basedir'] . '/' . $filename;
				}
				// Create the image  file on the server
				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}

				WP_Filesystem();
				global $wp_filesystem;

				if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}
				// Check image file type
				$wp_filetype = wp_check_filetype( $filename, null );
				// Set attachment data
				$attachment = array(
				 'post_mime_type' => $wp_filetype['type'],
				 'post_title'     => sanitize_file_name( $filename ),
				 'post_content'   => '',
				 'post_type'     => 'post',
				 'post_status'    => 'inherit'
				);
				// Create the attachment
				$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
				// Include image.php
				require_once(ABSPATH . 'wp-admin/includes/image.php');
				// Define attachment metadata
				$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
				// Assign metadata to attachment
				 wp_update_attachment_metadata( $attach_id, $attach_data );
				// And finally assign featured image to post
				set_post_thumbnail( $post_id, $attach_id );
			}

	$this->business_development_coaching_social_menu();
	$this->business_development_coaching_customizer_nav_menu();
	}

	public function business_development_coaching_guide() {
		$display_string = '';
		$return = add_query_arg( array()) ;
		$theme = wp_get_theme( 'business-development-coaching' );
		?>
		<div class="wrapper-info get-stared-page-wrap">
			<div class="wrapper-info-content">
				<div class="buynow__">
					<h2><?php esc_html_e( 'Welcome to Business Development Coaching', 'business-development-coaching' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
					<p><?php esc_html_e('The quick setup wizard will assist you in configuring your new website. This wizard will import the demo content.', 'business-development-coaching'); ?></p>
				</div>
				<div class="buynow_">
					<a target="_blank" class="buynow_themepage" href="<?php echo esc_url('https://www.revolutionwp.com/products/business-coaching-wordpress-theme'); ?>"><?php echo esc_html__('Go Premium Now', 'business-development-coaching'); ?></a>
				</div>
			</div>
			<div class="tab-sec theme-option-tab">
				<div id="demo_offer" class="tabcontent open">
					<?php $this->wizard_page(); ?>
				</div>
			</div>
		</div>
	<?php }
}