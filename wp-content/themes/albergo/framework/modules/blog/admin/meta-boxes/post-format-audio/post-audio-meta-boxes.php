<?php

if ( ! function_exists( 'albergo_elated_map_post_audio_meta' ) ) {
	function albergo_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'albergo' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'albergo' ),
				'description'   => esc_html__( 'Choose audio type', 'albergo' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'albergo' ),
					'self'            => esc_html__( 'Self Hosted', 'albergo' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltd_eltd_audio_self_hosted_container',
						'self'            => '#eltd_eltd_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltd_eltd_audio_embedded_container',
						'self'            => '#eltd_eltd_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltd_audio_embedded_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltd_audio_embedded_container',
				'hidden_property' => 'eltd_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltd_audio_self_hosted_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltd_audio_self_hosted_container',
				'hidden_property' => 'eltd_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'albergo' ),
				'description' => esc_html__( 'Enter audio URL', 'albergo' ),
				'parent'      => $eltd_audio_embedded_container,
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'albergo' ),
				'description' => esc_html__( 'Enter audio link', 'albergo' ),
				'parent'      => $eltd_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_audio_meta', 23 );
}