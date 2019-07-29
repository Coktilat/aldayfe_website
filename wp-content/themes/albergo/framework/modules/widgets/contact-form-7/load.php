<?php

if ( albergo_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_cf7_widget' );
}

if ( ! function_exists( 'albergo_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function albergo_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedContactForm7Widget';
		
		return $widgets;
	}
}