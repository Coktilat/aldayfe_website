<?php
vc_map(array(
	"name" => __("Login Form", 'laforat'),
	"base" => "login_form",
	"category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Link Facebook", 'laforat'),
			"param_name" => "link_facebook",
			"value" => "",
			"description" => __( "Enter Link Nextend Facebook Connect.", 'laforat' )
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Link Twitter", 'laforat'),
			"param_name" => "link_twitter",
			"value" => "",
			"description" => __( "Enter Link Nextend Twitter Connect.", 'laforat' )
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