<?php

/*
define widget folder
 */
function orion_plugin_add_so_widgets($folders){

 	$widget_dir = dirname( __FILE__ ) . '/so-widgets/';
	if ( file_exists( $widget_dir ) && is_dir($widget_dir) && function_exists('orion_theme_add_so_widgets') ) {
		$folders[] = $widget_dir;
	}
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'orion_plugin_add_so_widgets');