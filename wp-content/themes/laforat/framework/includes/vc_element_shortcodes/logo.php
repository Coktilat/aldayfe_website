<?php

add_action('init', 'jws_theme_logo_integrateWithVC');

function jws_theme_logo_integrateWithVC() {
    vc_map(array(
        "name" => __("Insert Logo", 'laforat'),
        "base" => "logo",
        "class" => "tb-logo",
        "category" => __('laforat', 'laforat'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
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

                "type" => "attach_image",

                "class" => "",

                "heading" => __("Image Logo", 'laforat'),

                "param_name" => "image_logo",

                "value" => "",

                "description" => __("Insert logo image.", 'laforat')

            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'laforat'),
                "param_name" => "animation",
                "value" => array(
                    __("No",'cayto') => "",
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
