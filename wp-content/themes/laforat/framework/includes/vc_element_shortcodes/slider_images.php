<?php
vc_map(array(
	"name" => __("Slider Images", 'laforat'),
	"base" => "slider_images",
	"category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "images",
            "value" => "",
            "description" => __("Select image in this element", 'laforat')
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
