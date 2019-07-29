<?php
if ( ! function_exists( 'albergo_elated_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function albergo_elated_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area Top', 'albergo' ),
				'description'   => esc_html__( 'Side Area Top', 'albergo' ),
				'before_widget' => '<div id="%1$s" class="widget eltd-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltd-widget-title-holder"><h5 class="eltd-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'sidearea-bottom',
				'name'          => esc_html__( 'Side Area Bottom', 'albergo' ),
				'description'   => esc_html__( 'Side Area Bottom', 'albergo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'albergo_elated_register_side_area_sidebar' );
}

if ( ! function_exists( 'albergo_elated_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function albergo_elated_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'eltd_side_area_opener' ) ) {
			
			$classes[] = 'eltd-side-menu-slide-from-right';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_side_menu_body_class' );
}

if ( ! function_exists( 'albergo_elated_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function albergo_elated_get_side_area() {
		
		if ( is_active_widget( false, false, 'eltd_side_area_opener' ) ) {
			
			albergo_elated_get_module_template_part( 'templates/sidearea', 'sidearea' );
		}
	}
	
	add_action( 'albergo_elated_after_body_tag', 'albergo_elated_get_side_area', 10 );
}