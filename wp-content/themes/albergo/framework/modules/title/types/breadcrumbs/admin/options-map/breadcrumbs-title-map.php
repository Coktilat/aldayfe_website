<?php

if ( ! function_exists('albergo_elated_breadcrumbs_title_type_options_map') ) {
	function albergo_elated_breadcrumbs_title_type_options_map($panel_typography) {
		
		albergo_elated_add_admin_section_title(
			array(
				'name'   => 'type_section_breadcrumbs',
				'title'  => esc_html__( 'Breadcrumbs', 'albergo' ),
				'parent' => $panel_typography
			)
		);
	
		$group_page_breadcrumbs_styles = albergo_elated_add_admin_group(
			array(
				'name'        => 'group_page_breadcrumbs_styles',
				'title'       => esc_html__( 'Breadcrumbs', 'albergo' ),
				'description' => esc_html__( 'Define styles for page breadcrumbs', 'albergo' ),
				'parent'      => $panel_typography
			)
		);
	
			$row_page_breadcrumbs_styles_1 = albergo_elated_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_1',
					'parent' => $group_page_breadcrumbs_styles
				)
			);
	
				albergo_elated_add_admin_field(
					array(
						'type'          => 'colorsimple',
						'name'          => 'page_breadcrumb_color',
						'default_value' => '',
						'label'         => esc_html__( 'Text Color', 'albergo' ),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_font_size',
						'default_value' => '',
						'label'         => esc_html__( 'Font Size', 'albergo' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_line_height',
						'default_value' => '',
						'label'         => esc_html__( 'Line Height', 'albergo' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_text_transform',
						'default_value' => '',
						'label'         => esc_html__( 'Text Transform', 'albergo' ),
						'options'       => albergo_elated_get_text_transform_array(),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
	
			$row_page_breadcrumbs_styles_2 = albergo_elated_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_2',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
	
				albergo_elated_add_admin_field(
					array(
						'type'          => 'fontsimple',
						'name'          => 'page_breadcrumb_google_fonts',
						'default_value' => '-1',
						'label'         => esc_html__( 'Font Family', 'albergo' ),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_style',
						'default_value' => '',
						'label'         => esc_html__( 'Font Style', 'albergo' ),
						'options'       => albergo_elated_get_font_style_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_weight',
						'default_value' => '',
						'label'         => esc_html__( 'Font Weight', 'albergo' ),
						'options'       => albergo_elated_get_font_weight_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_letter_spacing',
						'default_value' => '',
						'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
	
			$row_page_breadcrumbs_styles_3 = albergo_elated_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_3',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
	
				albergo_elated_add_admin_field(
					array(
						'type'          => 'colorsimple',
						'name'          => 'page_breadcrumb_hovercolor',
						'default_value' => '',
						'label'         => esc_html__( 'Hover/Active Text Color', 'albergo' ),
						'parent'        => $row_page_breadcrumbs_styles_3
					)
				);
    }

	add_action( 'albergo_elated_additional_title_typography_options_map', 'albergo_elated_breadcrumbs_title_type_options_map');
}