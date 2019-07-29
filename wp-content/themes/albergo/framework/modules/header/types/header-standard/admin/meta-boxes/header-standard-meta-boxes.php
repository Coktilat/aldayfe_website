<?php

if ( ! function_exists( 'albergo_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function albergo_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'albergo_elated_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'albergo_elated_header_standard_meta_map' ) ) {
	function albergo_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = albergo_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		albergo_elated_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltd_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'albergo' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'albergo' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'albergo' ),
					'left'   => esc_html__( 'Left', 'albergo' ),
					'right'  => esc_html__( 'Right', 'albergo' ),
					'center' => esc_html__( 'Center', 'albergo' )
				),
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'albergo_elated_additional_header_area_meta_boxes_map', 'albergo_elated_header_standard_meta_map' );
}