<?php

if ( ! function_exists( 'albergo_elated_map_post_link_meta' ) ) {
	function albergo_elated_map_post_link_meta() {
		$link_post_format_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'albergo' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'albergo' ),
				'description' => esc_html__( 'Enter link', 'albergo' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_link_meta', 24 );
}