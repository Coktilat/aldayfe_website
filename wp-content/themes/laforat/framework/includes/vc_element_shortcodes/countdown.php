<?php

add_action('init', 'tb_countdown_integrateWithVC');

function tb_countdown_integrateWithVC() {
    vc_map(array(
        "name" => __("Countdown", 'laforat'),
        "base" => "tb_countdown",
        "class" => "tb_countdown",
        "category" => __('laforat', 'laforat'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Date end", 'laforat'),
                "param_name" => "date_end",
                "value" => "",
                "description" => __("Ex: 2015/10/20 12:34:56.", 'laforat')
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'laforat'),
                "param_name" => "el_class",
                "value" => "",
                "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
            ),
        )
    ));
}

?>