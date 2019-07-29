<?php

if ( ! function_exists( 'albergo_elated_error_404_options_map' ) ) {
	function albergo_elated_error_404_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'albergo' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = albergo_elated_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose a background color for header area', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'albergo' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'albergo' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'color',
				'name'          => '404_menu_area_border_color_header',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'albergo' ),
				'description'   => esc_html__( 'Choose a border bottom color for header area', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'albergo' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'albergo' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'albergo' ),
					'light-header' => esc_html__( 'Light', 'albergo' ),
					'dark-header'  => esc_html__( 'Dark', 'albergo' )
				)
			)
		);
		
		$panel_404_options = albergo_elated_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'default_value' => ELATED_ASSETS_ROOT . "/img/404.png",
				'label'       => esc_html__( 'Background Image', 'albergo' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'albergo' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'albergo' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'albergo' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'albergo' )
			)
		);
		
		$first_level_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'albergo' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'albergo' )
			)
		);
		
		$first_level_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => '404_title_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'albergo' ),
				'options'       => albergo_elated_get_font_style_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'albergo' ),
				'options'       => albergo_elated_get_font_weight_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'albergo' ),
				'options'       => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle', 'albergo' ),
				'description'   => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'albergo' )
			)
		);
		
		$second_level_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Subtitle Style', 'albergo' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'albergo' )
			)
		);
		
		$second_level_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => '404_subtitle_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'albergo' ),
				'options'       => albergo_elated_get_font_style_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'albergo' ),
				'options'       => albergo_elated_get_font_weight_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'albergo' ),
				'options'       => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'albergo' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'albergo' )
			)
		);
		
		$third_level_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'albergo' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'albergo' )
			)
		);
		
		$third_level_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => '404_text_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'albergo' ),
				'options'       => albergo_elated_get_font_style_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'albergo' ),
				'options'       => albergo_elated_get_font_weight_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'albergo' ),
				'options'       => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'albergo' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => 'light-style',
				'label'         => esc_html__( 'Button Skin', 'albergo' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'albergo' ),
				'options'       => array(
					'light-style' => esc_html__( 'Light', 'albergo' ),
					''            => esc_html__( 'Dark', 'albergo' )
				)
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_error_404_options_map', 15 );
}