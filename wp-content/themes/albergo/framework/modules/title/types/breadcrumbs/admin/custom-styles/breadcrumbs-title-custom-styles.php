<?php

if ( ! function_exists( 'albergo_elated_breadcrumbs_title_area_typography_style' ) ) {
	function albergo_elated_breadcrumbs_title_area_typography_style() {
		
		$item_styles = albergo_elated_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-breadcrumbs'
		);
		
		echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = albergo_elated_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-breadcrumbs a:hover'
		);
		
		echo albergo_elated_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_breadcrumbs_title_area_typography_style' );
}