<?php

if ( ! function_exists( 'albergo_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function albergo_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_custom_font_widget' );
}