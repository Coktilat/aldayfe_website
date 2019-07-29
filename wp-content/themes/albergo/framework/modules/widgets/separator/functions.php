<?php

if ( ! function_exists( 'albergo_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function albergo_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_separator_widget' );
}