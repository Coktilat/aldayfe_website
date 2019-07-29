<?php

if ( ! function_exists( 'albergo_elated_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function albergo_elated_register_blog_list_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_blog_list_widget' );
}