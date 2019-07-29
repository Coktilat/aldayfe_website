<?php

if ( ! function_exists( 'albergo_elated_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function albergo_elated_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'albergo_elated_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'albergo_elated_header_menu_area_meta_options_map' ) ) {
	function albergo_elated_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = albergo_elated_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = albergo_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		albergo_elated_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'albergo' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'albergo' ),
				'parent'        => $menu_area_container
			)
		);
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'albergo' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'albergo' ),
					'parent'      => $menu_area_container,
					'options'     => $albergo_custom_sidebars
				)
			);
		}
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'albergo' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'albergo' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_in_grid_container',
						'no'  => '#eltd_menu_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_in_grid_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltd_menu_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'albergo' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'albergo' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'albergo' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'albergo' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'albergo' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'albergo' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array()
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'albergo' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'albergo' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_in_grid_border_container',
						'no'  => '#eltd_menu_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_in_grid_border_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_border_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'hidden_property' => 'eltd_menu_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'albergo' ),
				'description' => esc_html__( 'Set border color for grid area', 'albergo' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'albergo' ),
				'parent'      => $menu_area_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'albergo' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'albergo' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'albergo' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'albergo' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array()
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'albergo' ),
				'description'   => esc_html__( 'Set border on menu area', 'albergo' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_border_bottom_color_container',
						'no'  => '#eltd_menu_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$menu_area_border_bottom_color_container = albergo_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltd_menu_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'albergo' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'albergo' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'eltd_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'albergo' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'albergo' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'albergo_elated_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'albergo_elated_header_menu_area_meta_boxes_map', 'albergo_elated_header_menu_area_meta_options_map', 10, 1 );
}