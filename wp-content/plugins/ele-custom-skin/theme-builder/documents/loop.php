<?php
namespace ElementorPro\Modules\ThemeBuilder\Documents;
use ElementorPro\Modules\ThemeBuilder\Documents\Single;
use ElementorPro\Modules\ThemeBuilder\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Loop extends Single {

	public static function get_properties() {
		$properties = parent::get_properties();

		$properties['condition_type'] = 'general';
    $properties['location'] = 'archive';
		//$properties['location'] = 'loop';

		return $properties;
	}

	public function get_name() {
		return 'loop';
	}

	public static function get_title() {
		return __( 'Loop', 'ele-custom-skin' );
	}

/*

Let's be undependable from Preview As options

*/
	public static function get_preview_as_options() {
		$post_types = self::get_public_post_types();//Module::get_public_post_types();

		$post_types['attachment'] = get_post_type_object( 'attachment' )->label;
		$post_types_options = [];

		foreach ( $post_types as $post_type => $label ) {
			$post_types_options[ 'single/' . $post_type ] = get_post_type_object( $post_type )->labels->singular_name;
		}

		return [
			'single' => [
				'label' => __( 'Single', 'elementor-pro' ),
				'options' => $post_types_options,
			],
			'page/404' => __( '404', 'elementor-pro' ),
		];
	}
  
  public static function get_public_post_types(){
    //Array ( [post] => Posts [page] => Pages ) 
    $post_types_options = [];
    $args = array(
    'public'   => true,
    );
    $output = 'objects'; // names or objects
    $post_types = get_post_types( $args, $output );
     foreach ( $post_types  as $post_type ) {
       if ('elementor_library' != $post_type->name) $post_types_options[$post_type->name]= $post_type->label ;
    }
    return $post_types_options;
  }
/*

I want a preview like the template not default

*/
  
 
}
