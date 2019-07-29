<?php

if ( ! function_exists( 'albergo_elated_register_raw_html_widget' ) ) {
	/**
	 * Function that register raw html widget
	 */
	function albergo_elated_register_raw_html_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedRawHTMLWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_raw_html_widget' );
}