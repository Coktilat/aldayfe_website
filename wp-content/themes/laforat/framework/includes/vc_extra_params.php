<?php
//Add extra params vc_row
vc_add_param ( "vc_row", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Id Section", 'laforat' ),
		"param_name" 	=> "id_section",
		"value" 		=> "",
		"description" 	=> __( "Please, Enter row id section.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Type", 'laforat' ),
		"admin_label" 	=> true,
		"param_name" 	=> "type",
		"value" 		=> array (
							"Default" => "default",
							"Background Video" => "custom-bg-video"
						),
		"description" 	=> __( "Select type of this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> __( "Text Color", 'laforat' ),
		"param_name" 	=> "text_color",
		"value" 		=> "",
		"description" 	=> __( "Select color for content in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> __( "Heading Color", 'laforat' ),
		"param_name" 	=> "heading_color",
		"value" 		=> "",
		"description" 	=> __( "Select color for all heading in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> __( "Link Color", 'laforat' ),
		"param_name" 	=> "link_color",
		"value" 		=> "",
		"description" 	=> __( "Select color for all link in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> __( "Link Color Hover", 'laforat' ),
		"param_name" 	=> "link_color_hover",
		"value" 		=> "",
		"description" 	=> __( "Select color for all link hover in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Text Align", 'laforat' ),
		"param_name" 	=> "text_align",
		"value" 		=> array (
							"No" => "text-align-none",
							"Left" => "text-left",
							"Right" => "text-right",
							"Center" => "text-center"
						),
		"description" 	=> __( "Select text align for all columns in this row.", 'laforat' )
) );
vc_add_param ( 'vc_row', array (
		'type' 			=> 'checkbox',
		'heading' 		=> __("Text Middle", 'laforat'),
		'param_name' 	=> 'text_middle',
		"value" 		=> array (
							__( "Yes, please", 'laforat' )  => 1
						),
		'description' 	=> __("Set text middle for all columns in this row.", 'laforat')
) );
vc_add_param ( 'vc_row', array (
		'type' 			=> 'checkbox',
		'heading' 		=> __("Content Full Width", 'laforat'),
		'param_name' 	=> 'content_full_width',
		"value" 		=> array (
							__( "Yes, please", 'laforat' )  => 1
						),
		'description' 	=> __("Set content full width of this row.", 'laforat')
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> __( "Same Height", 'laforat' ),
		"param_name" 	=> "same_height",
		"value" 		=> array (
							__( "Yes, please", 'laforat' )  => 1
						),
		"description" 	=> __( "Set the same height for all column in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Effect", 'laforat' ),
		"param_name" 	=> "animation",
		"value" 		=> array(
							"No" => "animation-none",
							"Top to bottom" => "top-to-bottom",
							"Bottom to top" => "bottom-to-top",
							"Left to right" => "left-to-right",
							"Right to left" => "right-to-left",
							"Appear from center" => "appear"
						),
		"description" 	=> __( "Select effect in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> __( "Enable parallax", 'laforat' ),
		"param_name" 	=> "enable_parallax",
		"value" 		=> array (
							__( "Yes, please", 'laforat' )  => 1,
						),
		"description" 	=> __( "Enable parallax effect in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Parallax speed", 'laforat' ),
		"param_name" 	=> "parallax_speed",
		"value" 		=> "0.5",
		"description" 	=> __( "Please, Enter parallax speed in this row.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Enable Overlay", 'laforat' ),
		"param_name" 	=> "enable_overlay",
		"value" 		=> array (
							__( "No", 'laforat' ) => 'false',
							__( "Yes, please", 'laforat' ) => 'true',
						),
		"description" 	=> __( "Enable overlay on background.", 'laforat' )
) );
vc_add_param ( "vc_row", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" 		=> __( "Overlay Background Color", 'laforat' ),
		"param_name" => "background_overlay",
		"value" => "",
		"dependency" => array (
				"element" => "enable_overlay",
				"value" => array('true')
		)
) );

vc_add_param ( "vc_row", array (
		"type" => "attach_image",
		"class" => "",
		"heading" => __( "Video poster", 'laforat' ),
		"param_name" => "poster",
		"value" => "",
		"dependency" => array (
				"element" => "type",
				"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __( "Loop", 'laforat' ),
		"param_name" => "loop",
		"value" => array (
				__( "Yes, please", 'laforat' )  => true,
		),
		"dependency" => array (
			"element" => "type",
			"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __( "Autoplay", 'laforat' ),
		"param_name" => "autoplay",
		"value" => array (
				__( "Yes, please", 'laforat' )  => true,
		),
		"dependency" => array (
			"element" => "type",
			"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __( "Muted", 'laforat' ),
		"param_name" => "muted",
		"value" => array (
				__( "Yes, please", 'laforat' )  => true,
		),
		"dependency" => array (
			"element" => "type",
			"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __( "Controls", 'laforat' ),
		"param_name" => "controls",
		"value" => array (
				__( "Yes, please", 'laforat' )  => true,
		),
		"dependency" => array (
			"element" => "type",
			"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __( "Show Button Play", 'laforat' ),
		"param_name" => "show_btn",
		"value" => array (
				__( "Yes, please", 'laforat' )  => true,
		),
		"dependency" => array (
			"element" => "type",
			"value" => array('custom-bg-video')
		)
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Video background (mp4)", 'laforat' ),
		"param_name" 	=> "bg_video_src_mp4",
		"value" 		=> "",
		"dependency" 	=> array (
							"element" 	=> "type",
							"value" 	=> array('custom-bg-video')
						),
		"description" 	=> __( "Please, Enter url video (mp4) for background in this row.", 'laforat' )
) );

vc_add_param ( "vc_row", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Video background (ogv)", 'laforat' ),
		"param_name" 	=> "bg_video_src_ogv",
		"value" 		=> "",
		"dependency" 	=> array (
							"element" 	=> "type",
							"value" 	=> array('custom-bg-video')
						),
		"description" 	=> __( "Please, Enter url video (ogv) for background in this row.", 'laforat' )
) );

vc_add_param ( "vc_row", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Video background (webm)", 'laforat' ),
		"param_name" 	=> "bg_video_src_webm",
		"value" 		=> "",
		"dependency" 	=> array (
							"element" 	=> "type",
							"value" 	=> array('custom-bg-video')
						),
		"description" 	=> __( "Please, Enter url video (webm) for background in this row.", 'laforat' )
) );
vc_remove_param( "vc_row", "full_width" );
//Add extra params vc_column
vc_add_param ( "vc_column", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Effect", 'laforat' ),
		"param_name" 	=> "animation",
		"value" 		=> array(
							"No" => "animation-none",
							"Top to bottom" => "top-to-bottom",
							"Bottom to top" => "bottom-to-top",
							"Left to right" => "left-to-right",
							"Right to left" => "right-to-left",
							"Appear from center" => "appear"
						),
		"description" 	=> __( "Select effect in this column.", 'laforat' )
) );
vc_add_param ( "vc_column", array (
		"type" 			=> "dropdown",
		"class" 		=> "",
		"heading" 		=> __( "Text Align", 'laforat' ),
		"param_name" 	=> "text_align",
		"value" 		=> array (
							"No" => "text-align-none",
							"Left" => "text-left",
							"Right" => "text-right",
							"Center" => "text-center"
						),
		"description" 	=> __( "Select text align in this column.", 'laforat' )
) );
//Add extra params vc_tabs
vc_add_param ( "vc_tabs", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __( "Active tab", 'laforat' ),
		"param_name" => "active_tab",
		"value" => "",
		"description" => __( "Enter section number to be active on load or enter false to collapse all sections..", 'laforat' )
) );
//Add extra params vc_tab
vc_add_param ( "vc_tab", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __( "Icon", 'laforat' ),
		"param_name" => "icon",
		"value" => "",
		"description" => __( "Icon class.", 'laforat' )
) );
//Add extra params vc_accordion_tab
vc_add_param ( "vc_accordion_tab", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __( "Background Title", 'laforat' ),
		"param_name" => "background",
		"value" => "",
		"description" => __( "Background color of title.", 'laforat' )
) );
vc_add_param ( "vc_accordion_tab", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __( "Background Title Active", 'laforat' ),
		"param_name" => "background_active",
		"value" => "",
		"description" => __( "Background color of title active.", 'laforat' )
) );
vc_add_param ( "vc_accordion_tab", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __( "Border Title", 'laforat' ),
		"param_name" => "border",
		"value" => "",
		"description" => __( "Border color of title.", 'laforat' )
) );
vc_add_param ( "vc_accordion_tab", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __( "Color Title", 'laforat' ),
		"param_name" => "color",
		"value" => "",
		"description" => __( "Color of title.", 'laforat' )
) );
vc_add_param ( "vc_accordion_tab", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __( "Background Content", 'laforat' ),
		"param_name" => "background_content",
		"value" => "",
		"description" => __( "Background color of Content.", 'laforat' )
) );