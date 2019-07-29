<?php

/*** Child Theme Function  ***/

function albergo_elated_child_theme_enqueue_scripts() {
	
	$parent_style = 'albergo_elated_default_style';
	
	wp_enqueue_style('albergo_elated_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action( 'wp_enqueue_scripts', 'albergo_elated_child_theme_enqueue_scripts' );