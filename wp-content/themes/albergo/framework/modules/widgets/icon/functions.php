<?php

if ( ! function_exists( 'albergo_elated_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function albergo_elated_register_icon_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_icon_widget' );
}