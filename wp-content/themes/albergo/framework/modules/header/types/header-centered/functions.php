<?php

if ( ! function_exists( 'albergo_elated_register_header_centered_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function albergo_elated_register_header_centered_type( $header_types ) {
		$header_type = array(
			'header-centered' => 'Albergo\Modules\Header\Types\HeaderCentered'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'albergo_elated_init_register_header_centered_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function albergo_elated_init_register_header_centered_type() {
		add_filter( 'albergo_elated_register_header_type_class', 'albergo_elated_register_header_centered_type' );
	}
	
	add_action( 'albergo_elated_before_header_function_init', 'albergo_elated_init_register_header_centered_type' );
}

if ( ! function_exists( 'albergo_elated_header_centered_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function albergo_elated_header_centered_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.eltd-header-centered .eltd-logo-area .eltd-logo-wrapper' );
		
		$logo_area_logo_padding = get_post_meta( $page_id, 'eltd_logo_wrapper_padding_header_centered_meta', true );
		
		if ( $logo_area_logo_padding !== '' ) {
			$header_area_style['padding'] = $logo_area_logo_padding;
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'albergo_elated_add_header_page_custom_style', 'albergo_elated_header_centered_per_page_custom_styles', 10, 3 );
}

if ( ! function_exists( 'albergo_elated_header_centered_widget_areas' ) ) {
	/**
	 * Registers widget areas for header types
	 */
	function albergo_elated_header_centered_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'eltd-header-widget-left-logo-area',
				'name'          => esc_html__( 'Header Centered Left Widget Logo Area', 'albergo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-header-widget-logo-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the left side in the logo area', 'albergo' )
			)
		);

		register_sidebar(
			array(
				'id'            => 'eltd-header-widget-right-logo-area',
				'name'          => esc_html__( 'Header Centered Right Widget Logo Area', 'albergo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-header-widget-logo-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right side in the logo area', 'albergo' )
			)
		);
	}

	add_action( 'widgets_init', 'albergo_elated_header_centered_widget_areas' );
}

if ( ! function_exists( 'albergo_elated_get_header_centered_widget_left_logo_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function albergo_elated_get_header_centered_widget_left_logo_area() {
		$page_id                 = albergo_elated_get_page_id();

		if ( get_post_meta( $page_id, 'eltd_disable_header_widget_logo_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'eltd-header-widget-left-logo-area' )) {
				dynamic_sidebar( 'eltd-header-widget-left-logo-area' );
			}
		}
	}
}

if ( ! function_exists( 'albergo_elated_get_header_centered_widget_right_logo_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function albergo_elated_get_header_centered_widget_right_logo_area() {
		$page_id                 = albergo_elated_get_page_id();

		if ( get_post_meta( $page_id, 'eltd_disable_header_widget_logo_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'eltd-header-widget-right-logo-area' )) {
				dynamic_sidebar( 'eltd-header-widget-right-logo-area' );
			}
		}
	}
}