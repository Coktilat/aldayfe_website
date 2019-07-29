<?php

if ( ! function_exists( 'albergo_elated_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function albergo_elated_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'albergo' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'albergo' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'albergo_elated_additional_title_area_meta_boxes', 'albergo_elated_breadcrumbs_title_type_options_meta_boxes' );
}