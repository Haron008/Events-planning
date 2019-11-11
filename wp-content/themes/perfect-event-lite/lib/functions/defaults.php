<?php
function complete_option_defaults() {
	$defaults = array(
		'converted' => '',
		'site_layout_id' => 'site_full',
		'single_post_layout_id' => 'single_layout1',
		'header_layout_id' => 'header_layout1',
		'center_width' => 83.50,
		'content_bg_color' => '#ffffff',
		'divider_icon' => 'fa-stop',
		'head_transparent' => '1',
		'trans_header_color' => '#ffffff',
		'totop_id' => '1',
		'footer_text_id' => __('<div class="left">© Copyright 2016. All Rights Reserved</div> <div class="right">SKT Perfect Event Lite</div><div class="clear"></div>', 'complete'),
		'phntp_text_id' => __('<i class="fa fa-phone"></i> 12 8888 6666', 'complete'),
		'emltp_text' => __('<a href="mailto:info@sitename.com"><i class="fa fa-envelope"></i>info@sitename.com </a>', 'complete'),
		'sintp_text' => __('', 'complete'),
		'suptp_text' => __('[social_area]
	[social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="google-plus" link="#"]
    [social icon="linkedin" link="#"]
[/social_area]', 'complete'),
		'footmenu_id' => '1',
		'copyright_center' => '',
		
		'custom_slider' => '',
		
		'slider_type_id' => 'static',
		
		'slideefect' => 'fade',
		'slideanim' => '500',
		'slidepause' => '4000',
		'slidenav' => 'true',
		'slidepage' => 'true',
		
		'n_slide_time_id' => '6000',
		'slide_height' => '500px',
		'slidefont_size_id' => '36px',
		'slider_txt_hide' => '',

		'post_info_id' => '1',
		'post_nextprev_id' => '1',
		'post_comments_id' => '1',
		'page_header_color' => '#545556',
		'pageheader_bg_image' => '',
		'hide_pageheader' => '',
		'page_header_txtcolor' => '#555555',
		
		'post_header_color' => '#545556',
		'postheader_bg_image' => '',
		'hide_postheader' => '',		

		'blog_cat_id' => '',
		'blog_num_id' => '9',
		'blog_layout_id' => '',
		'show_blog_thumb' => '1',
		
		'sec_color_id' => '#e00a2c',
		'mnbg_color_id' => '#e00a2c',
		'submnu_textcolor_id' => '#000000',
		'submnbg_color_id' => '#ffffff',
		'mnshvr_color_id' => '#e00a2c',
		'mobbg_color_id' => '#383939',
		'mobbgtop_color_id' => '#e00a2c',
		'mobmenutxt_color_id' => '#FFFFFF',
		
		'mobtoggle_color_id' => '#000000',
		'mobtoggleinner_color_id' => '#FFFFFF',
		
		'sectxt_color_id' => '#FFFFFF',
		'content_font_id' =>  array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'primtxt_color_id' => '#7a7a7a',
		'logo_image_id' => array(  'url'=>''),
		'logo_font_id' => array('font-family' => 'Montserrat', 'font-size' => '30px'),
		'logo_color_id' => '#ffffff',
		'logo_first_color_id' => '#e00a2c',
		
		'logo_image_height' => '46px;',
		'logo_image_width' => '106px;',
		'logo_margin_top' => '14px;',
		
		'tpbt_font_id' => array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'tpbt_color_id' => '#ffffff',
		'tpbt_hvcolor_id' => '#edecec',	
		
		'sldtitle_font_id' => array('font-family' => 'Montserrat', 'font-size' => '50px'),
		'slddesc_font_id' => array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'sldbtn_font_id' => array('font-family' => 'Montserrat', 'font-size' => '13px'),
		
		'slidetitle_color_id' => '#ffffff',	
		'slddesc_color_id' => '#ffffff',	
		'sldbtntext_color_id' => '#ffffff',
		'sldbtn_color_id' => '#e00a2c',
		'sldbtn_hvcolor_id' => '#ff8800',	
		
		'slide_pager_color_id' => '#ffffff',	
		'slide_active_pager_color_id' => '#e00a2c',	
		
			
		'global_link_color_id' => '#e00a2c',
		'global_link_hvcolor_id' => '#ff8800',		
		
		'global_h1_color_id' => '#282828',
		'global_h1_hvcolor_id' => '#e00a2c',	
		'global_h2_color_id' => '#282828',
		'global_h2_hvcolor_id' => '#e00a2c',
		'global_h3_color_id' => '#282828',
		'global_h3_hvcolor_id' => '#e00a2c',
		'global_h4_color_id' => '#282828',
		'global_h4_hvcolor_id' => '#e00a2c',
		'global_h5_color_id' => '#282828',
		'global_h5_hvcolor_id' => '#e00a2c',
		'global_h6_color_id' => '#282828',
		'global_h6_hvcolor_id' => '#e00a2c',	
		
		'post_meta_color_id' => '#282828',
		
		'event_box_bd_color' => '#ffffff',
		'event_box_text_color' => '#ffffff',
		
		'event_box_color_id' => '#f8f8f8',
		'eventdes_box_color_id' => '#7a7a7a',
		'eventtitlebd_color' => '#555555',
		'eventdate_color' => '#e00a2c',
		
		'team_box_color_id' => '#f7f7f7',
		
		'social_text_color_id' => '#ffffff',
		'social_hover_text_color_id' => '#e00a2c',
		'social_icon_color_id' => '#545556',
		'social_hover_icon_color_id' => '#ffffff',
		'testimonialbox_color_id' => '#f9f8f8',		
		'testimonialbox_txt_color' => '#000000',
		'testimonial_pager_color_id' => '#000000',
		'testimonial_activepager_color_id' => '#e00a2c',
		'gallery_filter_color_id' => '#e00a2c',
		'gallery_filtertxt_color_id' => '#000000',
		'gallery_activefiltertxt_color_id' => '#ffffff',
		'skillsbar_bgcolor_id' => '#f8f8f8',
		'skillsbar_text_color_id' => '#ffffff',								
		'global_h1_font_id' => array('font-family' => 'Montserrat', 'font-size' => '30px'),
		'global_h2_font_id' => array('font-family' => 'Montserrat', 'font-size' => '25px'),
		'global_h3_font_id' => array('font-family' => 'Montserrat', 'font-size' => '22px'),
		'global_h4_font_id' => array('font-family' => 'Montserrat', 'font-size' => '20px'),
		'global_h5_font_id' => array('font-family' => 'Montserrat', 'font-size' => '18px'),
		'global_h6_font_id' => array('font-family' => 'Montserrat', 'font-size' => '16px'),
		
		'contact_title' => 'Contact Info',
		'contact_address' => 'Donec ultricies mattis nulla Australia',
		'contact_phone' => '0789 256 321',
		'contact_email' => 'info@companyname.com',
		'contact_company_url' => 'http://demo.com',
		'contact_google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336003.6066860609!2d2.349634820486094!3d48.8576730786213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x040b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1433482358672',
		
		'head_bg_trans' => '0',
		'head_color_id' => '#0b1f37',
		'head_info_color_id' => '#0b1f37',
		'head_bd_color_id' => '#253242',
		'header_border_color' => '#dddddd',
		'menutxt_color_id' => '#fbfcfd',
		'menutxt_color_hover' => '#fbfcfd',
		'menutxt_color_active' => '#fbfcfd',
		'menu_size_id' => '13px',
		'sidebar_color_id' => '#FFFFFF',
		'sidebarborder_color_id' => '#eeeff5',
		'sidebar_tt_color_id' => '#666666',
		'sidebartxt_color_id' => '#999999',
		'sidebarlink_color_id' => '#1c1c1c',
		'sidebarlink_hover_color_id' => '#e00a2c',
		'flipbg_front_color_id' => '#ffffff',
		'flipbg_back_color_id' => '#f7f7f7',
		'flipborder_front_color_id' => '#e0e0e0',
		'flipborder_back_color_id' => '#000000',
		'divider_color_id' => '#8c8b8b',
		'wgttitle_size_id' => '16px',
		'timebox_color_id' => '#ffffff',
		'timeboxborder_color_id' => '#dedede',
		'gridbox_color_id' => '#ffffff',
		'gridboxborder_color_id' => '#cccccc',
		
		'service_box_bg' => '#0a7ad8',
		'service_box_bg_hover' => '#ff8800',
		'box_color_text' => '#ffffff',
		'go_bg_color' => '#ffffff',
		'box_right_border' => '#30a0fd',
		
		'expand_bg_color' => '#e00a2c',
		'expand_text_color' => '#000000',
		
		'h_seprator_color' => '#00baff',
		'h_seprator_text_color' => '#000000',
		
		'square_bg_color' => '#ffffff',
		'square_bg_hover_color' => '#79ab9f',
		'square_title_color' => '#000000',
		
		'style3_bg_color' => '#ffffff',
		'style3_hover_bg_color' => '#9f9f9f',
		'style3_border_color' => '#eaeaea',
		
		'perfect_bg_color' => '#ffffff',
		'perfect_border_color' => '#eaeaea',
		'perfect_hover_border_color' => '#e00a2c',
 
		'foot_layout_id' => '3',
		'footer_color_id' => '#0b1f37',
		'footwdgtxt_color_id' => '#808a96',
		'footer_title_color' => '#ffffff',
		'footer_title_bd_color' => '#e00a2c',
		'ptitle_font_id' =>  array('font-family' => 'Lato', 'subsets'=>'latin'),
		'mnutitle_font_id' =>  array('font-family' => 'Montserrat', 'subsets'=>'latin'),
		'title_txt_color_id' => '#666666',
		'link_color_id' => '#3590ea',
		'link_color_hover' => '#1e73be',
		'txt_upcase_id' => '',
		'mnutxt_upcase_id' => '1',
		'copyright_bg_color' => '#0b1f37',
		'copyright_txt_color' => '#808a96',
		
		//Footer Info Box
		'footer_info_bgcolor' => '#24364c',
		'footer_info_iconcolor' => '#ffffff',
		'footer_info_titlecolor' => '#ffffff',
		'footer_info_desccolor' => '#ffffff',
		'footer_info_dividercolor' => '#505e70',		
		
		//Featured Box
		'featured_section_title' => __('Featured Boxes', 'complete'),
		'homeblock_bg_setting' => '',
		'ftd_bg_video' => '',
		'homeblock_title_color' => '#000000',
		'homeblock_color_id' => '#f2f2f2',
		'featured_image_height' => '70px;',
		'featured_image_width' => '70px;',
		'featured_excerpt' => '35',
		'featured_block_bg' => '#ffffff',
		'featured_block_button' => __('Read More', 'complete'),
		'recentpost_block_button' => __('Read More', 'complete'),
		
		'featured_block_button_bg' => '#383939',
		'featured_block_hover_button_bg' => '#e00a2c',
		
		'page-setting1_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon1.png'),
		'page-setting2_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon2.png'),
		'page-setting3_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon3.png'),
		'page-setting4_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon4.png'),
		
		'page-setting1' => '0',
		'page-setting2' => '0',
		'page-setting3' => '0',
		'page-setting4' => '0',
		'page-setting5' => '0',
		'page-setting6' => '0',
		'page-setting7' => '0',
		'page-setting8' => '0',
		'page-setting9' => '0',
		'page-setting10' => '0',
		'page-setting11' => '0',
		'page-setting12' => '0',
		'page-setting13' => '0',
		'page-setting14' => '0',
		'page-setting15' => '0',
		'page-setting16' => '0',
		'page-setting17' => '0',
		'hide_boxes' => '',
		
		//Home Section1
		'section1_bgcolor_id' => '#ffffff',
		'section1_bg_image' => '',
		'section1_bg_video' => '',
		'hide_boxes_section1' => '',
		//Home Section1
		
		//Home Section2
		'section2_bgcolor_id' => '#f8f8f8',
		'section2_bg_image' => '',
		'section2_bg_video' => '',
		'hide_boxes_section2' => '',
		//Home Section2	
		
		//Home Section3
		'section3_bgcolor_id' => '#ffffff',
		'section3_bg_image' => '',
		'section3_bg_video' => '',
		'hide_boxes_section3' => '',
		//Home Section3	
		
		//Home Section4
		'section4_bgcolor_id' => '',
		'section4_bg_image' => ''.get_template_directory_uri().'/images/features-bg.jpg',
		'section4_bg_video' => '',
		'hide_boxes_section4' => '1',
		//Home Section4		
		
		//Home Section5
		'section5_bgcolor_id' => '#ffffff',
		'section5_bg_image' => '',
		'section5_bg_video' => '',
		'hide_boxes_section5' => '1',
		//Home Section5		
		
		//Home Section6
		'section6_bgcolor_id' => '#f6f6f6',
		'section6_bg_image' => '',
		'section5_bg_video' => '',
		'hide_boxes_section6' => '1',
		//Home Section6	
		
		//Home Section7
		'section7_bgcolor_id' => '',
		'section7_bg_image' => ''.get_template_directory_uri().'/images/section-7-bg.jpg',
		'section7_bg_video' => '',
		'hide_boxes_section7' => '1',
		//Home Section7		
		
		//Home Section8
		'section8_bgcolor_id' => '#ff8800',
		'section8_bg_image' => '',
		'section8_bg_video' => '',
		'hide_boxes_section8' => '1',
		//Home Section8		
		
		//Home Section9
		'section9_bgcolor_id' => '#f6f6f6',
		'section9_bg_image' => '',
		'section9_bg_video' => '',
		'hide_boxes_section9' => '1',
		//Home Section9	
		
		//Home Section10
		'section10_bgcolor_id' => '',
		'section10_bg_image' => ''.get_template_directory_uri().'/images/section-10-bg.jpg',
		'section10_bg_video' => '',
		'hide_boxes_section10' => '1',
		//Home Section10
		
		//Home Section11
		'section11_bgcolor_id' => '#f6f6f6',
		'section11_bg_image' => '',
		'section11_bg_video' => '',
		'hide_boxes_section11' => '1',
		//Home Section11	
		
		//Home Section12
		'section12_bgcolor_id' => '',
		'section12_bg_image' => ''.get_template_directory_uri().'/images/section-12-bg.jpg',
		'section12_bg_video' => '',
		'hide_boxes_section12' => '1',
		//Home Section12
		
		//Home Section13
		'section13_bgcolor_id' => '#ffffff',
		'section13_bg_image' => '',
		'section13_bg_video' => '',
		'hide_boxes_section13' => '1',
		//Home Section13
		
		//Home Section14
		'section14_bgcolor_id' => '',
		'section14_bg_image' => ''.get_template_directory_uri().'/images/section-14-bg.jpg',
		'section14_bg_video' => '',
		'hide_boxes_section14' => '1',
		//Home Section14
		
		//Home Section15
		'section15_bgcolor_id' => '#f6f6f6',
		'section15_bg_image' => '',
		'section15_bg_video' => '',
		'hide_boxes_section15' => '1',
		//Home Section15
		
		//Home Section16
		'section16_bgcolor_id' => '#ffffff',
		'section16_bg_image' => '',
		'section16_bg_video' => '',
		'hide_boxes_section16' => '1',
		//Home Section16
		
		//Home Section17
		'section17_bgcolor_id' => '#ffffff',
		'section17_bg_image' => '',
		'section17_bg_video' => '',
		'hide_boxes_section17' => '1',
		//Home Section17												
		
		
		//Footer Column 1
		'foot_cols1_title' => __('ABOUT US', 'complete'),
		'foot_cols1_content' => '<p>Vivamus mollis diam arcu, ut gravida mi vulputate vel. Proin at placerat eros. Suspendisse potenti. Donec malesuada mauris luctus magna fermentum auctor. Aliquam sit amet tortor at risus sollicitudin mollis et at lectus. Etiam non erat suscipit nisi bibendum elementum. Etiam felis sem, mollis eu leo vitae, malesuada elementum nibh. Nulla sodales leo odio, a ullamcorper urna hendrerit non.</p>',
		//Footer Column 1	
		
		//Footer Column 2
		'foot_cols2_title' => __('USEFUL LINKS', 'complete'),
		'foot_cols2_content' => '[footermenu]',
		//Footer Column 2	
		
		//Footer Column 3
		'foot_cols3_title' => __('LATEST POSTS', 'complete'),
		'foot_cols3_content' => '[footerposts catid="" show="2"]',
		//Footer Column 3
		
		//Footer Column 4
		'foot_cols4_title' => __('CONNECT WITH US', 'complete'),
		'foot_cols4_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="google-plus" link="#"]	
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
[/social_area]',
		//Footer Column 4																
		'social_button_style' => 'simple',
		'social_show_color' => '',
		'social_bookmark_pos' => 'footer',
		'social_bookmark_size' => 'normal',
		'social_single_id' => '1',
		'social_page_id' => '',
		
		//Footer Info Box 1
		'foot_infobox1_heading' => __('', 'complete'),
		'foot_infobox1_icon' => '<i class="fa fa-map-marker" aria-hidden="true"></i>',
		'foot_infobox1_description' => '3604 Bel Meadow Drive, Riverside, California 92507',
		
		//Footer Info Box 2
		'foot_infobox2_heading' => __('', 'complete'),
		'foot_infobox2_icon' => '<i class="fa fa-clock-o" aria-hidden="true"></i>',
		'foot_infobox2_description' => 'Mon - Fri: 10.00AM to 7.00PM <br />Sat - Sun: 12.00AM to 4.00PM',
		
		//Footer Info Box 3
		'foot_infobox3_heading' => __('', 'complete'),
		'foot_infobox3_icon' => '<i class="fa fa-envelope-o" aria-hidden="true"></i>',
		'foot_infobox3_description' => 'registration@event.com <br /> info@event.com',
		
		'hide_foot_infobox' => '',
		
		'post_lightbox_id' => '1',
		'post_gallery_id' => '1',
		'cat_layout_id' => '4',
		'hide_mob_slide' => '',
		'hide_mob_rightsdbr' => '',
		'hide_mob_page_header' => '1',
		'custom-css' => '',
	);
	
      $options = get_option('complete',$defaults);

      //Parse defaults again - see comments
      $options = wp_parse_args( $options, $defaults );

	return $options;
}?>