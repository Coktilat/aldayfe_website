<?php

if ( ! function_exists( 'albergo_elated_header_skin_class' ) ) {
	/**
	 * Function that adds header style class to body tag
	 */
	function albergo_elated_header_skin_class( $classes ) {
		$header_style     = albergo_elated_get_meta_field_intersect( 'header_style', albergo_elated_get_page_id() );
		$header_style_404 = albergo_elated_options()->getOptionValue( '404_header_style' );
		
		if ( is_404() && ! empty( $header_style_404 ) ) {
			$classes[] = 'eltd-' . $header_style_404;
		} else if ( ! empty( $header_style ) ) {
			$classes[] = 'eltd-' . $header_style;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_header_skin_class' );
}

if ( ! function_exists( 'albergo_elated_sticky_header_behaviour_class' ) ) {
	/**
	 * Function that adds header behavior class to body tag
	 */
	function albergo_elated_sticky_header_behaviour_class( $classes ) {
		$header_behavior = albergo_elated_get_meta_field_intersect( 'header_behaviour', albergo_elated_get_page_id() );
		
		if ( ! empty( $header_behavior ) ) {
			$classes[] = 'eltd-' . $header_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_sticky_header_behaviour_class' );
}

if ( ! function_exists( 'albergo_elated_menu_dropdown_appearance' ) ) {
	/**
	 * Function that adds menu dropdown appearance class to body tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added menu dropdown appearance class
	 */
	function albergo_elated_menu_dropdown_appearance( $classes ) {
		$dropdown_menu_appearance = albergo_elated_options()->getOptionValue( 'menu_dropdown_appearance' );
		
		if ( $dropdown_menu_appearance !== 'default' ) {
			$classes[] = 'eltd-' . $dropdown_menu_appearance;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_menu_dropdown_appearance' );
}

if ( ! function_exists( 'albergo_elated_header_class' ) ) {
	/**
	 * Function that adds class to header based on theme options
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added header class
	 */
	function albergo_elated_header_class( $classes ) {
		$id = albergo_elated_get_page_id();
		
		$header_type = albergo_elated_get_meta_field_intersect( 'header_type', $id );
		
		$classes[] = 'eltd-' . $header_type;
		
		$disable_menu_area_shadow = albergo_elated_get_meta_field_intersect( 'menu_area_shadow', $id ) == 'no';
		if ( $disable_menu_area_shadow ) {
			$classes[] = 'eltd-menu-area-shadow-disable';
		}
		
		$disable_menu_area_grid_shadow = albergo_elated_get_meta_field_intersect( 'menu_area_in_grid_shadow', $id ) == 'no';
		if ( $disable_menu_area_grid_shadow ) {
			$classes[] = 'eltd-menu-area-in-grid-shadow-disable';
		}
		
		$disable_menu_area_border = albergo_elated_get_meta_field_intersect( 'menu_area_border', $id ) == 'no';
		if ( $disable_menu_area_border ) {
			$classes[] = 'eltd-menu-area-border-disable';
		}
		
		$disable_menu_area_grid_border = albergo_elated_get_meta_field_intersect( 'menu_area_in_grid_border', $id ) == 'no';
		if ( $disable_menu_area_grid_border ) {
			$classes[] = 'eltd-menu-area-in-grid-border-disable';
		}
		
		if ( albergo_elated_get_meta_field_intersect( 'menu_area_in_grid', $id ) == 'yes' &&
		     albergo_elated_get_meta_field_intersect( 'menu_area_grid_background_color', $id ) !== '' &&
		     albergo_elated_get_meta_field_intersect( 'menu_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'eltd-header-menu-area-in-grid-padding';
		}
		
		$disable_logo_area_border = albergo_elated_get_meta_field_intersect( 'logo_area_border', $id ) == 'no';
		if ( $disable_logo_area_border ) {
			$classes[] = 'eltd-logo-area-border-disable';
		}
		
		$disable_logo_area_grid_border = albergo_elated_get_meta_field_intersect( 'logo_area_in_grid_border', $id ) == 'no';
		if ( $disable_logo_area_grid_border ) {
			$classes[] = 'eltd-logo-area-in-grid-border-disable';
		}
		
		if ( albergo_elated_get_meta_field_intersect( 'logo_area_in_grid', $id ) == 'yes' &&
		     albergo_elated_get_meta_field_intersect( 'logo_area_grid_background_color', $id ) !== '' &&
		     albergo_elated_get_meta_field_intersect( 'logo_area_grid_background_transparency', $id ) !== '0'
		) {
			$classes[] = 'eltd-header-logo-area-in-grid-padding';
		}
		
		$disable_shadow_vertical = albergo_elated_get_meta_field_intersect( 'vertical_header_shadow', $id ) == 'no';
		if ( $disable_shadow_vertical ) {
			$classes[] = 'eltd-header-vertical-shadow-disable';
		}
		
		$disable_border_vertical = albergo_elated_get_meta_field_intersect( 'vertical_header_border', $id ) == 'no';
		if ( $disable_border_vertical ) {
			$classes[] = 'eltd-header-vertical-border-disable';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'albergo_elated_header_class' );
}

if ( ! function_exists( 'albergo_elated_header_area_style' ) ) {
	/**
	 * Function that return styles for header area
	 */
	function albergo_elated_header_area_style( $style ) {
		$page_id      = albergo_elated_get_page_id();
		$class_prefix = albergo_elated_get_unique_page_class( $page_id, true );
		
		$current_style = '';
		
		$menu_area_style              = array();
		$menu_area_grid_style         = array();
		$menu_area_enable_border      = get_post_meta( $page_id, 'eltd_menu_area_border_meta', true ) == 'yes';
		$menu_area_enable_grid_border = get_post_meta( $page_id, 'eltd_menu_area_in_grid_border_meta', true ) == 'yes';
		$menu_area_enable_shadow      = get_post_meta( $page_id, 'eltd_menu_area_shadow_meta', true ) == 'yes';
		$menu_area_enable_grid_shadow = get_post_meta( $page_id, 'eltd_menu_area_in_grid_shadow_meta', true ) == 'yes';
		
		$menu_area_selector      = array( $class_prefix . ' .eltd-page-header .eltd-menu-area' );
		$menu_area_grid_selector = array( $class_prefix . ' .eltd-page-header .eltd-menu-area .eltd-grid .eltd-vertical-align-containers' );
		
		/* menu area style - start */
		
		$menu_area_background_color        = get_post_meta( $page_id, 'eltd_menu_area_background_color_meta', true );
		$menu_area_background_transparency = get_post_meta( $page_id, 'eltd_menu_area_background_transparency_meta', true );
		
		if ( $menu_area_background_transparency === '' ) {
			$menu_area_background_transparency = 1;
		}
		
		$menu_area_background_color_rgba = albergo_elated_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		
		if ( $menu_area_background_color_rgba !== null ) {
			$menu_area_style['background-color'] = $menu_area_background_color_rgba;
		}
		
		if ( $menu_area_enable_shadow ) {
			$menu_area_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'eltd_menu_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* menu area style - end */
		
		/* menu area in grid style - start */
		
		if ( $menu_area_enable_grid_shadow ) {
			$menu_area_grid_style['box-shadow'] = '0px 1px 3px rgba(0,0,0,0.15)';
		}
		
		if ( $menu_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'eltd_menu_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$menu_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$menu_area_grid_background_color        = get_post_meta( $page_id, 'eltd_menu_area_grid_background_color_meta', true );
		$menu_area_grid_background_transparency = get_post_meta( $page_id, 'eltd_menu_area_grid_background_transparency_meta', true );
		
		if ( $menu_area_grid_background_transparency === '' ) {
			$menu_area_grid_background_transparency = 1;
		}
		
		$menu_area_grid_background_color_rgba = albergo_elated_rgba_color( $menu_area_grid_background_color, $menu_area_grid_background_transparency );
		
		if ( $menu_area_grid_background_color_rgba !== null ) {
			$menu_area_grid_style['background-color'] = $menu_area_grid_background_color_rgba;
		}
		
		$current_style .= albergo_elated_dynamic_css( $menu_area_selector, $menu_area_style );
		$current_style .= albergo_elated_dynamic_css( $menu_area_grid_selector, $menu_area_grid_style );
		
		/* menu area in grid style - end */
		
		/* main menu dropdown area style - start */
		
		$dropdown_top_position = get_post_meta( $page_id, 'eltd_dropdown_top_position_meta', true );
		
		$dropdown_styles = array();
		if ( $dropdown_top_position !== '' ) {
			$dropdown_styles['top'] = albergo_elated_filter_suffix( $dropdown_top_position, '%' ) . '%';
		}
		
		$dropdown_selector = array( $class_prefix . ' .eltd-page-header .eltd-drop-down .second' );
		
		$current_style .= albergo_elated_dynamic_css( $dropdown_selector, $dropdown_styles );
		
		/* main menu dropdown area style - end */
		
		/* logo area style - start */
		
		$logo_area_style              = array();
		$logo_area_grid_style         = array();
		$logo_area_enable_border      = get_post_meta( $page_id, 'eltd_logo_area_border_meta', true ) == 'yes';
		$logo_area_enable_grid_border = get_post_meta( $page_id, 'eltd_logo_area_in_grid_border_meta', true ) == 'yes';
		
		$logo_area_selector      = array( $class_prefix . ' .eltd-page-header .eltd-logo-area' );
		$logo_area_grid_selector = array( $class_prefix . ' .eltd-page-header .eltd-logo-area .eltd-grid .eltd-vertical-align-containers' );
		
		$logo_area_background_color        = get_post_meta( $page_id, 'eltd_logo_area_background_color_meta', true );
		$logo_area_background_transparency = get_post_meta( $page_id, 'eltd_logo_area_background_transparency_meta', true );
		
		if ( $logo_area_background_transparency === '' ) {
			$logo_area_background_transparency = 1;
		}
		
		$logo_area_background_color_rgba = albergo_elated_rgba_color( $logo_area_background_color, $logo_area_background_transparency );
		
		if ( $logo_area_background_color_rgba !== null ) {
			$logo_area_style['background-color'] = $logo_area_background_color_rgba;
		}
		
		if ( $logo_area_enable_border ) {
			$header_border_color = get_post_meta( $page_id, 'eltd_logo_area_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$logo_area_style['border-bottom'] = '1px solid ' . $header_border_color;
			}
		}
		
		/* logo area style - end */
		
		/* logo area in grid style - start */
		
		if ( $logo_area_enable_grid_border ) {
			$header_grid_border_color = get_post_meta( $page_id, 'eltd_logo_area_in_grid_border_color_meta', true );
			
			if ( $header_grid_border_color !== '' ) {
				$logo_area_grid_style['border-bottom'] = '1px solid ' . $header_grid_border_color;
			}
		}
		
		$logo_area_grid_background_color        = get_post_meta( $page_id, 'eltd_logo_area_grid_background_color_meta', true );
		$logo_area_grid_background_transparency = get_post_meta( $page_id, 'eltd_logo_area_grid_background_transparency_meta', true );
		
		if ( $logo_area_grid_background_transparency === '' ) {
			$logo_area_grid_background_transparency = 1;
		}
		
		$logo_area_grid_background_color_rgba = albergo_elated_rgba_color( $logo_area_grid_background_color, $logo_area_grid_background_transparency );
		
		if ( $logo_area_grid_background_color_rgba !== null ) {
			$logo_area_grid_style['background-color'] = $logo_area_grid_background_color_rgba;
		}
		
		/* logo area in grid style - end */
		
		if ( ! empty( $logo_area_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $logo_area_selector, $logo_area_style );
		}
		
		if ( ! empty( $logo_area_grid_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $logo_area_grid_selector, $logo_area_grid_style );
		}
		
		$current_style = apply_filters( 'albergo_elated_add_header_page_custom_style', $current_style, $class_prefix, $page_id ) . $style;
		
		return $current_style;
	}
	
	add_filter( 'albergo_elated_add_page_custom_style', 'albergo_elated_header_area_style' );
}