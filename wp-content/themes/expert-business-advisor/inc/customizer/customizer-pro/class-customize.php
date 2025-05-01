<?php

if ( ! defined( 'EXPERT_BUSINESS_ADVISOR_PREMIUM' ) ) {
    define( 'EXPERT_BUSINESS_ADVISOR_PREMIUM', 'https://www.seothemesexpert.com/products/business-advisor-wordpress-theme' );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Expert_Business_Advisor_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
        require_once get_template_directory() . '/inc/customizer/customizer-pro/section-pro.php';

        // Register custom section types.
		$manager->register_section_type( 'Expert_Business_Advisor_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Expert_Business_Advisor_Customize_Section_Pro(
				$manager,
				'expert-business-advisor',
				array(
					'title'      => __( 'UPGRADE TO PREMIUM', 'expert-business-advisor' ),
                    'pro_text' => esc_html__( 'Go Pro','expert-business-advisor' ),
                    'pro_url'  => esc_url( EXPERT_BUSINESS_ADVISOR_PREMIUM, 'expert-business-advisor'),
                    'priority' => 0
                )
			)
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {
        require_once get_template_directory() . '/inc/customizer/customizer-pro/section-pro.php';

        wp_enqueue_script( 'expert-business-advisor-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-pro/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'expert-business-advisor-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-pro/customize-controls.css' );
	}
}
// Doing this customizer thang!
Expert_Business_Advisor_Customize::get_instance();