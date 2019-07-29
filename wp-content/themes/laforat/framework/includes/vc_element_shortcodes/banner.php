<?php
vc_map ( array (
	"name" => 'Banner Widget',
	"base" => "banner",
	"icon" => "tb-icon-for-vc",
	"category" => __( 'laforat', 'laforat' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Heading", 'laforat'),
            "param_name" => "heading",
            "value" => "",
            "description" => __("Heading.", 'laforat')
        ),
		array(
            "type" => "exploded_textarea",
            "holder" => "div",
            "class" => "",
            "heading" => __("Sub Heading", 'laforat'),
            "param_name" => "sub_head",
            "value" => "",
            "description" => __("Sub Heading.", 'laforat')
        ),
        array(

            "type" => "attach_image",
            "class" => "",
            "heading" => __("Image src", 'laforat'),
            "param_name" => "img_src",
            "value" => "",
            "description" => __("Banner image", 'laforat')
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Link", 'laforat'),
            "param_name" => "link",
            "value" => "",
            "description" => __("Link.", 'laforat')
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