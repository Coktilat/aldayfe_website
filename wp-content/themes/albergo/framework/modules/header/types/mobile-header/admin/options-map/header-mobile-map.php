<?php

if ( ! function_exists( 'albergo_elated_mobile_header_options_map' ) ) {
	function albergo_elated_mobile_header_options_map() {
		
		$panel_mobile_header = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'albergo' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_header_page'
			)
		);
		
		$mobile_header_group = albergo_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'albergo' )
			)
		);
		
		$mobile_header_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'albergo' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'albergo' ),
				'parent' => $mobile_header_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'albergo' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = albergo_elated_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'albergo' )
			)
		);
		
		$mobile_menu_row1 = albergo_elated_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'albergo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'albergo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'albergo' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'albergo' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'albergo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'albergo' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'albergo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'albergo' )
			)
		);
		
		$first_level_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'albergo' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'albergo' )
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
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'albergo' ),
				'parent' => $first_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'albergo' ),
				'parent' => $first_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'albergo' ),
				'parent' => $first_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'albergo' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'albergo' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'albergo' ),
				'parent'  => $first_level_row2,
				'options' => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'albergo' ),
				'parent'  => $first_level_row2,
				'options' => albergo_elated_get_font_style_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'albergo' ),
				'parent'  => $first_level_row2,
				'options' => albergo_elated_get_font_weight_array()
			)
		);
		
		$first_level_row3 = albergo_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'albergo' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'albergo' )
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
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'albergo' ),
				'parent' => $second_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'albergo' ),
				'parent' => $second_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'albergo' ),
				'parent' => $second_level_row1
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'albergo' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'albergo' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'albergo' ),
				'parent'  => $second_level_row2,
				'options' => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'albergo' ),
				'parent'  => $second_level_row2,
				'options' => albergo_elated_get_font_style_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'albergo' ),
				'parent'  => $second_level_row2,
				'options' => albergo_elated_get_font_weight_array()
			)
		);
		
		$second_level_row3 = albergo_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'albergo' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'albergo' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'albergo' ),
				'parent' => $panel_mobile_header
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'albergo' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'albergo_elated_mobile_header_action_options_map', 'albergo_elated_mobile_header_options_map');
}