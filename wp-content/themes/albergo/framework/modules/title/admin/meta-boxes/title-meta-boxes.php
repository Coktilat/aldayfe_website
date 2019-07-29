<?php

if ( ! function_exists( 'albergo_elated_get_title_types_meta_boxes' ) ) {
	function albergo_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'albergo_elated_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'albergo' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'albergo_elated_map_title_meta' ) ) {
	function albergo_elated_map_title_meta() {
		$title_type_meta_boxes = albergo_elated_get_title_types_meta_boxes();
		
		$title_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'albergo' ),
				'name'  => 'title_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'albergo' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'albergo' ),
				'parent'        => $title_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#eltd_eltd_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#eltd_eltd_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#eltd_eltd_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = albergo_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltd_show_title_area_meta_container',
					'hidden_property' => 'eltd_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'albergo' ),
						'description'   => esc_html__( 'Choose title type', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'albergo' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'albergo' ),
						'options'       => albergo_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'albergo' ),
						'description' => esc_html__( 'Set a height for Title Area', 'albergo' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'albergo' ),
						'description' => esc_html__( 'Choose a background color for title area', 'albergo' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'albergo' ),
						'description' => esc_html__( 'Choose an Image for title area', 'albergo' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'albergo' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'albergo' ),
							'hide'                => esc_html__( 'Hide Image', 'albergo' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'albergo' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'albergo' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'albergo' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'albergo' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'albergo' )
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'albergo' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'albergo' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'albergo' ),
							'window_top'    => esc_html__( 'From Window Top', 'albergo' ),
							'bottom'        => esc_html__( 'Bottom', 'albergo' )
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'albergo' ),
						'options'       => albergo_elated_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'albergo' ),
						'description' => esc_html__( 'Choose a color for title text', 'albergo' ),
						'parent'      => $show_title_area_meta_container
					)
				);

				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_custom_text_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Custom Title Text', 'albergo' ),
						'description'   => esc_html__( 'Enter your custom title text', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);

				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_custom_text_before_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Before Custom Title Text', 'albergo' ),
						'description'   => esc_html__( 'Enter text before custom title', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'albergo' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'albergo' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'albergo' ),
						'options'       => albergo_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'albergo' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'albergo' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'albergo_elated_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_title_meta', 60 );
}