<?php

if ( ! function_exists( 'albergo_elated_get_search_types_options' ) ) {
    function albergo_elated_get_search_types_options() {
        $search_type_options = apply_filters( 'albergo_elated_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'albergo_elated_search_options_map' ) ) {
	function albergo_elated_search_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'albergo' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'albergo' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		albergo_elated_add_admin_field( array(
			'name'          => 'search_page_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Layout', 'albergo' ),
			'default_value' => 'in-grid',
			'description'   => esc_html__( 'Set layout. Default is in grid.', 'albergo' ),
			'parent'        => $search_page_panel,
			'options'       => array(
				'in-grid'    => esc_html__( 'In Grid', 'albergo' ),
				'full-width' => esc_html__( 'Full Width', 'albergo' )
			)
		) );
		
		albergo_elated_add_admin_field( array(
			'name'          => 'search_page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'albergo' ),
			'description'   => esc_html__( "Choose a sidebar layout for search page", 'albergo' ),
			'default_value' => 'no-sidebar',
			'options'       => albergo_elated_get_custom_sidebars_options(),
			'parent'        => $search_page_panel
		) );
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_admin_field( array(
				'name'        => 'search_custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'albergo' ),
				'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'albergo' ),
				'parent'      => $search_page_panel,
				'options'     => $albergo_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
		
		$search_panel = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'albergo' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_type',
				'default_value' => 'fullscreen',
				'label'         => esc_html__( 'Select Search Type', 'albergo' ),
				'description'   => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'albergo' ),
				'options'       => albergo_elated_get_search_types_options()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'albergo' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'albergo' ),
				'options'       => albergo_elated_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'albergo' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'albergo' ),
				'description'   => esc_html__( 'Set size for icon', 'albergo' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'albergo' ),
				'description' => esc_html__( 'Define color style for icon', 'albergo' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = albergo_elated_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'albergo' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'albergo' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'hidden_property' => 'enable_search_icon_text',
				'hidden_value'    => 'no'
			)
		);
		
		$enable_search_icon_text_group = albergo_elated_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'albergo' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'albergo' )
			)
		);
		
		$enable_search_icon_text_row = albergo_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'albergo' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'albergo' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = albergo_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'albergo' ),
				'default_value' => '',
				'options'       => albergo_elated_get_text_transform_array()
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'default_value' => '-1',
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'albergo' ),
				'default_value' => '',
				'options'       => albergo_elated_get_font_style_array(),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'albergo' ),
				'default_value' => '',
				'options'       => albergo_elated_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = albergo_elated_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'albergo' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_search_options_map', 7 );
}