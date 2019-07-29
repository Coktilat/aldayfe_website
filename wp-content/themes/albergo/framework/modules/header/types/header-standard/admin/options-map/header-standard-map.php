<?php

if ( ! function_exists( 'albergo_elated_get_hide_dep_for_header_standard_options' ) ) {
	function albergo_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'albergo_elated_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'albergo_elated_header_standard_map' ) ) {
	function albergo_elated_header_standard_map( $parent ) {
		$hide_dep_options = albergo_elated_get_hide_dep_for_header_standard_options();
		
		albergo_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'left',
				'label'           => esc_html__( 'Choose Menu Area Position', 'albergo' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'albergo' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'albergo' ),
					'left'   => esc_html__( 'Left', 'albergo' ),
					'center' => esc_html__( 'Center', 'albergo' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'albergo_elated_additional_header_menu_area_options_map', 'albergo_elated_header_standard_map' );
}