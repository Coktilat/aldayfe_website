<?php

if ( ! function_exists( 'albergo_elated_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function albergo_elated_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'albergo_elated_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'albergo_elated_header_logo_area_meta_options_map' ) ) {
	function albergo_elated_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = albergo_elated_get_hide_dep_for_header_logo_area_meta_boxes();
		
		$logo_area_container = albergo_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		albergo_elated_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'albergo' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'albergo' ),
				'parent'        => $logo_area_container
			)
		);
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'albergo' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'albergo' ),
					'parent'      => $logo_area_container,
					'options'     => $albergo_custom_sidebars
				)
			);
		}
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'albergo' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'albergo' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_logo_area_in_grid_container',
						'no'  => '#eltd_logo_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_logo_area_in_grid_container'
					)
				)
			)
		);
		
		$logo_area_in_grid_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'hidden_property' => 'eltd_logo_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'albergo' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'albergo' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'albergo' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'albergo' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'albergo' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'albergo' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_logo_area_in_grid_border_container',
						'no'  => '#eltd_logo_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_logo_area_in_grid_border_container'
					)
				)
			)
		);
		
		$logo_area_in_grid_border_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'hidden_property' => 'eltd_logo_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'albergo' ),
				'description' => esc_html__( 'Set border color for grid area', 'albergo' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'albergo' ),
				'parent'      => $logo_area_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'albergo' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'albergo' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'albergo' ),
				'description'   => esc_html__( 'Set border on logo area', 'albergo' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_logo_area_border_bottom_color_container',
						'no'  => '#eltd_logo_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_logo_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$logo_area_border_bottom_color_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'hidden_property' => 'eltd_logo_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'albergo' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'albergo' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'albergo_elated_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'albergo_elated_header_logo_area_meta_boxes_map', 'albergo_elated_header_logo_area_meta_options_map', 10, 1 );
}