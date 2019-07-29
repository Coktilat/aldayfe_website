<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'albergo_elated_map_blog_meta' ) ) {
	function albergo_elated_map_blog_meta() {
		$eltd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'albergo' ),
				'name'  => 'blog_meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'albergo' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'albergo' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'albergo' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'albergo' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'albergo' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'albergo' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'albergo' ),
					'in-grid'    => esc_html__( 'In Grid', 'albergo' ),
					'full-width' => esc_html__( 'Full Width', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'albergo' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'albergo' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'albergo' ),
					'two'   => esc_html__( '2 Columns', 'albergo' ),
					'three' => esc_html__( '3 Columns', 'albergo' ),
					'four'  => esc_html__( '4 Columns', 'albergo' ),
					'five'  => esc_html__( '5 Columns', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'albergo' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'albergo' ),
				'options'     => albergo_elated_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'albergo' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'albergo' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'albergo' ),
					'fixed'    => esc_html__( 'Fixed', 'albergo' ),
					'original' => esc_html__( 'Original', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'albergo' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'albergo' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'albergo' ),
					'standard'        => esc_html__( 'Standard', 'albergo' ),
					'load-more'       => esc_html__( 'Load More', 'albergo' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'albergo' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltd_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'albergo' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'albergo' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_blog_meta', 30 );
}