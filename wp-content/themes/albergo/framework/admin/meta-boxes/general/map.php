<?php

if ( ! function_exists( 'albergo_elated_map_general_meta' ) ) {
	function albergo_elated_map_general_meta() {
		
		$general_meta_box = albergo_elated_add_meta_box(
			array(
				'scope' => apply_filters( 'albergo_elated_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'albergo' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'albergo' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'albergo' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'albergo' ),
				'parent'        => $general_meta_box
			)
		);

		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_page_content_over_title_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content over title area', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will put page content over page title area', 'albergo' ),
				'parent'        => $general_meta_box
			)
		);


		$eltd_content_padding_group = albergo_elated_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'albergo' ),
				'description' => esc_html__( 'Define styles for Content area', 'albergo' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltd_content_padding_row = albergo_elated_add_admin_row(
				array(
					'name'   => 'eltd_content_padding_row',
					'next'   => true,
					'parent' => $eltd_content_padding_group
				)
			);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'   => 'eltd_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'albergo' ),
						'parent' => $eltd_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'    => 'eltd_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'albergo' ),
						'parent'  => $eltd_content_padding_row,
						'options' => albergo_elated_get_yes_no_select_array( false )
					)
				);
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose background color for page content', 'albergo' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'    => 'eltd_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'albergo' ),
				'parent'  => $general_meta_box,
				'options' => albergo_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_boxed_container_meta',
						'no'  => '#eltd_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = albergo_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'eltd_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'albergo' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'albergo' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'albergo' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'albergo' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'albergo' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'albergo' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'          => 'eltd_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'albergo' ),
						'description'   => esc_html__( 'Choose background image attachment', 'albergo' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'albergo' ),
							'fixed'  => esc_html__( 'Fixed', 'albergo' ),
							'scroll' => esc_html__( 'Scroll', 'albergo' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/

		/***************** Inner Boxed Layout - begin **********************/

		albergo_elated_add_meta_box_field(
			array(
				'name'    => 'eltd_inner_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Inner Layout', 'albergo' ),
				'parent'  => $general_meta_box,
				'options' => albergo_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_inner_boxed_container_meta',
						'no'  => '#eltd_inner_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_inner_boxed_container_meta'
					)
				)
			)
		);

			$inner_boxed_container_meta = albergo_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'inner_boxed_container_meta',
					'hidden_property' => 'eltd_inner_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);

				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_page_inner_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Inner Background Color', 'albergo' ),
						'description' => esc_html__( 'Choose the page inner background color outside box', 'albergo' ),
						'parent'      => $inner_boxed_container_meta
					)
				);

				$eltd_inner_boxed_padding_group = albergo_elated_add_admin_group(
					array(
						'name'        => 'inner_boxed_padding_group',
						'title'       => esc_html__( 'Page Inner Style', 'albergo' ),
						'description' => esc_html__( 'Define style for inner boxed area', 'albergo' ),
						'parent'      => $inner_boxed_container_meta
					)
				);

					$eltd_content_padding_row = albergo_elated_add_admin_row(
						array(
							'name'   => 'eltd_content_padding_row',
							'next'   => true,
							'parent' => $eltd_inner_boxed_padding_group
						)
					);

						albergo_elated_add_meta_box_field(
							array(
								'name'        => 'eltd_page_inner_margin_top_meta',
								'type'        => 'textsimple',
								'label'       => esc_html__( 'Margin Top', 'albergo' ),
								'parent'      => $eltd_content_padding_row,
								'args'        => array(
									'col_width' => 2,
									'suffix'    => 'px'
								)
							)
						);

						albergo_elated_add_meta_box_field(
							array(
								'name'   => 'eltd_page_inner_padding_meta',
								'type'   => 'textsimple',
								'label'  => esc_html__( 'Left/Right Padding', 'albergo' ),
								'parent' => $eltd_content_padding_row,
								'args'   => array(
									'suffix' => 'px'
								)
							)
						);

		/***************** Inner Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'albergo' ),
				'parent'        => $general_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#eltd_eltd_paspartu_container_meta',
						'no'  => '#eltd_eltd_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_eltd_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = albergo_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltd_paspartu_container_meta',
					'hidden_property' => 'eltd_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'albergo' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'albergo' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'albergo' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'albergo' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'albergo' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'albergo' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				albergo_elated_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltd_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'albergo' ),
						'options'       => albergo_elated_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'albergo' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'albergo' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'albergo' ),
					'eltd-grid-1100' => esc_html__( '1100px', 'albergo' ),
					'eltd-grid-1300' => esc_html__( '1300px', 'albergo' ),
					'eltd-grid-1200' => esc_html__( '1200px', 'albergo' ),
					'eltd-grid-1000' => esc_html__( '1000px', 'albergo' ),
					'eltd-grid-800'  => esc_html__( '800px', 'albergo' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'albergo' ),
				'parent'        => $general_meta_box,
				'options'       => albergo_elated_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_page_transitions_container_meta',
						'no'  => '#eltd_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = albergo_elated_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'eltd_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				albergo_elated_add_meta_box_field(
					array(
						'name'        => 'eltd_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'albergo' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'albergo' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => albergo_elated_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#eltd_page_transition_preloader_container_meta',
								'no'  => '#eltd_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#eltd_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = albergo_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'eltd_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					albergo_elated_add_meta_box_field(
						array(
							'name'   => 'eltd_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'albergo' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = albergo_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'albergo' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'albergo' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = albergo_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					albergo_elated_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltd_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'albergo' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'albergo' ),
								'albergo'        		=> esc_html__( 'Albergo', 'albergo' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'albergo' ),
								'pulse'                 => esc_html__( 'Pulse', 'albergo' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'albergo' ),
								'cube'                  => esc_html__( 'Cube', 'albergo' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'albergo' ),
								'stripes'               => esc_html__( 'Stripes', 'albergo' ),
								'wave'                  => esc_html__( 'Wave', 'albergo' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'albergo' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'albergo' ),
								'atom'                  => esc_html__( 'Atom', 'albergo' ),
								'clock'                 => esc_html__( 'Clock', 'albergo' ),
								'mitosis'               => esc_html__( 'Mitosis', 'albergo' ),
								'lines'                 => esc_html__( 'Lines', 'albergo' ),
								'fussion'               => esc_html__( 'Fussion', 'albergo' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'albergo' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'albergo' )
							)
						)
					);
					
					albergo_elated_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltd_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'albergo' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					albergo_elated_add_meta_box_field(
						array(
							'name'        => 'eltd_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'albergo' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'albergo' ),
							'options'     => albergo_elated_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		albergo_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'albergo' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'albergo' ),
				'parent'      => $general_meta_box,
				'options'     => albergo_elated_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'albergo_elated_meta_boxes_map', 'albergo_elated_map_general_meta', 10 );
}