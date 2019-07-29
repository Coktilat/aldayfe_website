<?php

if ( ! function_exists( 'albergo_elated_add_product_list_simple_shortcode' ) ) {
	function albergo_elated_add_product_list_simple_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'ElatedCore\CPT\Shortcodes\ProductListSimple\ProductListSimple',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( albergo_elated_core_plugin_installed() ) {
		add_filter( 'eltd_core_filter_add_vc_shortcode', 'albergo_elated_add_product_list_simple_shortcode' );
	}
}

if ( ! function_exists( 'albergo_elated_add_product_list_simple_into_shortcodes_list' ) ) {
	function albergo_elated_add_product_list_simple_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'eltd_product_list_simple';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'albergo_elated_woocommerce_shortcodes_list', 'albergo_elated_add_product_list_simple_into_shortcodes_list' );
}