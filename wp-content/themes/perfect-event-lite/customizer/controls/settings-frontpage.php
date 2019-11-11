<?php
//----------------------HOME SECTION 1----------------------------------
	$wp_customize->add_setting('page-setting1',array(
			'sanitize_callback'	=> 'complete_sanitize_integer',
			'default' => '0',
			'capability' => 'edit_theme_options',				
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for this section:','complete'),
			'section'	=> 'home_sections1'	
	));

// Section 1 Background Color
	$wp_customize->add_setting( 'complete[section1_bgcolor_id]', array(
		'type' => 'option',
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'section1_bgcolor_id', array(
		'label' => __('Section Background Color','complete'),
		'section' => 'home_sections1',
		'settings' => 'complete[section1_bgcolor_id]',
	) ) );

// Section1 Background Image
	$wp_customize->add_setting( 'complete[section1_bg_image]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'section1_bg_image',array(
			'label'       => __( 'Section Background Image', 'complete' ),
			'section'     => 'home_sections1',
			'settings'    => 'complete[section1_bg_image]'
				)
			)
	);
	
// Section1 Background Video
	$wp_customize->add_setting( 'complete[section1_bg_video]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Text_Control( $wp_customize, 'section1_bg_video',array(
			'label'       => __( 'Section Background Video Url .mp4 Only', 'complete' ),
			'section'     => 'home_sections1',
			'settings'    => 'complete[section1_bg_video]'
				)
			)
	);	
	
// Hide Section
	$wp_customize->add_setting('complete[hide_boxes_section1]',array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'complete_sanitize_checkbox',
			'transport' => 'postMessage',
	));	 

	$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'hide_boxes_section1', array(
		'label' => __('Hide This Section','complete'),
		'section' => 'home_sections1',
		'settings' => 'complete[hide_boxes_section1]',
	)) );	 
//----------------------HOME SECTION 1----------------------------------

//----------------------FRONT CONTENT SECTION----------------------------------
	$ImageUrl1 = esc_url(get_template_directory_uri() ."/images/slides/slider1.jpg");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/slides/slider2.jpg");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/slides/slider3.jpg");
//----------------------SLIDER TYPE SECTION----------------------------------

	// Slide 1 Start
	$wp_customize->add_setting( 'complete[slide_image1]',array( 
		'type' => 'option',
		'default' => $ImageUrl1,
		'sanitize_callback' => 'esc_url_raw',
		)
	);	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slide_image1',array(
			'label'       => __( 'Slide Image 1', 'complete' ),
			'section'     => 'slider_section',
			'settings'    => 'complete[slide_image1]',
				)
			)
	);
	
	$wp_customize->add_setting('complete[slide_title1]', array(
		'type' => 'option',
		'default'	=> __('startup business Event','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_title1', array( 
		'type' => 'text',
		'label'	=> __('Slide Title 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_title1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_desc1]', array(
		'type' => 'option',
		'default'	=> __('Donec finibus turpis non risus molestie, quis egestas augue porttitor [countdown count="1" year="2019" month="01" date="01"]','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'slide_desc1', array( 
		'type' => 'textarea',
		'label'	=> __('Slide Description 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_desc1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_link1]', array(
		'type' => 'option',
		'default'	=> __('#link1','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_link1', array( 
		'type' => 'text',
		'label'	=> __('Slide Link 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_link1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_btn1]', array(
		'type' => 'option',
		'default'	=> __('READ MORE','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_btn1', array( 
		'type' => 'text',
		'label'	=> __('Slide Button 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_btn1]',
	)) );	
	// Slide 1 End

//---------------SLIDER CALLBACK-------------------//
function complete_slider_static( $control ) {
    $layout_setting = $control->manager->get_setting('complete[slider_type_id]')->value();
     
    if ( $layout_setting == 'static' ) return true;
     
    return false;
}
function complete_slider_nivoacc( $control ) {
    $layout_setting = $control->manager->get_setting('complete[slider_type_id]')->value();
     
    if ( $layout_setting == 'accordion' || $layout_setting == 'nivo' ) return true;
     
    return false;
}