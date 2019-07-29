<?php

if ( ! function_exists( 'albergo_elated_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function albergo_elated_general_options_map() {
		
		albergo_elated_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'albergo' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = albergo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'albergo' ),
				'parent'        => $panel_design_style
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'albergo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = albergo_elated_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'albergo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'albergo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'albergo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'albergo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'albergo' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'albergo' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'albergo' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'albergo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'albergo' ),
					'100i' => esc_html__( '100 Thin Italic', 'albergo' ),
					'200'  => esc_html__( '200 Extra-Light', 'albergo' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'albergo' ),
					'300'  => esc_html__( '300 Light', 'albergo' ),
					'300i' => esc_html__( '300 Light Italic', 'albergo' ),
					'400'  => esc_html__( '400 Regular', 'albergo' ),
					'400i' => esc_html__( '400 Regular Italic', 'albergo' ),
					'500'  => esc_html__( '500 Medium', 'albergo' ),
					'500i' => esc_html__( '500 Medium Italic', 'albergo' ),
					'600'  => esc_html__( '600 Semi-Bold', 'albergo' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'albergo' ),
					'700'  => esc_html__( '700 Bold', 'albergo' ),
					'700i' => esc_html__( '700 Bold Italic', 'albergo' ),
					'800'  => esc_html__( '800 Extra-Bold', 'albergo' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'albergo' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'albergo' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'albergo' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'albergo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'albergo' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'albergo' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'albergo' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'albergo' ),
					'greek'        => esc_html__( 'Greek', 'albergo' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'albergo' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'albergo' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'albergo' ),
				'parent'      => $panel_design_style
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'albergo' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'albergo' ),
				'parent'      => $panel_design_style
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'albergo' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'albergo' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'albergo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_boxed_container"
				)
			)
		);
		
			$boxed_container = albergo_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				albergo_elated_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'albergo' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'albergo' ),
						'parent'      => $boxed_container
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'albergo' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'albergo' ),
						'parent'      => $boxed_container
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'albergo' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'albergo' ),
						'parent'      => $boxed_container
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'albergo' ),
						'description'   => esc_html__( 'Choose background image attachment', 'albergo' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'albergo' ),
							'fixed'  => esc_html__( 'Fixed', 'albergo' ),
							'scroll' => esc_html__( 'Scroll', 'albergo' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'albergo' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_paspartu_container"
				)
			)
		);
		
			$paspartu_container = albergo_elated_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				albergo_elated_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'albergo' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'albergo' ),
						'parent'      => $paspartu_container
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'albergo' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'albergo' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				albergo_elated_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'albergo' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'albergo' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				albergo_elated_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'albergo' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'eltd-grid-1300',
				'label'         => esc_html__( 'Initial Width of Content', 'albergo' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'albergo' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltd-grid-1300' => esc_html__( '1300px - default', 'albergo' ),
					'eltd-grid-1100' => esc_html__( '1100px', 'albergo' ),
					'eltd-grid-1200' => esc_html__( '1200px', 'albergo' ),
					'eltd-grid-1000' => esc_html__( '1000px', 'albergo' ),
					'eltd-grid-800'  => esc_html__( '800px', 'albergo' )
				)
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'albergo' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'albergo' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = albergo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'albergo' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'albergo' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'albergo' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = albergo_elated_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				albergo_elated_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'albergo' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'albergo' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#eltd_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = albergo_elated_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					albergo_elated_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'albergo' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = albergo_elated_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'albergo' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'albergo' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = albergo_elated_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					albergo_elated_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'albergo' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					albergo_elated_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'albergo' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					albergo_elated_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'albergo' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'albergo' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'albergo' ),
				'parent'        => $panel_settings
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'albergo' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'albergo' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = albergo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'albergo' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'albergo' ),
				'parent'      => $panel_custom_code
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'albergo' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'albergo' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = albergo_elated_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'albergo' )
			)
		);
		
		albergo_elated_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'albergo' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'albergo' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'albergo_elated_options_map', 'albergo_elated_general_options_map', 1 );
}

if ( ! function_exists( 'albergo_elated_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function albergo_elated_page_general_style( $style ) {
		$current_style = '';
		$page_id       = albergo_elated_get_page_id();
		$class_prefix  = albergo_elated_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = albergo_elated_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = albergo_elated_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = albergo_elated_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = albergo_elated_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltd-boxed .eltd-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}

		// paspartoo
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_color = albergo_elated_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = albergo_elated_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( albergo_elated_string_ends_with( $paspartu_width, '%' ) || albergo_elated_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.eltd-paspartu-enabled .eltd-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$paspartu_responsive_width = albergo_elated_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( albergo_elated_string_ends_with( $paspartu_responsive_width, '%' ) || albergo_elated_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . albergo_elated_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}

		// inner boxed

		$class_prefix_with_single  = albergo_elated_get_unique_page_class( $page_id, true );

		$inner_boxed_background_style = array();

		$inner_boxed_page_background_color = albergo_elated_get_meta_field_intersect( 'page_inner_background_color', $page_id );
		if ( ! empty( $inner_boxed_page_background_color ) ) {
			$inner_boxed_background_style['background-color'] = $inner_boxed_page_background_color;
		}

		$inner_boxed_page_margin = albergo_elated_get_meta_field_intersect( 'page_inner_margin_top', $page_id );
		if ( ! empty( $inner_boxed_page_margin ) ) {
			$inner_boxed_background_style['margin-top'] = albergo_elated_filter_px($inner_boxed_page_margin).'px';
		}

		$inner_boxed_page_padding = albergo_elated_get_meta_field_intersect( 'page_inner_padding', $page_id );
		if ( ! empty( $inner_boxed_page_padding ) ) {
			$inner_boxed_background_style['padding-left'] = albergo_elated_filter_px($inner_boxed_page_padding).'px';
			$inner_boxed_background_style['padding-right'] = albergo_elated_filter_px($inner_boxed_page_padding).'px';
		}

		$inner_boxed_background_selector = array(
			$class_prefix_with_single . '.eltd-inner-boxed .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
			$class_prefix_with_single . '.eltd-inner-boxed .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner');

		if ( ! empty( $inner_boxed_background_style ) ) {
			$current_style .= albergo_elated_dynamic_css( $inner_boxed_background_selector, $inner_boxed_background_style );
		}
		
		$current_style = $current_style . $style;

		// inner boxed responsive
		$inner_boxed_background_style_media = array();
		$inner_boxed_media_res_start = '@media only screen and (max-width: 768px) {';
		$inner_boxed_media_res_end   = '}';

		if ( ! empty( $inner_boxed_page_margin ) &&  albergo_elated_filter_px($inner_boxed_page_margin) < '-20') {
			$inner_boxed_background_style_media['margin-top'] = '-20px';
		}

		if ( ! empty( $inner_boxed_background_style_media ) ) {
			$current_style .= $inner_boxed_media_res_start . albergo_elated_dynamic_css( $inner_boxed_background_selector, $inner_boxed_background_style_media ) . $inner_boxed_media_res_end;
		}
		
		return $current_style;
	}
	
	add_filter( 'albergo_elated_add_page_custom_style', 'albergo_elated_page_general_style' );
}