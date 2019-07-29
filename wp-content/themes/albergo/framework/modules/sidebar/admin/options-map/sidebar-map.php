<?php

if ( ! function_exists( 'albergo_elated_sidebar_options_map' ) ) {
	function albergo_elated_sidebar_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'albergo' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'albergo' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		albergo_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'albergo' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'albergo' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => albergo_elated_get_custom_sidebars_options()
		) );
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'albergo' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'albergo' ),
				'parent'      => $sidebar_panel,
				'options'     => $albergo_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_sidebar_options_map', 6 );
}