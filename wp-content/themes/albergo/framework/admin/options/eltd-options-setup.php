<?php

if ( ! function_exists( 'albergo_elated_admin_map_init' ) ) {
	function albergo_elated_admin_map_init() {
		do_action( 'albergo_elated_before_options_map' );
		
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once ELATED_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'albergo_elated_options_map' );
		
		do_action( 'albergo_elated_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'albergo_elated_admin_map_init', 1 );
}