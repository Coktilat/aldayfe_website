<?php

if ( ! function_exists( 'albergo_elated_logo_options_map' ) ) {
	function albergo_elated_logo_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'albergo' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = albergo_elated_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'albergo' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#eltd_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_logo_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'albergo' ),
				'parent'        => $hide_logo_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'albergo' ),
				'parent'        => $hide_logo_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'albergo' ),
				'parent'        => $hide_logo_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'albergo' ),
				'parent'        => $hide_logo_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'albergo' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_logo_options_map', 2 );
}