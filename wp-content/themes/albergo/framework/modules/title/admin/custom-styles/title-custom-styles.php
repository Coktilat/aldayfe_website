<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'albergo_elated_title_area_typography_style' ) ) {
	function albergo_elated_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = albergo_elated_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-page-title'
		);
		
		echo albergo_elated_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = albergo_elated_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-page-subtitle'
		);
		
		echo albergo_elated_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_title_area_typography_style' );
}