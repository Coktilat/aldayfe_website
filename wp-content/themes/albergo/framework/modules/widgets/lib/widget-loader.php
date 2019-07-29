<?php

if ( ! function_exists( 'albergo_elated_register_widgets' ) ) {
	function albergo_elated_register_widgets() {
		$widgets = apply_filters( 'albergo_elated_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'albergo_elated_register_widgets' );
}