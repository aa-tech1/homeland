<?php
function expert_business_advisor_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_site_title_setting' , 
			array(
			'default' => false,
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'expert-business-advisor' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_business_advisor_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'expert_business_advisor_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'expert_business_advisor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'expert_business_advisor_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'expert-business-advisor' ),
			'section'     => 'title_tagline',
			'settings'    => 'expert_business_advisor_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
		'expert_business_advisor_logo_width',
		array(
			'sanitize_callback' => 'expert_business_advisor_sanitize_logo_width',
			'priority'          => 2,
		)
	);

	// Add control for logo width
	$wp_customize->add_control( 
		'expert_business_advisor_logo_width',
		array(
			'label'     => __('Logo Width', 'expert-business-advisor'),
			'section'   => 'title_tagline',
			'type'      => 'number',
			'input_attrs' => array(
				'min'   => 1,
				'max'   => 150,
				'step'  => 1,
			),
			'transport' => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_111',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_111',
            array(
                'priority'      => 200,
                'section'       => 'title_tagline',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_111',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 


	/*=========================================
	Expert Business Advisor Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','expert-business-advisor'),
			'panel'  		=> 'expert_business_advisor_frontpage_sections',
		)
    );

	$wp_customize->register_panel_type( 'Expert_Business_Advisor_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Expert_Business_Advisor_WP_Customize_Section' );

}
add_action( 'customize_register', 'expert_business_advisor_header_settings' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Expert_Business_Advisor_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'expert_business_advisor_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Expert_Business_Advisor_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'expert_business_advisor_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}