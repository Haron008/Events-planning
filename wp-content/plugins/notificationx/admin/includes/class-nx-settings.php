<?php 
/**
 * This class is responsible for all settings things happening in NotificationX Plugin
 */
class NotificationX_Settings {
    public static $pro_modules;
    public static $free_modules;

    public static function init(){
        add_action( 'notificationx_before_settings_form', array( __CLASS__, 'notice_template' ), 9 );
        add_action( 'notificationx_settings_header', array( __CLASS__, 'header_template' ), 10 );
        add_action( 'wp_ajax_nx_general_settings', array( __CLASS__, 'general_settings_ac' ), 10 );
    }
    /**
     * This function is responsible for settings page notice
     * before the settings form start
     *
     * @hooked notificationx_before_settings_form
     * @return void
     */
    public static function notice_template(){
        ?>
            <div class="nx-settings-notice"></div>
        <?php
    }
    /**
     * This function is responsible for settings page header
     *
     * @hooked notificationx_settings_header
     * @return void
     */
    public static function header_template(){
        global $pagenow;
        $class = '';
        if( ! empty( $pagenow ) ) {
            $class = 'nx-header-for-' . str_replace('.php', '', $pagenow);
        }
        ?>
            <div class="nx-settings-header <?php echo esc_attr( $class ); ?>">
                <div class="nx-header-left">
                    <div class="nx-admin-logo-inline">
                        <svg width="387px" height="392px" viewBox="0 0 387 392" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 51.2 (57519) - http://www.bohemiancoding.com/sketch -->
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="NotificationX_final" transform="translate(-1564.000000, -253.000000)">
                                    <g id="Group" transform="translate(1564.000000, 253.000000)">
                                        <path d="M135.45,358.68 C173.45,358.68 211.27,358.68 249.07,358.68 C247.02,371.83 221.24,388.59 199.26,390.98 C173.92,393.73 143.23,378.38 135.45,358.68 Z" id="Shape" fill="#5614D5" fill-rule="nonzero"></path>
                                        <path d="M372.31,305.79 C369.97,305.59 367.6,305.71 365.24,305.71 C359.63,305.7 354.02,305.71 347.08,305.71 C347.08,301.43 347.08,298.42 347.08,295.41 C347.07,248.75 347.25,202.09 346.91,155.43 C346.83,144.89 345.88,134.19 343.79,123.87 C326.39,37.9 239.94,-16.19 154.81,5.22 C86.84,22.31 37.91,84.26 38.19,154.7 C38.36,197.12 38.21,239.54 38.2,281.96 C38.2,285.8 38.18,297.79 38.16,305.7 C32.98,305.66 18.07,305.57 12.86,305.88 C5.13,306.33 -0.06,312.31 0.04,319.97 C0.14,327.43 5.08,332.74 12.67,333.42 C14.78,333.61 16.91,333.57 19.03,333.57 C134.74,333.61 250.46,333.64 366.17,333.66 C368.29,333.66 370.42,333.69 372.53,333.48 C380.01,332.73 385.14,327.23 385.28,319.95 C385.41,312.58 379.86,306.44 372.31,305.79 Z" id="Shape" fill="#5614D5" fill-rule="nonzero"></path>
                                        <circle id="Oval" fill="#836EFF" fill-rule="nonzero" cx="281.55" cy="255.92" r="15.49"></circle>
                                        <path d="M295.67,140.1 L295.91,139.94 C295.7,138.63 295.52,137.29 295.27,136.02 C285.87,89.57 245.83,55.34 198.79,52.53 C198.73,52.53 198.67,52.52 198.61,52.52 C196.59,52.4 194.57,52.32 192.53,52.32 C192.48,52.32 192.44,52.32 192.39,52.32 C192.34,52.32 192.3,52.32 192.25,52.32 C190.21,52.32 188.18,52.4 186.17,52.52 C186.11,52.52 186.05,52.53 185.99,52.53 C138.95,55.34 98.91,89.57 89.51,136.02 C89.25,137.29 89.07,138.63 88.87,139.94 L89.11,140.1 C88.2,145.6 87.72,151.22 87.74,156.9 C87.76,161.42 87.77,256.77 87.78,269.74 L119.91,304.42 C119.91,280.14 119.9,170.57 119.85,156.78 C119.72,124.18 142.81,94.69 174.76,86.66 C177.41,85.99 180.09,85.5 182.78,85.13 C183.23,85.07 183.67,85 184.13,84.95 C185.15,84.83 186.17,84.74 187.18,84.66 C188.64,84.56 190.1,84.48 191.58,84.47 C191.85,84.47 192.12,84.45 192.39,84.44 C192.66,84.44 192.93,84.46 193.2,84.47 C194.68,84.48 196.14,84.56 197.6,84.66 C198.62,84.74 199.64,84.83 200.65,84.95 C201.1,85 201.55,85.07 202,85.13 C204.69,85.5 207.37,85.99 210.02,86.66 C241.96,94.69 265.06,124.19 264.93,156.78 C264.91,161.95 264.9,207.07 264.89,228.18 L297.03,206.73 C297.03,194.5 297.04,158.28 297.04,156.91 C297.06,151.21 296.59,145.6 295.67,140.1 Z" id="Shape" fill="#836EFF" fill-rule="nonzero"></path>
                                        <path d="M31.94,305.72 C25.58,305.85 19.2,305.51 12.86,305.88 C5.13,306.33 -0.06,312.31 0.04,319.97 C0.14,327.43 5.08,332.74 12.67,333.42 C14.78,333.61 16.91,333.57 19.03,333.57 C134.74,333.61 250.45,333.63 366.17,333.66 C368.29,333.66 370.42,333.69 372.53,333.48 C380.01,332.73 385.14,327.23 385.28,319.95 C385.42,312.58 379.87,306.45 372.32,305.79 C369.98,305.59 367.61,305.71 365.25,305.71 C359.64,305.7 354.03,305.71 347.09,305.71 C347.09,301.43 347.09,298.42 347.09,295.41 C347.08,254.74 347.2,214.07 347.01,173.41 L131.62,317.03 L53.58,232.81 L87.05,202.02 L138.72,257.62 L343.2,121.26 C324.59,36.81 239.08,-15.98 154.82,5.21 C86.85,22.3 37.92,84.25 38.2,154.69 C38.37,197.11 38.22,239.53 38.21,281.95 C38.21,287.84 38.3,293.74 38.16,299.62" id="Shape"></path>
                                        <path d="M346.91,155.42 C346.95,161.41 346.97,167.41 347,173.4 L386.14,147.41 L360.9,109.57 L343.2,121.26 C343.39,122.13 343.62,122.98 343.8,123.85 C345.88,134.18 346.84,144.89 346.91,155.42 Z" id="Shape" fill="#00F9AC" fill-rule="nonzero"></path>
                                        <path d="M87.05,202.03 L53.58,232.82 L131.62,317.04 L347,173.41 C346.97,167.42 346.96,161.42 346.91,155.43 C346.83,144.89 345.88,134.19 343.79,123.87 C343.61,122.99 343.39,122.14 343.19,121.28 L138.72,257.63 L87.05,202.03 Z" id="Shape"></path>
                                        <path d="M87.05,202.03 L53.58,232.82 L131.62,317.04 L347,173.41 C346.97,167.42 346.96,161.42 346.91,155.43 C346.83,144.89 345.88,134.19 343.79,123.87 C343.61,122.99 343.39,122.14 343.19,121.28 L138.72,257.63 L87.05,202.03 Z" id="Shape" fill="#21D8A3" fill-rule="nonzero" opacity="0.9"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h2 class="title"><?php _e( 'NotificationX Settings', 'notificationx' ); ?></h2>
                </div>
                <div class="nx-header-right">
                    <span><?php _e( 'NotificationX', 'notificationx' ); ?>: <strong><?php echo NOTIFICATIONX_VERSION; ?></strong></span>
                    <?php if( defined('NOTIFICATIONX_PRO_VERSION') ) : ?>
                        <span><?php _e( 'NotificationX Pro', 'notificationx' ); ?>: <strong><?php echo NOTIFICATIONX_PRO_VERSION; ?></strong> </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php
    }
    /**
	 * Get all settings fields
	 *
	 * @param array $settings
	 * @return array
	 */
	private static function get_settings_fields( $settings ){
        $new_fields = [];

        foreach( $settings as $setting ) {
            $sections = isset( $setting['sections'] ) ? $setting['sections'] : [];
            if( ! empty( $sections ) ) {
                foreach( $sections as $section ) {
                    $fields = isset( $section['fields'] ) ? $section['fields'] : [];
                    if( ! empty( $fields ) ) {
                        foreach( $fields as $id => $field ) {
                            $new_fields[ $id ] = $field;
                        }
                    }
                }
            }
        }

        return apply_filters( 'notificationx_settings_fields', $new_fields );
	}
	/**
	 * Get the whole settings array
	 *
	 * @return void
	 */
	public static function settings_args(){
        if( ! function_exists( 'notificationx_settings_args' ) ) {
            require NOTIFICATIONX_ADMIN_DIR_PATH . 'includes/nx-settings-page-helper.php';
        }
        do_action( 'nx_before_settings_load' );
        return notificationx_settings_args();
	}
	/**
     * Render the settings page
	 *
     * @return void
	 */
    public static function settings_page(){
        $settings_args = self::settings_args();
        $value = NotificationX_DB::get_settings();
		include_once NOTIFICATIONX_ADMIN_DIR_PATH . 'partials/nx-settings-display.php';
	}
    /**
     * This function is responsible for render settings field
     *
     * @param string $key
     * @param array $field
     * @return void
     */
    public static function render_field( $key = '', $field = [] ) {
        $post_id   = '';
        $name      = $key;
        $id        = NotificationX_Metabox::get_row_id( $key );
        $file_name = isset( $field['type'] ) ? $field['type'] : 'text';
        
        if( 'template' === $file_name ) {
            $default = isset( $field['defaults'] ) ? $field['defaults'] : [];
        } else {
            $default = isset( $field['default'] ) ? $field['default'] : '';
        }

        $saved_value = NotificationX_DB::get_settings( $name );
        if( ! empty( $saved_value ) ) {
            $value = $saved_value;
        } else {
            $value = $default;
        }
        
        $class  = 'nx-settings-field';
        $row_class = NotificationX_Metabox::get_row_class( $file_name );

        $attrs = '';

        if( isset( $field['toggle'] ) && in_array( $file_name, array( 'checkbox', 'select', 'toggle', 'theme' ) ) ) {
            $attrs .= ' data-toggle="' . esc_attr( json_encode( $field['toggle'] ) ) . '"';
        }

        if( isset( $field['hide'] ) && $file_name == 'select' ) {
            $attrs .= ' data-hide="' . esc_attr( json_encode( $field['hide'] ) ) . '"';
        }

        $field_id = $name;

        include NOTIFICATIONX_ADMIN_DIR_PATH . 'partials/nx-field-display.php';
    }
    /**
     * This function is responsible for 
     * save all settings data, including checking the disable field to prevent
     * users manipulation.
     *
     * @param array $values
     * @return void
     */
    public static function save_settings( $posted_fields = [] ){
        $settings_args = self::settings_args();
        $fields = self::get_settings_fields( $settings_args );
        $data = [];

		foreach( $posted_fields as $posted_field ) {
			if( array_key_exists( $posted_field['name'], $fields ) ) {
                if( empty( $posted_field['value'] ) ) {
					$posted_value = isset( $fields[ $posted_field['name'] ]['default'] ) ? $fields[ $posted_field['name'] ]['default'] : '';
                }
                if( isset( $fields[ $posted_field['name'] ]['disable'] ) && $fields[ $posted_field['name'] ]['disable'] === true ) {
                    $posted_value = isset( $fields[ $posted_field['name'] ]['default'] ) ? $fields[ $posted_field['name'] ]['default'] : '';
                }
                $posted_value = NotificationX_Helper::sanitize_field( $fields[ $posted_field['name'] ], $posted_field['value'] );

                // If is module then save it under a domain.
                $is_module = strpos( $posted_field['name'], 'modules_' );
                if( $is_module !== false && $is_module === 0 ) {
                    $data[ 'nx_modules' ][ $posted_field['name'] ] = true;
                } else {
                    $data[ $posted_field['name'] ] = $posted_value;
                }
			}
        }

        $modules = self::get_modules( $settings_args['general']['sections']['modules_sections']['fields'] );

        if( ! NX_CONSTANTS::is_pro() ) {
            $default_modules = $modules[0];
        } else {
            $default_modules = array_merge( $modules[0], $modules[1] );
        }
        
        if( isset( $data['nx_modules'] ) ) {
            $data['nx_modules'] = wp_parse_args( $data['nx_modules'], $default_modules );
        } else {
            $data['nx_modules'] = $default_modules;
        }

		NotificationX_DB::update_settings( $data );
    }
    
