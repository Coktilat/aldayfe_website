<?php

if ( ! function_exists( 'albergo_elated_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function albergo_elated_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'albergo' );
		
		return $templates;
	}
	
	add_filter( 'albergo_elated_register_blog_templates', 'albergo_elated_register_blog_standard_template_file' );
}

if ( ! function_exists( 'albergo_elated_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function albergo_elated_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'albergo' );
		
		return $options;
	}
	
	add_filter( 'albergo_elated_blog_list_type_global_option', 'albergo_elated_set_blog_standard_type_global_option' );
}