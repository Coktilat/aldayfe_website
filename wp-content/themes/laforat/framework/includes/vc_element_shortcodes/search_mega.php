<?php
vc_map ( array (
	"name" => 'Custom search mega',
	"base" => "search_mega",
	"icon" => "tb-icon-for-vc",
	"category" => __( 'laforat', 'laforat' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Title", 'laforat'),
            "param_name" => "title",
            "value" => "",
            "description" => __("Option title.", 'laforat')
        ),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Type", 'laforat'),
			"param_name" => "type",
			"value" => array(
				__("Shop",'laforat') => "shop",
				__("Blog",'laforat') => "blog",
			),
			"description" => __('Select type in this element.', 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Hide Empty", 'laforat'),
			"param_name" => "hide_empty",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"description" => __("Whether to hide terms not assigned to any posts.", 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'laforat'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
		)
		
	)
));