    public static function general_settings_ac(){
        /**
         * Verify the Nonce
         */
        if ( ( ! isset( $_POST['nonce'] ) && ! isset( $_POST['key'] ) ) || ! 
            wp_verify_nonce( $_POST['nonce'], 'nx_'. $_POST['key'] .'_nonce' ) ) {
            return;
        }

        if( isset( $_POST['form_data'] ) ) {
            self::save_settings( $_POST['form_data'] );
            echo 'success';
        } else {
            echo 'error';
        }

        die;
    }

    public static function integrations( $sections ){
        $active_modules = NotificationX_DB::get_settings('nx_modules');
        if( ! empty( $sections ) ) {
            $no_active = $modules_id = '';
            foreach( $sections as $section_key => $section ) {
                $modules_id = isset( $active_modules[ $section['modules'] ] ) ? $section['modules'] : $section_key;
                if( isset( $active_modules[ $section['modules'] ] ) && ! $active_modules[ $section['modules'] ] ) {
                    $no_active  = 'hidden';
                }
                $fields = isset( $section['fields'] ) ? $section['fields'] : [];
                ?>
                <div id="api_<?php echo $modules_id; ?>" class="nx-api-integration-settings <?php echo  $section_key . ' ' . $no_active; ?>" data-opec="Only In Pro">
                    <?php 
                        $title = isset( $section['title'] ) ? $section['title'] : '';
                        if( isset( $section['title'] ) ) {
                            $title = $section['title'];
                            if( ! NX_CONSTANTS::is_pro() ) {
                                $title .= '<sup class="nx-pro-label">Pro</sup>';
                            }
                        }
                        echo !empty( $title ) ? '<h3 class="nx-api-integration-header">' . $title . '</h3>' : '';
                        if( ! empty( $fields ) ) {
                            ?>
                            <div class="nx-api-integration-inner">
                                <table>
                                    <tbody>
                                    <?php 
                                        foreach( $fields as $field_key => $field ) :
                                            self::render_field( $field_key, $field );
                                        endforeach;
                                    ?>
                                    </tbody>
                                </table>
                                <?php 
                                    if( isset( $section['has_button'] ) && $section['has_button'] ) : 
                                        $btn_text = isset( $section['button_text'] ) ? $section['button_text'] : __( 'Connect', 'notificationx' );
                                ?>
                                <button data-key="<?php echo $section_key; ?>" data-nonce="<?php echo wp_create_nonce('nx_'. $section_key .'_nonce'); ?>" data-api="<?php echo esc_attr( $section_key ); ?>" class="nx-api-settings-button btn-settings <?php echo esc_attr( $section_key ); ?>"><?php _e( $btn_text, 'notificationx' ); ?></button>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <?php
                $no_active = $modules_id = '';
            }
        }
    }

    public static function get_modules( $modules ) {
        if( ! empty( $modules ) ) {
            foreach( $modules as $module_key => $module ) {
                $is_pro_module = is_array( $module ) && isset( $module['is_pro'] ) ? true : false;
                if( $is_pro_module ) {
                    self::$pro_modules[ $module_key ] = false;
                    if( isset( $module['version'] ) ) {
                        self::$pro_modules[ $module_key ] = $module['version'];
                        if( defined( 'NOTIFICATIONX_PRO_VERSION' ) && version_compare( NOTIFICATIONX_PRO_VERSION, $module['version'], '>=' ) ) {
                            self::$pro_modules[ $module_key ] = false;
                        }
                    }
                } else {
                    self::$free_modules[ $module_key ] = false;
                }
            }
            return array(
                self::$free_modules,
                self::$pro_modules
            );
        }
        return [];
    }

    public static function modules( $modules ){
        self::$free_modules = self::$pro_modules = [];
        if( ! empty( $modules ) ) {
            foreach( $modules as $module_key => $module ) {
                $is_pro_module = is_array( $module ) && isset( $module['is_pro'] ) ? $module['is_pro'] : false;
                self::$free_modules[ $module_key ] = ! $is_pro_module ? true : false;
                if( $is_pro_module ) {
                    self::$pro_modules[ $module_key ] = false;
                }
            }
        }

        $active_modules = NotificationX_DB::get_settings('nx_modules');
        $active_modules = empty( $active_modules ) ? self::$free_modules : $active_modules;
        if( ! NX_CONSTANTS::is_pro() ) {
            $active_modules = array_merge( $active_modules, self::$pro_modules );
        }

        if( ! empty( $modules ) ) {
            echo '<div class="nx-checkbox-area">';
            foreach( $modules as $module_key => $module ) {
                include NOTIFICATIONX_ADMIN_DIR_PATH . 'partials/nx-module-display.php';
            }
            echo '</div>';
        }
    }
}