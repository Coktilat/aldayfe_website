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
		$classes[] = 'eltd-search-slides-from-window-top';
		
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
	
	add_action( 'albergo_elated_before_page_header', 'albergo_elated_get_search' );
}

if ( ! function_exists( 'albergo_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function albergo_elated_load_search_template() {
		$search_icon_pack  = albergo_elated_options()->getOptionValue( 'search_icon_pack' );
		$search_in_grid    = albergo_elated_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? true : false;
		$search_icon       = '';
		$search_icon_close = '';
		
		if ( ! empty( $search_icon_pack ) ) {
			$search_icon       .= albergo_elated_icon_collections()->getSearchIcon( $search_icon_pack, true );
			$search_icon_close .= albergo_elated_icon_collections()->getSearchClose( $search_icon_pack, true );
		}
		
		$parameters = array(
			'search_in_grid'    => $search_in_grid,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);

        albergo_elated_get_module_template_part( 'types/slide-from-window-top/templates/slide-from-window-top', 'search', '', $parameters );
	}
}