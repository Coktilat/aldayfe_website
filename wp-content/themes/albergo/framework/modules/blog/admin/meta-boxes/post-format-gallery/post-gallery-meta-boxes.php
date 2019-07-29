<?php

if ( ! function_exists( 'albergo_elated_map_post_gallery_meta' ) ) {
	
	function albergo_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'albergo' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		albergo_elated_add_multiple_images_field(
			array(
				'name'        => 'eltd_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'albergo' ),
				'description' => esc_html__( 'Choose your gallery images', 'albergo' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_gallery_meta', 21 );
}
