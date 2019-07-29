<?php

if ( ! function_exists( 'albergo_elated_like' ) ) {
	/**
	 * Returns AlbergoElatedLike instance
	 *
	 * @return AlbergoElatedLike
	 */
	function albergo_elated_like() {
		return AlbergoElatedLike::get_instance();
	}
}

function albergo_elated_get_like() {
	
	echo wp_kses( albergo_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}