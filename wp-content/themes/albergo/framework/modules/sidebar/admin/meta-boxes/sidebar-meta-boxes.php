<?php

if ( ! function_exists( 'albergo_elated_map_sidebar_meta' ) ) {
	function albergo_elated_map_sidebar_meta() {
		$eltd_sidebar_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'albergo' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'albergo' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'albergo' ),
				'parent'      => $eltd_sidebar_meta_box,
                'options'       => albergo_elated_get_custom_sidebars_options( true )
			)
		);
		
		$eltd_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $eltd_custom_sidebars ) > 0 ) {
			albergo_elated_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'albergo' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'albergo' ),
					'parent'      => $eltd_sidebar_meta_box,
					'options'     => $eltd_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_sidebar_meta', 31 );
}