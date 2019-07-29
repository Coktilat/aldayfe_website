<?php

if ( ! function_exists( 'albergo_elated_content_bottom_options_map' ) ) {
	function albergo_elated_content_bottom_options_map() {
		
		$panel_content_bottom = albergo_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'albergo' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'albergo' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_enable_content_bottom_area_container'
				),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'hidden_property' => 'enable_content_bottom_area',
				'hidden_value'    => 'no'
			)
		);
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'albergo' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'albergo' ),
				'options'       => $albergo_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'albergo' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'albergo' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
	}
	
	add_action( 'albergo_elated_additional_page_options_map', 'albergo_elated_content_bottom_options_map' );
}