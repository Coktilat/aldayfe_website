<?php

if ( ! function_exists( 'albergo_elated_footer_options_map' ) ) {
	function albergo_elated_footer_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'albergo' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = albergo_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'albergo' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'albergo' ),
				'parent'        => $footer_panel,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'albergo' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = albergo_elated_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'albergo' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'albergo' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);

		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_top_custom_grid',
				'parent'        => $show_footer_top_container,
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer Top Custom Grid', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will enable footer top custom grid', 'albergo' ),
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'albergo' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'albergo' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'albergo' ),
					'left'   => esc_html__( 'Left', 'albergo' ),
					'center' => esc_html__( 'Center', 'albergo' ),
					'right'  => esc_html__( 'Right', 'albergo' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Set background color for top footer area', 'albergo' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'albergo' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = albergo_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'albergo' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'albergo' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'albergo' ),
				'parent'      => $show_footer_bottom_container
			)
		);

		albergo_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_top_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Footer bottom top border color', 'albergo' ),
				'description' => esc_html__( 'Set color for the top border of bottom footer area', 'albergo' ),
				'parent'      => $show_footer_bottom_container
			)
		);

		albergo_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_top_border_width',
				'type'        => 'text',
				'label'       => esc_html__( 'Footer bottom top border width', 'albergo' ),
				'description' => esc_html__( 'Set width for the top border bottom footer area', 'albergo' ),
				'parent'      => $show_footer_bottom_container,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_footer_options_map', 9 );
}