<?php

if ( ! function_exists( 'albergo_elated_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function albergo_elated_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'albergo' ),
				'description'   => esc_html__( 'Default Sidebar', 'albergo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'albergo_elated_register_sidebars', 1 );
}

if ( ! function_exists( 'albergo_elated_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates AlbergoElatedSidebar object
	 */
	function albergo_elated_add_support_custom_sidebar() {
		add_theme_support( 'AlbergoElatedSidebar' );
		
		if ( get_theme_support( 'AlbergoElatedSidebar' ) ) {
			new AlbergoElatedSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'albergo_elated_add_support_custom_sidebar' );
}