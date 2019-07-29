<?php

if ( ! function_exists( 'albergo_elated_map_post_quote_meta' ) ) {
	function albergo_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'albergo' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'albergo' ),
				'description' => esc_html__( 'Enter Quote text', 'albergo' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'albergo' ),
				'description' => esc_html__( 'Enter Quote author', 'albergo' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_quote_meta', 25 );
}