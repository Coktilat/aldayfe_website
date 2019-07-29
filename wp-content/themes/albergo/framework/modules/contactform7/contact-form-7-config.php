<?php

if ( ! function_exists('albergo_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function albergo_elated_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'albergo'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'albergo') => 'default',
				esc_html__('Custom Style 1', 'albergo') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'albergo') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'albergo') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Albergo Options > Contact Form 7', 'albergo')
		));
	}
	
	add_action('vc_after_init', 'albergo_elated_contact_form_map');
}