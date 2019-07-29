<?php
vc_map ( array (
	"name" => 'Team',
	"base" => "list_team",
	"icon" => "tb-icon-for-vc",
	"category" => __('laforat','laforat' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Align", 'laforat'),
            "param_name" => "el_align",
            "value" => array(
                __("Left",'laforat') => "text-left",
                __("Right",'laforat')=> "text-right",
                __("Center",'laforat')=> "text-center"
            ),
            "std" => "text-center",
            "description" => __("Align", 'laforat')
        ),
		array (
				"type" => "textfield",
				"heading" => __( 'Count', 'laforat' ),
				"param_name" => "posts_per_page",
				'value' => '',
				"description" => __( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __( 'Order by', 'laforat' ),
				"param_name" => "orderby",
				"value" => array (
						__("None",'laforat') => "none",
						__("Title",'laforat') => "title",
						__("Date",'laforat') => "date",
						__("ID",'laforat') => "ID"
				),
				"description" => __( 'Order by ("none", "title", "date", "ID").', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __( 'Order', 'laforat' ),
				"param_name" => "order",
				"value" => Array (
						__("None",'laforat') => "none",
						__("ASC",'laforat') => "ASC",
						__("DESC",'laforat') => "DESC"
				),
				"description" => __( 'Order ("None", "Asc", "Desc").', 'laforat' )
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'laforat'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Image", 'laforat'),
			"param_name" => "show_image",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not image of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Title", 'laforat'),
			"param_name" => "show_title",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not title of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Experience", 'laforat'),
			"param_name" => "show_experience",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std" => true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not title of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Social", 'laforat'),
			"param_name" => "show_social",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std" => true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not excerpt of post in this element.", 'laforat')
		),
	)
));