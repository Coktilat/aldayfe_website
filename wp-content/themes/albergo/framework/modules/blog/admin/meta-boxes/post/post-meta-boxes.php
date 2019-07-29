<?php

/*** Post Settings ***/

if ( ! function_exists( 'albergo_elated_map_post_meta' ) ) {
	function albergo_elated_map_post_meta() {
		
		$post_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'albergo' ),
				'name'  => 'post-meta'
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'albergo' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'albergo' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => albergo_elated_get_custom_sidebars_options( true )
			)
		);
		
		$albergo_custom_sidebars = albergo_elated_get_custom_sidebars();
		if ( count( $albergo_custom_sidebars ) > 0 ) {
			albergo_elated_add_meta_box_field( array(
				'name'        => 'eltd_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'albergo' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'albergo' ),
				'parent'      => $post_meta_box,
				'options'     => albergo_elated_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'albergo' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'albergo' ),
				'parent'      => $post_meta_box
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'albergo' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'albergo' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'albergo' ),
					'large-width'        => esc_html__( 'Large Width', 'albergo' ),
					'large-height'       => esc_html__( 'Large Height', 'albergo' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'albergo' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'albergo' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'albergo' ),
					'large-width' => esc_html__( 'Large Width', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'albergo' ),
				'parent'        => $post_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array()
			)
		);

		do_action('albergo_elated_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_post_meta', 20 );
}
