<?php

if ( ! function_exists( 'albergo_elated_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function albergo_elated_search_body_class( $classes ) {
		$classes[] = 'eltd-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_search_body_class' );
}

if ( ! function_exists( 'albergo_elated_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function albergo_elated_get_search() {
		albergo_elated_load_search_template();
	}
	
	add_action( 'albergo_elated_before_page_header_html_close', 'albergo_elated_get_search' );
	add_action( 'albergo_elated_before_mobile_header_html_close', 'albergo_elated_get_search' );
}

if ( ! function_exists( 'albergo_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function albergo_elated_load_search_template() {
        albergo_elated_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search' );
	}
}