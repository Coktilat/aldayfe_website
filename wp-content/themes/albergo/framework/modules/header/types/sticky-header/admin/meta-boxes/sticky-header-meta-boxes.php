<?php

if ( ! function_exists( 'albergo_elated_sticky_header_meta_boxes_options_map' ) ) {
	function albergo_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltd_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'albergo' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'albergo' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);


		$sticky_grid_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_grid_container_meta_container',
				'hidden_property' => 'eltd_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll'
				)
			)
		);

		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_sticky_header_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Sticky Header in Grid', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will put sticky header in grid', 'albergo' ),
				'options'       => albergo_elated_get_yes_no_select_array(),
				'parent'        => $sticky_grid_container,
			)
		);

	}
	
	add_action( 'albergo_elated_additional_header_area_meta_boxes_map', 'albergo_elated_sticky_header_meta_boxes_options_map', 10, 1 );
}