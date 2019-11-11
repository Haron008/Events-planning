<?php
/**
 * The MAIN FUNCTIONS FILE for Perfect Event Lite
 *
 * Stores all the Function of the template.
 *
 * @package Perfect Event Lite
 * 
 * @since SKT Perfect Event Lite 1.0
 */

//**************Complete Golbal******************//
/*CHECK IF Complete row exist in the wp_options table. Needed for Redux Conversion process*/ 
$completedb = get_option( 'complete' );

//**************Complete SETUP******************//
function Complete_setup() {
	//add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );			//WP 4.1 Site Title
	add_theme_support( 'woocommerce' );			//Woocommerce Support
	add_theme_support('automatic-feed-links');	//RSS FEED LINK
	add_theme_support( 'post-thumbnails' );		//Post Thumbnail
	//Custom Background	
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff') );	
	//Make theme available for translation
	load_theme_textdomain('complete', get_template_directory() . '/languages/');  
	//Custom Thumbnail Size	
	add_image_size( 'complete_thumb', 400, 270, true ); /*(cropped)*/
	add_image_size( 'footerthumb', 50, 42, true ); 
   
	//Register Menus
	register_nav_menus( array(
			'primary' => __( 'Header Navigation', 'complete' ),
			'footer' => __( 'Footer Navigation', 'complete' ),
		) );
	}
add_action( 'after_setup_theme', 'Complete_setup' );

//**************Complete FUNCTIONS******************//
require(get_template_directory() . '/sktframe/core-functions.php');			//Include Complete sktframe Core Functions 
require(get_template_directory() . '/lib/functions/core.php');					//Include Core Functions
require(get_template_directory() . '/lib/functions/enqueue.php');					//Include Enqueue CSS/JS Scripts
require(get_template_directory() . '/lib/functions/admin.php');				//Include Admin Functions (admin)
require(get_template_directory() . '/lib/functions/woocommerce.php');			//Include Woocommerce Functions
require(get_template_directory() . '/lib/functions/defaults.php');
require(get_template_directory() . '/customizer/customizer.php');
require(get_template_directory() . '/lib/functions/converter.php');
require(get_template_directory() . '/lib/includes/google_fonts.php');

//WIDGETS
require(get_template_directory() . '/sktframe/core-posts.php');		
require(get_template_directory() . '/sktframe/core-pagination.php');

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

define('SKT_THEME_DOC', 'http://sktthemesdemo.net/documentation/perfect-documentation');
define('SKT_URL','https://www.sktthemes.org');
define('SKT_PRO_THEME_URL','https://www.sktthemes.org/shop/commercial-wordpress-theme/');
define('SKT_LIVE_DEMO','http://sktperfectdemo.com/demos/event/');
define('SKT_THEMES','https://www.sktthemes.org/themes/');

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';