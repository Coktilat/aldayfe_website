<?php

if ( ! function_exists( 'albergo_elated_get_blog_list_types_options' ) ) {
	function albergo_elated_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'albergo_elated_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'albergo_elated_blog_options_map' ) ) {
	function albergo_elated_blog_options_map() {
		$blog_list_type_options = albergo_elated_get_blog_list_types_options();
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'albergo' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = albergo_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'albergo' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'albergo' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'albergo' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'albergo' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => albergo_elated_get_custom_sidebars_options(),
			)
		);
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'albergo' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'albergo' ),
					'parent'      => $panel_blog_lists,
					'options'     => albergo_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'albergo' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'albergo' ),
					'full-width' => esc_html__( 'Full Width', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'albergo' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'albergo' ),
					'three' => esc_html__( '3 Columns', 'albergo' ),
					'four'  => esc_html__( '4 Columns', 'albergo' ),
					'five'  => esc_html__( '5 Columns', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'albergo' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'albergo' ),
				'default_value' => 'normal',
				'options'       => albergo_elated_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'albergo' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'albergo' ),
					'original' => esc_html__( 'Original', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'albergo' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'albergo' ),
					'load-more'       => esc_html__( 'Load More', 'albergo' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'albergo' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'albergo' )
				)
			)
		);

		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_tags',
				'type'          => 'select',
				'label'         => esc_html__( 'Enable Tags', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will display tags on Blog Lists', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'yes',
				'options'       => array(
					'yes'     => esc_html__( 'Yes', 'albergo' ),
					'no'      => esc_html__( 'No', 'albergo' ),
				)
			)
		);


		albergo_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'albergo' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'albergo' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = albergo_elated_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'albergo' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'albergo' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => albergo_elated_get_custom_sidebars_options()
			)
		);
		
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'albergo' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'albergo' ),
					'parent'      => $panel_blog_single,
					'options'     => albergo_elated_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'albergo' ),
				'parent'        => $panel_blog_single,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'albergo' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'albergo' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'albergo' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'albergo' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'albergo' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_navigation_container'
				)
			)
		);
		
		$blog_single_navigation_container = albergo_elated_add_admin_container(
			array(
				'name'            => 'eltd_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'albergo' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'albergo' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'albergo' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_author_info_container'
				)
			)
		);
		
		$blog_single_author_info_container = albergo_elated_add_admin_container(
			array(
				'name'            => 'eltd_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'albergo' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'albergo' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'albergo_elated_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_blog_options_map', 11 );
}