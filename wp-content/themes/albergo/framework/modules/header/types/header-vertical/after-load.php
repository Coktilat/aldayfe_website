<?php

if ( ! function_exists( 'albergo_elated_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function albergo_elated_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( albergo_elated_check_is_header_type_enabled( 'header-vertical', albergo_elated_get_page_id() ) ) {
		add_filter( 'albergo_elated_allow_sticky_header_behavior', 'albergo_elated_disable_behaviors_for_header_vertical' );
		add_filter( 'albergo_elated_allow_content_boxed_layout', 'albergo_elated_disable_behaviors_for_header_vertical' );
	}
}