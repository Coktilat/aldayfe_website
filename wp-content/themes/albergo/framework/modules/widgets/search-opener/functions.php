<?php

if ( ! function_exists( 'albergo_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function albergo_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_search_opener_widget' );
}