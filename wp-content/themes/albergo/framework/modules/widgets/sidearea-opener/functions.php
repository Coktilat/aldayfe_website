<?php

if ( ! function_exists( 'albergo_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function albergo_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_sidearea_opener_widget' );
}