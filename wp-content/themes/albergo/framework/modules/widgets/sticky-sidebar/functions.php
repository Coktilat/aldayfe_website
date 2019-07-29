<?php

if(!function_exists('albergo_elated_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function albergo_elated_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'AlbergoElatedStickySidebar';
		
		return $widgets;
	}
	
	add_filter('albergo_elated_register_widgets', 'albergo_elated_register_sticky_sidebar_widget');
}