<?php
vc_map(array(
	"name" => __("Service Box", 'laforat'),
	"base" => "service_box",
	"category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Template", 'laforat'),
			"param_name" => "tpl",
			"value" => array(
				__("Default",'laforat') => "tpl",
				__("Template 1 (Icon Font)",'laforat') => "tpl1",
				__("Template 2 ( Images )",'laforat') => "tpl2",
				__("Template 3 ( Count Up )",'laforat') => "tpl3"
			),
			"description" => __('Select template in this element.', 'laforat')
		),
		array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Align", 'laforat'),
            "param_name" => "el_align",
            "value" => array(
                __("Left",'laforat') => "text-left",
                __("Right",'laforat') => "text-right",
                __("Center",'laforat') => "text-center"
            ),
            "std" => "text-center",
            "description" => __("Align", 'laforat')
        ),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Icon", 'laforat'),
			"param_name" => "icon",
			"value" => "",
			"std" => "fa fa-",
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl','tpl1')
		      ),
			"description" => __("Please, enter class icon in this element.", 'laforat')
		),
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "image_1",
            "value" => "",
            "dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl2')
		      ),
		    "group" => __("Template", 'laforat'),
            "description" => __("Select image in this element", 'laforat')
        ),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'laforat'),
			"param_name" => "title",
			"value" => "",
			"description" => __("Please, enter title in this element.", 'laforat')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Description", 'laforat'),
			"param_name" => "content",
			"value" => "",
			"description" => __("Please, enter description in this element.", 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Link", 'laforat'),
			"param_name" => "ex_link",
			"value" => "",
			"description" => __("Please, enter extra link in this element.", 'laforat')
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
