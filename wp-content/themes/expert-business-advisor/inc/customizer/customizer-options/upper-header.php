<?php
function expert_business_advisor_upper_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	top header
	=========================================*/
	$wp_customize->add_section(
        'expert_business_advisor_topbar',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Informations','expert-business-advisor'),
			'panel'  		=> 'expert_business_advisor_frontpage_sections',
		)
    );

	$wp_customize->add_setting(
		'expert_business_advisor_call',
		array(
			'sanitize_callback'	=> 'expert_business_advisor_sanitize_phone_number'
		)
	);

	$wp_customize->add_control(
		'expert_business_advisor_call',array(
			'label'	=> __('Add Phone Number','expert-business-advisor'),
			'section'=> 'expert_business_advisor_topbar',
			'type'=> 'text'
		)
	);

	
	$wp_customize->add_setting( 'expert_business_advisor_upgrade_page_settings_201',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Expert_Business_Advisor_Control_Upgrade(
        $wp_customize, 'expert_business_advisor_upgrade_page_settings_201',
            array(
                'priority'      => 200,
                'section'       => 'expert_business_advisor_topbar',
                'settings'      => 'expert_business_advisor_upgrade_page_settings_201',
                'label'         => __( 'Expert Business Advisor Pro comes with additional features.', 'expert-business-advisor' ),
                'choices'       => array( __( '12+ Sections', 'expert-business-advisor' ), __( 'One Click Demo Importer', 'expert-business-advisor' ), __( 'Section Reordering Facility', 'expert-business-advisor' ),__( 'Advance Typography', 'expert-business-advisor' ),__( 'Easy Customization', 'expert-business-advisor' ),__( '24x7 Support', 'expert-business-advisor' ), )
            )
        )
    ); 

}
add_action( 'customize_register', 'expert_business_advisor_upper_header_settings' );