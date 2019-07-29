<?php
vc_map(array(
	"name" => __("Info Box", 'laforat'),
	"base" => "info_box",
	"category" => __('laforat', 'laforat'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Template", 'laforat'),
			"param_name" => "tpl",
			"value" => array(
				__("Template 1 (Text on the left)",'laforat') => "tpl1",
				__("Template 2 (Text on the right)",'laforat') => "tpl2",
				__("Template 3 (Text on images)",'laforat') => "tpl3",
				__("Template 4 (Text on the images no border)",'laforat') => "tpl4",
				__("Template 5 (Show count product on images )",'laforat') => "tpl5",
				__("Template 6 (Vertical align style as home page 1)",'laforat') => "tpl6",
				__("Template 7 (Big column ~ new trend)",'laforat') => "tpl7",
				__("Template 8 (Sub Title)",'laforat') => "tpl8",
			),
			"description" => __('Select template in this element.', 'laforat')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Style", 'bencher'),
			"param_name" => "style",
			"value" => array(
				"Style 1" => "style_1",
				"Text Center" => "txt_center",
				"Text Left" => "txt_left",
				"Text Right" => "txt_right",
			),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl1')
		      ),
			"description" => __('Select style for text in this element.', 'laforat')
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => __("Heading 1", 'laforat'),
			"param_name" => "heading_1",
			"value" => "",
			"group" => __("Content & image", 'laforat'),
			"description" => __("Please, Enter text of heading.", 'laforat')
		),
		 array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Sub Title", 'laforat'),
			"param_name" => "title",
			"value" => "",
			"group" => "Image 1",
            "group" => __("Content & image", 'laforat'),
			"description" => __("Content.", 'laforat')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Description", 'laforat'),
			"param_name" => "content",
			"value" => "",
			"group" => __("Content & image", 'laforat'),
			"description" => __("Please, enter description in this element.", 'laforat')
		),
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "image_1",
            "value" => "",
            "group" => "Image 1",
            "group" => __("Content & image", 'laforat'),
            "description" => __("Select image in this element", 'laforat')
        ),
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "image_2",
            "value" => "",
            "group" => "Image 2",
            "group" => __("Content & image", 'laforat'),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl4')
		      ),
            "description" => __("Select image in this element", 'laforat')
        ),
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "image_3",
            "value" => "",
            "group" => "Image 1",
            "group" => __("Content & image", 'laforat'),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl4')
		      ),
            "description" => __("Select image in this element", 'laforat')
        ),
		array(
            "type" => "attach_images",
            "class" => "",
            "heading" => __("Image", 'laforat'),
            "param_name" => "image_4",
            "value" => "",
            "group" => "Image 1",
            "group" => __("Content & image", 'laforat'),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl4')
		      ),
            "description" => __("Select image in this element", 'laforat')
        ),
        array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Align image", 'laforat'),
			"param_name" => "align_image1",
			"value" => array(
				__("Center Center",'laforat') => "",
				__("Top Left",'laforat') => "tb-origin-top-left",
				__("Top Right",'laforat') => "tb-origin-top-right",
				__("Top Center",'laforat') => "tb-origin-top-center",
				__("Bottom Left",'laforat') => "tb-origin-bottom-left",
				__("Bottom Right",'laforat') => "tb-origin-bottom-right",
				__("Bottom Center",'laforat') => "tb-origin-bottom-center"
			),
			"group" => __("Content & image", 'laforat'),
			"description" => __('Select template in this element.', 'laforat')
		),
        array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Link Text", 'laforat'),
			"param_name" => "link_text",
			"value" => "",
			"std" =>"",
			"description" => __("Please, Enter read more text in this element. EX: Shop Now", 'laforat')
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
			"heading" => __("Promotion Link Text", 'laforat'),
			"param_name" => "promotion_text",
			"value" => "",
			"std" =>""	,
			"description" => __("Please, Enter read more text in this element. EX: Promotion", 'laforat')
		),
        array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Promotion Link", 'laforat'),
			"param_name" => "promotion_link",
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
