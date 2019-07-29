<?php

if ( ! function_exists( 'albergo_elated_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function albergo_elated_woocommerce_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'albergo' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = albergo_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'albergo' ),
				'default_value' => 'eltd-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for product listing and related products on single product', 'albergo' ),
				'options'       => array(
					'eltd-woocommerce-columns-3' => esc_html__( '3 Columns', 'albergo' ),
					'eltd-woocommerce-columns-4' => esc_html__( '4 Columns', 'albergo' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'albergo' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'albergo' ),
				'default_value' => 'normal',
				'options'       => albergo_elated_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_woo_product_list_info_position',
				'label'         => esc_html__( 'Product Info Position', 'albergo' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'albergo' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'albergo' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'albergo' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'eltd_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'albergo' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'albergo' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'albergo' ),
				'default_value' => 'h4',
				'options'       => albergo_elated_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = albergo_elated_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'albergo' ),
				'parent'        => $panel_single_product,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'albergo' ),
				'options'       => albergo_elated_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'albergo' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'albergo' ),
					'3' => esc_html__( 'Three', 'albergo' ),
					'2' => esc_html__( 'Two', 'albergo' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'albergo' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'albergo' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'albergo' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'albergo' ),
				'parent'        => $panel_single_product,
				'options'       => albergo_elated_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'albergo' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'albergo' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'albergo' )
				),
				'parent'        => $panel_single_product
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_woocommerce_options_map', 21 );
}