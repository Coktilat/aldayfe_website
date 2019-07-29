<?php

if ( ! function_exists( 'albergo_elated_map_post_video_meta' ) ) {
	function albergo_elated_map_post_video_meta() {
		$video_post_format_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'albergo' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'albergo' ),
				'description'   => esc_html__( 'Choose video type', 'albergo' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'albergo' ),
					'self'            => esc_html__( 'Self Hosted', 'albergo' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltd_eltd_video_self_hosted_container',
						'self'            => '#eltd_eltd_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltd_eltd_video_embedded_container',
						'self'            => '#eltd_eltd_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltd_video_embedded_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltd_video_embedded_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltd_video_self_hosted_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltd_video_self_hosted_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'albergo' ),
				'description' => esc_html__( 'Enter Video URL', 'albergo' ),
				'parent'      => $eltd_video_embedded_container,
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'albergo' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'albergo' ),
				'parent'      => $eltd_video_self_hosted_container,
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'albergo' ),
				'description' => esc_html__( 'Enter video image', 'albergo' ),
				'parent'      => $eltd_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_video_meta', 22 );
}