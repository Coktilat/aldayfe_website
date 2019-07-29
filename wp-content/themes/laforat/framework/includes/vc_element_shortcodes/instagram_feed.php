<?php
vc_map(array(
	"name" => __("Instagram Feed", 'laforat'),
	"base" => "instagram_feed",
	"category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Access Token", 'laforat'),
			"param_name" => "access_token",
			"value" => "",
			"description" => __("Please, enter <a href='http://instagram.pixelunion.net/' title'What is it?'>access token</a> in this element, leave blank for demo.", 'laforat')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Show Photos From", 'laforat'),
			"param_name" => "tpl",
			"value" => array(
				__("Popular", 'laforat')=> "popular",
				__("Hashtag", 'laforat')=> "tagged",
				__("Location", 'laforat') => "location",
				__("User ID", 'laforat')=> 'user'
			),
			"description" => __('Select template in this element.', 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("TagName/ LocationId/ UserId", 'laforat'),
			"param_name" => "item",
			"value" => "",
			"description" => __( "Please enter tagname/ locationId/ userId dependent of type 'Show Photos From'", 'laforat' )
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Limit", 'laforat'),
			"param_name" => "limit",
			"value" => "",
			"description" => __( "Maximum number of Images to add.", 'laforat' )
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Choose image size", 'laforat'),
			"param_name" => "thumb",
			"value" => array(
				__("Thumbnail(150x150)",'laforat') => "thumbnail",
				__("Low Resolution (320x320)",'laforat') => "low_resolution",
				__("Standar (612x612)",'laforat') => "standard_resolution"
			),
			"description" => __('Select thumbnail size in this element.', 'laforat')
		),
		array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Columns", 'laforat'),
				"param_name" => "columns",
				"value" => array(
					__("6 Columns",'laforat') => "6",
					__("5 Columns",'laforat') => "5",
					__("4 Columns",'laforat') => "4",
					__("3 Columns",'laforat') => "3"
				),
				"description" => __('Select columns display in this element.', 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'laforat'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
		),
	)
));
