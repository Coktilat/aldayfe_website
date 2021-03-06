<?php

if ( ! function_exists( 'albergo_elated_set_show_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to show this header type specific containers/panels for admin options when another header type is selected
	 */
	function albergo_elated_set_show_dep_options_for_top_header( $show_dep_options ) {
		$show_dep_options[] = '#eltd_top_header_container';
		
		return $show_dep_options;
	}
	
	// show top header container for global options
	add_filter( 'albergo_elated_show_dep_options_for_header_box', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_centered', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_divided', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_minimal', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_standard', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_standard_extended', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_tabbed', 'albergo_elated_set_show_dep_options_for_top_header' );
	
	// show top header container for meta boxes
	add_filter( 'albergo_elated_show_dep_options_for_header_box_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_centered_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_divided_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_minimal_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_standard_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_standard_extended_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
	add_filter( 'albergo_elated_show_dep_options_for_header_tabbed_meta_boxes', 'albergo_elated_set_show_dep_options_for_top_header' );
}

if ( ! function_exists( 'albergo_elated_set_hide_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to hide this header type specific containers/panels for admin options when another header type is selected
	 */
	function albergo_elated_set_hide_dep_options_for_top_header( $hide_dep_options ) {
		$hide_dep_options[] = '#eltd_top_header_container';
		
		return $hide_dep_options;
	}
	
	// hide top header container for global options
	add_filter( 'albergo_elated_hide_dep_options_for_header_top_menu', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical_closed', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical_compact', 'albergo_elated_set_hide_dep_options_for_top_header' );
	
	// hide top header container for meta boxes
	add_filter( 'albergo_elated_hide_dep_options_for_header_top_menu_meta_boxes', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical_meta_boxes', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical_closed_meta_boxes', 'albergo_elated_set_hide_dep_options_for_top_header' );
	add_filter( 'albergo_elated_hide_dep_options_for_header_vertical_compact_meta_boxes', 'albergo_elated_set_hide_dep_options_for_top_header' );
}