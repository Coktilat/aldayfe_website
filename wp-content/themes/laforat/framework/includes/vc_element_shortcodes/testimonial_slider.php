<?php
vc_map ( array (
	"name" => 'Testimonial Slider',
	"base" => "testimonial_slider",
	"icon" => "tb-icon-for-vc",
	"category" => __ ( 'laforat', 'laforat' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Template", 'laforat'),
            "param_name" => "tpl",
            "value" => array(
                "Template 1( Testimonial no Thumbnail)" => "tpl",
				"Template 2( Thumbnail has Thumbnail )" => "tpl2"
            ),
            "std"=>"tpl",
            "description" => __('Select template for title.', 'laforat')
        ),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Count', 'laforat' ),
				"param_name" => "posts_per_page",
				'value' => '',
				"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( 'Order by', 'laforat' ),
				"param_name" => "orderby",
				"value" => array (
						"None" => "none",
						"Title" => "title",
						"Date" => "date",
						"ID" => "ID"
				),
				"description" => __ ( 'Order by ("none", "title", "date", "ID").', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( 'Order', 'laforat' ),
				"param_name" => "order",
				"value" => Array (
						"None" => "none",
						"ASC" => "ASC",
						"DESC" => "DESC"
				),
				"description" => __ ( 'Order ("None", "Asc", "Desc").', 'laforat' )
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'laforat'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
		),
		array(
			"type" => "checkbox", 
			"heading" => __('Crop image', 'vineyard'),
			"param_name" => "crop_image",
			"value" => array(
				__("Yes, please", 'laforat') => 1
			),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl','tpl')
		      ),
			"group" => __("Template", 'laforat'),
			"description" => __('Crop or not crop image on your Post.', 'laforat')
		),
		array(
			"type" => "textfield",
			"heading" => __('Width image', 'laforat'),
			"param_name" => "width_image",
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl','tpl')
		      ),
			"group" => __("Template", 'laforat'),
			"description" => __('Enter the width of image. Default: 557.', 'laforat')
		),
		array(
			"type" => "textfield",
			"heading" => __('Height image', 'laforat'),
			"param_name" => "height_image",
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl','tpl')
		      ),
			"group" => __("Template", 'laforat'),
			"description" => __('Enter the height of image. Default: 370.', 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Image", 'laforat'),
			"param_name" => "show_image",
			"value" => array (
				__ ( "Yes, please", 'laforat' ) => true
			),
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not image of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Title", 'laforat'),
			"param_name" => "show_title",
			"value" => array (
				__ ( "Yes, please", 'laforat' ) => true
			),
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not title of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Excerpt", 'laforat'),
			"param_name" => "show_excerpt",
			"value" => array (
				__ ( "Yes, please", 'laforat' ) => true
			),
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not excerpt of post in this element.", 'laforat')
		),
	)
));