<?php

if ( ! function_exists( 'albergo_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function albergo_elated_register_button_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_button_widget' );
}