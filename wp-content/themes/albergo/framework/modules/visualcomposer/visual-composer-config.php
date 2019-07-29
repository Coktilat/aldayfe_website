<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'albergo_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function albergo_elated_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'albergo_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'albergo_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function albergo_elated_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Albergo Row Content Width', 'albergo' ),
				'value'      => array(
					esc_html__( 'Full Width', 'albergo' ) => 'full-width',
					esc_html__( 'In Grid', 'albergo' )    => 'grid'
				),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Albergo Anchor ID', 'albergo' ),
				'description' => esc_html__( 'For example "home"', 'albergo' ),
				'group'       => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Albergo Background Color', 'albergo' ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Albergo Background Image', 'albergo' ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Albergo Disable Background Image', 'albergo' ),
				'value'       => array(
					esc_html__( 'Never', 'albergo' )        => '',
					esc_html__( 'Below 1280px', 'albergo' ) => '1280',
					esc_html__( 'Below 1024px', 'albergo' ) => '1024',
					esc_html__( 'Below 768px', 'albergo' )  => '768',
					esc_html__( 'Below 680px', 'albergo' )  => '680',
					esc_html__( 'Below 480px', 'albergo' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'albergo' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Albergo Parallax Background Image', 'albergo' ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Albergo Parallax Speed', 'albergo' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'albergo' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Albergo Parallax Section Height (px)', 'albergo' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Albergo Content Aligment', 'albergo' ),
				'value'      => array(
					esc_html__( 'Default', 'albergo' ) => '',
					esc_html__( 'Left', 'albergo' )    => 'left',
					esc_html__( 'Center', 'albergo' )  => 'center',
					esc_html__( 'Right', 'albergo' )   => 'right'
				),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Albergo Row Content Width', 'albergo' ),
				'value'      => array(
					esc_html__( 'Full Width', 'albergo' ) => 'full-width',
					esc_html__( 'In Grid', 'albergo' )    => 'grid'
				),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Albergo Background Color', 'albergo' ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Albergo Background Image', 'albergo' ),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Albergo Disable Background Image', 'albergo' ),
				'value'       => array(
					esc_html__( 'Never', 'albergo' )        => '',
					esc_html__( 'Below 1280px', 'albergo' ) => '1280',
					esc_html__( 'Below 1024px', 'albergo' ) => '1024',
					esc_html__( 'Below 768px', 'albergo' )  => '768',
					esc_html__( 'Below 680px', 'albergo' )  => '680',
					esc_html__( 'Below 480px', 'albergo' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'albergo' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Albergo Content Aligment', 'albergo' ),
				'value'      => array(
					esc_html__( 'Default', 'albergo' ) => '',
					esc_html__( 'Left', 'albergo' )    => 'left',
					esc_html__( 'Center', 'albergo' )  => 'center',
					esc_html__( 'Right', 'albergo' )   => 'right'
				),
				'group'      => esc_html__( 'Albergo Settings', 'albergo' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( albergo_elated_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Albergo Enable Passepartout', 'albergo' ),
					'value'       => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Albergo Settings', 'albergo' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Albergo Passepartout Size', 'albergo' ),
					'value'       => array(
						esc_html__( 'Tiny', 'albergo' )   => 'tiny',
						esc_html__( 'Small', 'albergo' )  => 'small',
						esc_html__( 'Normal', 'albergo' ) => 'normal',
						esc_html__( 'Large', 'albergo' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Albergo Settings', 'albergo' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Albergo Disable Side Passepartout', 'albergo' ),
					'value'       => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Albergo Settings', 'albergo' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Albergo Disable Top Passepartout', 'albergo' ),
					'value'       => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Albergo Settings', 'albergo' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'albergo_elated_vc_row_map' );
}