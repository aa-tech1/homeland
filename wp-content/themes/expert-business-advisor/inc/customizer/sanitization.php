<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Expert Business Advisor
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function expert_business_advisor_sanitize_checkbox( $expert_business_advisor_checked ) {
	return ( ( isset( $expert_business_advisor_checked ) && true == $expert_business_advisor_checked ) ? true : false );
}

/* Sanitization Text*/
function expert_business_advisor_sanitize_text( $expert_business_advisor_text ) {
	return wp_filter_post_kses( $expert_business_advisor_text );
}

function expert_business_advisor_sanitize_choices( $expert_business_advisor_input, $expert_business_advisor_setting ) {
    global $wp_customize; 
    $expert_business_advisor_control = $wp_customize->get_control( $expert_business_advisor_setting->id ); 
    if ( array_key_exists( $expert_business_advisor_input, $expert_business_advisor_control->choices ) ) {
        return $expert_business_advisor_input;
    } else {
        return $expert_business_advisor_setting->default;
    }
}

function expert_business_advisor_sanitize_phone_number( $expert_business_advisor_phone ) {
    return preg_replace( '/[^\d+]/', '', $expert_business_advisor_phone );
}

// Sanitization callback function for logo width
function expert_business_advisor_sanitize_logo_width($expert_business_advisor_input) {
    $expert_business_advisor_input = absint($expert_business_advisor_input); // Convert to integer
    // Ensure the value is between 1 and 150
    return ($expert_business_advisor_input >= 1 && $expert_business_advisor_input <= 300) ? $expert_business_advisor_input : 150; // Default to 270 if out of range
}


function expert_business_advisor_sanitize_copyright_position( $expert_business_advisor_input ) {
    $expert_business_advisor_valid = array( 'right', 'left', 'center' );

    if ( in_array( $expert_business_advisor_input, $expert_business_advisor_valid, true ) ) {
        return $expert_business_advisor_input;
    } else {
        return 'right';
    }
}