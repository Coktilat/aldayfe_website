<?php

if ( ! function_exists( 'albergo_elated_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function albergo_elated_register_social_icon_widget( $widgets ) {
		$widgets[] = 'AlbergoElatedSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'albergo_elated_register_widgets', 'albergo_elated_register_social_icon_widget' );
}