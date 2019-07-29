<?php

if ( ! function_exists( 'albergo_elated_register_blog_masonry_gallery_template_file' ) ) {
	/**
	 * Function that register blog masonry gallery template
	 */
	function albergo_elated_register_blog_masonry_gallery_template_file( $templates ) {
		$templates['blog-masonry-gallery'] = esc_html__( 'Blog: Masonry Gallery', 'albergo' );
		
		return $templates;
	}
	
	add_filter( 'albergo_elated_register_blog_templates', 'albergo_elated_register_blog_masonry_gallery_template_file' );
}

if ( ! function_exists( 'albergo_elated_set_blog_masonry_gallery_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function albergo_elated_set_blog_masonry_gallery_type_global_option( $options ) {
		$options['masonry-gallery'] = esc_html__( 'Blog: Masonry Gallery', 'albergo' );
		
		return $options;
	}
	
	add_filter( 'albergo_elated_blog_list_type_global_option', 'albergo_elated_set_blog_masonry_gallery_type_global_option' );
}