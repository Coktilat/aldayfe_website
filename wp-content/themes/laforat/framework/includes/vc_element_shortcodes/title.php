<?php

add_action('init', 'title_integrateWithVC');

function title_integrateWithVC() {
    vc_map(array(
        "name" => __("Title", 'laforat'),
        "base" => "title",
        "class" => "title",
        "category" => __('laforat', 'laforat'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title", 'laforat'),
                "param_name" => "title",
                "value" => "",
                "description" => __("Content.", 'laforat')
            ),
			array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Sub Title", 'laforat'),
                "param_name" => "sub_title",
                "value" => "",
                "description" => __("Content.", 'laforat')
            ),
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => __("Image", 'laforat'),
				"param_name" => "image_1",
				"value" => "",
				"description" => __("Select image in this element", 'laforat')
			),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Font Size", 'laforat'),
                "param_name" => "font_size",
                "value" => "",
                "description" => __("Font Size.", 'laforat')
            ),
            array (
                "type" => "colorpicker",
                "heading" => __( 'Color', 'laforat' ),
                "param_name" => "color",
                "value" => '',
                "description" => __( 'Color', 'laforat' ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Template", 'laforat'),
                "param_name" => "title_tpl",
                "value" => array(
                    __("Title Separator ( position dependent by text-align)",'laforat') => "tpl3",
                    __("Title Underline style 1 (Single diamond)",'laforat') => "tpl1",
                    __("Title Underline style without diamond",'laforat') => "tpl2",
					__("Sub Title",'laforat') => "tpl4",
                    __("None",'laforat') => "none",
					__("Title of Instagram",'laforat') => "tpl5",
					__("Title and sub title padding",'laforat') => "tpl6",
					__("Title and sub title padding best",'laforat') => "tpl7",
                ),
                "std"=>"tpl3",
                "description" => __('Select template for title.', 'laforat')
            ),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Icon", 'laforat'),
				"param_name" => "icon",
				"value" => "",
				"std" => "fa fa-",
				"dependency" => array(
					"element" => "title_tpl",
					"value" => array('tpl5')
				  ),
				"group" => __("Template", 'laforat'),
				"description" => __("Please, enter class icon in this element.", 'laforat')
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
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'laforat'),
                "param_name" => "animation",
                "value" => array(
                    __("No",'laforat') => "",
                    __("Top to bottom",'laforat') => "top-to-bottom",
                    __("Bottom to top",'laforat') => "bottom-to-top",
                    __("Left to right",'laforat') => "left-to-right",
                    __("Right to left",'laforat') => "right-to-left",
                    __("Appear from center",'laforat') => "appear"
                ),
                "description" => __("Animation", 'laforat')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'laforat'),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra Class.", 'laforat')
            ),
        )
    ));
}
