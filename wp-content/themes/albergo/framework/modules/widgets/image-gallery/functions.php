<?php

if ( ! function_exists( 'albergo_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function albergo_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_image_gallery_widget' );
}