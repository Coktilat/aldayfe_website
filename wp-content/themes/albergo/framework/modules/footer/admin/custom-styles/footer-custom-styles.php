<?php

if ( ! function_exists( 'albergo_elated_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function albergo_elated_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = albergo_elated_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo albergo_elated_dynamic_css( '.eltd-page-footer .eltd-footer-top-holder', $item_styles );
	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_footer_top_general_styles' );
}

if ( ! function_exists( 'albergo_elated_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function albergo_elated_footer_bottom_general_styles()
	{
		$item_styles = array();
		$item_classes = '.eltd-page-footer .eltd-footer-bottom-holder';

		$background_color = albergo_elated_options()->getOptionValue('footer_bottom_background_color');

		if (!empty($background_color)) {
			$item_styles['background-color'] = $background_color;
		}

		echo albergo_elated_dynamic_css($item_classes, $item_styles);



		$item_styles = array();
		$item_classes     = '.eltd-page-footer .eltd-footer-bottom-holder .eltd-footer-bottom-inner';

		$border_color = albergo_elated_options()->getOptionValue( 'footer_bottom_top_border_color' );
		if (!empty($border_color)) {
			$item_styles['border-top-color'] = $border_color;
		}

		echo albergo_elated_dynamic_css($item_classes, $item_styles);

	}
	
	add_action( 'albergo_elated_style_dynamic', 'albergo_elated_footer_bottom_general_styles' );
}