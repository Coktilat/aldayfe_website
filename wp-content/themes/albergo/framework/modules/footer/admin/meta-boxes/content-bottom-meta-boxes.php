<?php

if ( ! function_exists( 'albergo_elated_map_content_bottom_meta' ) ) {
	function albergo_elated_map_content_bottom_meta() {
		
		$content_bottom_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'albergo' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'albergo' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'albergo' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#eltd_eltd_show_content_bottom_meta_container',
						'no' => '#eltd_eltd_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#eltd_eltd_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltd_show_content_bottom_meta_container',
				'hidden_property' => 'eltd_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'albergo' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'albergo' ),
				'options'       => albergo_elated_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'albergo' ),
				'options'       => albergo_elated_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltd_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'albergo' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_content_bottom_meta', 71 );
}