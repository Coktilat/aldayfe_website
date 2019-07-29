<?php

if ( ! function_exists( 'albergo_elated_add_product_info_shortcode' ) ) {
	function albergo_elated_add_product_info_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\ProductInfo\ProductInfo',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( albergo_elated_core_plugin_installed() ) {
		add_filter( 'eltd_core_filter_add_vc_shortcode', 'albergo_elated_add_product_info_shortcode' );
	}
}

if ( ! function_exists( 'albergo_elated_add_product_info_into_shortcodes_list' ) ) {
	function albergo_elated_add_product_info_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'eltd_product_info';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'albergo_elated_woocommerce_shortcodes_list', 'albergo_elated_add_product_info_into_shortcodes_list' );
}