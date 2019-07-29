<?php

if ( ! function_exists( 'albergo_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function albergo_elated_reset_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'albergo' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = albergo_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'albergo' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'albergo' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_reset_options_map', 100 );
}