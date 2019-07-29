<?php

if ( ! function_exists( 'albergo_elated_map_footer_meta' ) ) {
	function albergo_elated_map_footer_meta() {
		
		$footer_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'albergo' ),
				'name'  => 'footer_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'albergo' ),
				'parent'        => $footer_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'albergo' ),
				'parent'        => $footer_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array()
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'albergo' ),
				'parent'        => $footer_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_footer_meta', 70 );
}