<?php

if ( ! function_exists( 'albergo_elated_disable_wpml_css' ) ) {
	function albergo_elated_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'albergo_elated_disable_wpml_css' );
}