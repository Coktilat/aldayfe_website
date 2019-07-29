<?php

if ( ! function_exists( 'albergo_elated_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function albergo_elated_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'albergo' );
		
		return $type;
	}
	
	add_filter( 'albergo_elated_title_type_global_option', 'albergo_elated_set_title_centered_type_for_options' );
	add_filter( 'albergo_elated_title_type_meta_boxes', 'albergo_elated_set_title_centered_type_for_options' );
}