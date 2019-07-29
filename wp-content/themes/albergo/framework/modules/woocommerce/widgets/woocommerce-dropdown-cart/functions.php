<?php

if ( ! function_exists( 'albergo_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function albergo_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_woocommerce_dropdown_cart_widget' );
}