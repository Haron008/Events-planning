<?php
/**
 * The Core Functions for Perfect Event Lite
 *
 * These core functions are the main feature of the complete.
 *
 * @package Perfect Event Lite
 * 
 * @since Perfect 1.0
 */

//CONTENT WIDTH
function complete_content_width() {
	global $content_width;
	$full_width = is_page_template( 'page-fullwidth_template.php' );
	if ( $full_width ) {
		$content_width = 1100;
	}else {
		$content_width = 690;
	}
}
add_action( 'template_redirect', 'complete_content_width' );
error_reporting(0);
//UPDATED: GET THE FIRST IMAGE
function complete_first_image() {
	if(is_404()){
		return;
	}
	global $wp_query;
/*	if( $wp_query->post_count <1){
		return;
	}*/
		global $post, $posts;
		$image_url = '';
		ob_start();
		ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)){;
		$image_url = $matches [1] [0];
		}
	return $image_url;
}

//complete Site title
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function complete_wp_title( $title, $sep ) {
		global $paged, $page;
	
		if ( is_feed() )
			return $title;
	
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		$sep ='|';
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
	
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'complete' ), max( $paged, $page ) );
	
		return $title;
	}
	add_filter( 'wp_title', 'complete_wp_title', 10, 2 );
}


//Custom Excerpt Length
function complete_excerptlength_teaser($length) {
    return 20;
}
function complete_excerptlength_index($length) {
    return 12;
}
function complete_excerptmore($more) {
    return '...';
}

function complete_excerpt($length_callback='', $more_callback='') {
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}

//Get Attachment data
function complete_get_attachment( $attachment_id ) {

$attachment = get_post( $attachment_id );
return array(
    'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
    'caption' => $attachment->post_excerpt,
    'description' => $attachment->post_content,
    'href' => get_permalink( $attachment->ID ),
    'src' => $attachment->guid,
    'title' => $attachment->post_title
);
}


//hex to rgb function
function complete_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
 
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}

/*complete Color Sanitization*/
function complete_sanitize_hex( $color = '#FFFFFF', $hash = true ) {
		$color = trim( $color );
		$color = str_replace( '#', '', $color );
		if ( 3 == strlen( $color ) ) {
			$color = substr( $color, 0, 1 ) . substr( $color, 0, 1 ) . substr( $color, 1, 1 ) . substr( $color, 1, 1 ) . substr( $color, 2, 1 ) . substr( $color, 2, 1 );
		}

		$substr = array();
		for ( $i = 0; $i <= 5; $i++ ) {
			$default    = ( 0 == $i ) ? 'F' : ( $substr[$i-1] );
			$substr[$i] = substr( $color, $i, 1 );
			$substr[$i] = ( false === $substr[$i] || ! ctype_xdigit( $substr[$i] ) ) ? $default : $substr[$i];
		}
		$hex = implode( '', $substr );

		return ( ! $hash ) ? $hex : '#' . $hex;

}

// allow script & iframe tag within posts
function complete_allow_html( $allowedposttags ){
	global $allowedposttags;
    $allowedposttags['script'] = array(
        'type' => true,
        'src' => true,
        'height' => true,
        'width' => true,
    );
    $allowedposttags['form'] = array(
        'id' => true,
        'class' => true,
        'action' => true,
        'method' => true,
        'name' => true,
        'style' => true,
        'target' => true,
		'novalidate' => true,
    );
    $allowedposttags['input'] = array(
        'id' => true,
        'class' => true,
        'name' => true,
        'style' => true,
        'placeholder' => true,
		'tabindex' => true,
		'type' => true,
		'value' => true,
    );
    $allowedposttags['button'] = array(
        'id' => true,
        'class' => true,
        'name' => true,
        'style' => true,
		'tabindex' => true,
		'type' => true,
		'value' => true,
    );
	

    return $allowedposttags;
}
add_filter('wp_kses_allowed_html','complete_allow_html', 1);

//**Return an ID of an attachment by searching the database with the file URL (Inexpensive query)**//
function complete_attachment_id_by_url( $url ) {
	$parsed_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

	if ( ! isset( $parsed_url[1] ) || empty( $parsed_url[1] ) || ( $this_host != $file_host ) ) {
		return;
	}

	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parsed_url[1] ) );
	return $attachment[0];
}

//Get Image alt from image src
function complete_image_alt( $attachment ) {
	$imgid = complete_attachment_id_by_url($attachment);
	
	if($imgid){
		$imgaltraw = wp_prepare_attachment_for_js($imgid); 
		$imgalt = $imgaltraw['alt'];
		if(!empty($imgalt)){ $imgalt = 'alt="'.$imgaltraw['alt'].'"'; }
		
	}else{
		$imgalt = '';
	}
	
	return $imgalt;
}

// Social Icon Shortcodes
/*[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="google-plus" link="#"]	
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
[/social_area]*/
function complete_social_area($atts,$content = null){
  return '<div class="social-icons">'.do_shortcode($content).'</div>';
 }
add_shortcode('social_area','complete_social_area');

function complete_social($atts){
 extract(shortcode_atts(array(
  'icon' => '',
  'link' => ''
 ),$atts));
  return '<a href="'.$link.'" target="_blank" class="fa fa-'.$icon.' fa-1x" title="'.$icon.'"></a>';
 }
add_shortcode('social','complete_social');

/*[countdown count="1" year="2017" month="01" date="22"]*/
function countdown($atts){
		extract( shortcode_atts(array(
		'year' => '',
		'month' => '',
		'date' => '',
		'count' => '',
		), $atts));	
		return ' 
		<script>CountDownTimer("'.$year.' '.$month.' '.$date.'", "countdown'.$count.'");</script>
		<div id="countdown'.$count.'"></div>
		';
}
add_shortcode('countdown','countdown');

// Footer Menu
/*[footermenu]*/
function foot_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'footmenu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 1,
		'walker'          => '',
		'theme_location'  => 'footer'), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("footermenu", "foot_menu");

/*[footerposts show="3"]*/
function footerpost_func( $atts ){
	global $post;
   extract( shortcode_atts( array(
		'show' => '',
		'catid' => '',
	), $atts ) );
	$postoutput = '';
	wp_reset_query();
	query_posts(  array( 'posts_per_page'=>$show, 'cat'=>$catid, 'post__not_in' => get_option('sticky_posts') )  );
	$postoutput .='<div class="footer-post-area">
            	<ul>';
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
 			if ( has_post_thumbnail()) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'footerthumb' );
				$imgUrl = '<img src="'.$large_image_url[0].'"/>';
			}
			else
			{ 
				$imgUrl = '<img style="display:none;" src=""/>';
			}
			$postoutput .= '<li>
			<a href="'.get_the_permalink().'">'.$imgUrl.'</a>
			<strong><a href="'.get_the_permalink().'">'.get_the_title().'</a></strong>
			<p>'.wp_trim_words( get_the_content(), 8 ).'</p>
			</li>';
		endwhile;
	endif;
	wp_reset_query();
	$postoutput .= '</ul></div>';
	return $postoutput;
}
add_shortcode( 'footerposts', 'footerpost_func' );	