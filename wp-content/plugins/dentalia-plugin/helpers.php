<?php

if(!function_exists('orion_hextorgba')) {
    function orion_hextorgba($hex, $alpha = false) {
       $hex = str_replace('#', '', $hex);
       if ( strlen($hex) == 6 ) {
          $rgb['r'] = hexdec(substr($hex, 0, 2));
          $rgb['g'] = hexdec(substr($hex, 2, 2));
          $rgb['b'] = hexdec(substr($hex, 4, 2));
       }
       else if ( strlen($hex) == 3 ) {
          $rgb['r'] = hexdec(str_repeat(substr($hex, 0, 1), 2));
          $rgb['g'] = hexdec(str_repeat(substr($hex, 1, 1), 2));
          $rgb['b'] = hexdec(str_repeat(substr($hex, 2, 1), 2));
       }
       else {
          $rgb['r'] = '0';
          $rgb['g'] = '0';
          $rgb['b'] = '0';
       }
       if ( $alpha ) {
          $rgb['a'] = $alpha;
       } else {
         $rgb['a'] = '1';
       }
       return 'rgba(' . $rgb['r'] .','. $rgb['g'] .','. $rgb['b'].','. $rgb['a']. ')';
    }
}

if(!function_exists('orion_get_option')) {
	/**
	 * get HTML classes from theme options
	 * @param  string $the_orion_option 
	 * @param  bolean $echo 
	 * @param  string $default
	 * @return string
	 */
	function orion_get_option($the_orion_option, $echo = true, $default = false) {

		//global $orion_options;
		$html_class = "";
		//	if the option is NOT saved in the database
		$orion_options = get_option('dentalia');
		if ( !isset($orion_options[$the_orion_option]) || $orion_options[$the_orion_option] == "" ) {
			if ($default) {
				if ($echo) {
					echo esc_attr($default);		
				} else {
					return $default;
				}
			}		
		} else { 
			$html_class .= $orion_options[$the_orion_option];
		}

		if ($echo) {
			echo esc_attr($html_class);		
		} else {
			return $html_class;
		}
	}
}

/************************************************************************
* 	After import
*************************************************************************/
if ( !function_exists( 'orion_import_settings' ) ) {
    function orion_import_settings( $demo_active_import , $demo_directory_path ) {
        reset( $demo_active_import );
        $current_key = key( $demo_active_import );

        /************************************************************************
        * Setting Menus
        *************************************************************************/
        // If it's demo1 - demo6
        $wbc_menu_array = array( 
            'demo-1', 
            // 'demo-2',
        );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
            $main_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' );
            if ( isset( $main_menu->term_id ) ) {
                set_theme_mod( 'nav_menu_locations', array(
                    // 'top-menu' => $top_menu->term_id,
                    'primary' => $main_menu->term_id,
                ));
            }
        }

        /************************************************************************
        * Set HomePage
        *************************************************************************/
        $homepage = get_page_by_title( 'Home' );
        $blog = get_page_by_title( 'Blog' );

        if ( $homepage && $blog) {
            update_option( 'page_on_front', $homepage->ID );
            update_option( 'show_on_front', 'page' );
            update_option( 'page_for_posts', $blog->ID );
        }
        /************************************************************************
        * Import slider(s) for the current demo being imported
        *************************************************************************/
        if ( class_exists( 'RevSlider' ) ) {
            //If it's demo3 or demo5
            $wbc_sliders_array = array(
                'demo-1' => array('dentalia-slider-1.zip','dentalia-slider-2.zip','dentalia-slider-3.zip'),
                // 'demo3' => 'dentalia-slider-1.zip', //Set slider zip name
                // 'Everything' => 'dentalia-slider-1.zip', //Set slider zip name
                // 'themeOptions' => 'dentalia-slider-1.zip', //Set slider zip name
                // 'widgets' => 'dentalia-slider-1.zip', //Set slider zip name
                // 'newDemo' => 'dentalia-slider-1.zip', //Set slider zip name
            );
            if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
               

                if (is_array($wbc_sliders_array[$demo_active_import[$current_key]['directory']])) {
                    foreach ($wbc_sliders_array[$demo_active_import[$current_key]['directory']] as $key => $value) {
                        
                        $wbc_slider_import = $value;
                        if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
                            $slider = new RevSlider();
                            $slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
                        }                        
                    }
                } else {
                    $wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
                    if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
                        $slider = new RevSlider();
                        $slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
                    }
                }
            }
        }  

        /* which demo is imported? */
         get_headers('http://downloads.orionthemes.com/demo-content/stats/demo1.png');
    }            
}
// Uncomment the below
add_action( 'wbc_importer_after_content_import', 'orion_import_settings', 10, 2 );



/* redux newsflash */
class reduxNewsflash {
    public function __construct( $parent, $params ) {
        // let's just leave this empty, to prevent any haresment by the Redux Framework
    }
}