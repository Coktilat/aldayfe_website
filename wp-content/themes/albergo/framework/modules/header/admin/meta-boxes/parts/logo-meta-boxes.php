<?php

if ( ! function_exists( 'albergo_elated_logo_meta_box_map' ) ) {
	function albergo_elated_logo_meta_box_map() {
		
		$logo_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'albergo' ),
				'name'  => 'logo_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'albergo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'albergo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'albergo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'albergo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'albergo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'albergo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'albergo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'albergo' ),
				'parent'      => $logo_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'albergo' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'albergo' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_logo_meta_box_map', 47 );
}