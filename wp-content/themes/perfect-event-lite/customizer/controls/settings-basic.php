<?php
	// Register the radio image control class as a JS control type.
	$wp_customize->register_control_type( 'complete_Control_Radio_Image' );
	
//---------General Color SETTINGS---------------------	

//Fixed Background Image
$wp_customize->add_setting('complete[background_fixed]', array(
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'complete_sanitize_checkbox',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'background_fixed', array(
				'label' => __('Fixed Background Image','complete'),
				'section' => 'general_color_section',
				'settings' => 'complete[background_fixed]',
			)) );

//Site content Text Color
$wp_customize->add_setting( 'complete[primtxt_color_id]', array(
	'type' => 'option',
	'default' => '#7a7a7a',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primtxt_color_id', array(
				'label' => __('Site content Text Color','complete'),
				'section' => 'general_color_section',
				'settings' => 'complete[primtxt_color_id]',
			) ) );

//BASE COLOR

// Link Color
$wp_customize->add_setting( 'complete[global_link_color_id]', array(
	'type' => 'option',
	'default' => '#e00a2c',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_link_color_id', array(
				'label' => __('Default Anchor Color','complete'),
				'section' => 'general_color_section',
				'settings' => 'complete[global_link_color_id]',
			) ) );

//---------------HEADER CALLBACK-------------------//
function complete_transparent_header_callback( $control ) {
    $header_setting = $control->manager->get_setting('complete[head_transparent]')->value();
     
    if ( $header_setting == 1 ) return true;
     
    return false;
}
