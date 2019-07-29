<?php

if ( ! function_exists( 'albergo_elated_sidearea_options_map' ) ) {
	function albergo_elated_sidearea_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'albergo' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'albergo' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'albergo' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'albergo' )
			)
		);
		
		$side_area_icon_style_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'albergo' )
			)
		);
		
		$side_area_icon_style_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'albergo' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'albergo' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'albergo' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'albergo' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'albergo' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'albergo' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'albergo' ),
					'left'   => esc_html__( 'Left', 'albergo' ),
					'center' => esc_html__( 'Center', 'albergo' ),
					'right'  => esc_html__( 'Right', 'albergo' )
				)
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_sidearea_options_map', 8 );
}