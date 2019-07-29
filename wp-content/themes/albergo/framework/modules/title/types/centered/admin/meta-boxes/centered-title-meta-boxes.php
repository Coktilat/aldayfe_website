<?php

if ( ! function_exists( 'albergo_elated_centered_title_type_options_meta_boxes' ) ) {
	function albergo_elated_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'albergo' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'albergo' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'albergo_elated_additional_title_area_meta_boxes', 'albergo_elated_centered_title_type_options_meta_boxes', 5 );
}