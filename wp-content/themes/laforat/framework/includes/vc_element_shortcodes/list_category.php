<?php
if(class_exists('Woocommerce')){
    vc_map(array(
        "name" => __("Category Slider", 'laforat'),
        "base" => "list_category",
        "class" => "ro-category-slider",
        "category" => __('laforat', 'laforat'),
        'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
				array(
					"type" => "dropdown",
					"class" => "",
					"heading" => __("Template", 'laforat'),
					"param_name" => "tpl",
					"value" => array(
						__("Template 1 (Category Width Columns)",'laforat') => "tpl1",
						__("Template 2 (Category No Slider)",'laforat') => "tpl2",
					),
					"description" => __('Select template in this element.', 'laforat')
				),
			 array(
                "type" => "checkbox",
                "heading" => __('Show Title', 'laforat'),
                "param_name" => "show_title",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "description" => __('Show or hide title of post on your category.', 'laforat')
            ),
			 array(
                "type" => "checkbox",
                "heading" => __('Show Description ', 'laforat'),
                "param_name" => "show_description",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "description" => __('Show or hide description of products on your category.', 'laforat')
            ),
			 array(
                "type" => "checkbox",
                "heading" => __('Show Number ', 'laforat'),
                "param_name" => "show_number",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "description" => __('Show or hide number of products on your category.', 'laforat')
            ),
			 array(
                "type" => "checkbox",
                "heading" => __('Show Image', 'laforat'),
                "param_name" => "show_image",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "description" => __('Show or hide images of post on your category.', 'laforat')
            ),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Style", 'laforat'),
				"param_name" => "style",
				"value" => array(
					"Slider( Default )" => "sty_slider",
					"Block( Category No Slider )" => "sty_block",
				),
				"dependency" => array(
					"element" => "tpl",
					"value" => array('tpl','tpl2')
				  ),
				 "group" => __("Template", 'laforat'),
				"description" => __('Select type of display blog in this element.', 'laforat')
			),
			 array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Number Category", 'laforat'),
                "param_name" => "number_cat",
                "value" => "",
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
            ),
			  array(
                "type" => "checkbox",
                "heading" => __('Show View More Of Category', 'laforat'),
                "param_name" => "show_view_more_cat",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "std"=>0,
                "description" => __('Show view more button.', 'laforat')
            ),
			array(
				"type" => "checkbox", 
				"heading" => __('Crop image', 'vineyard'),
				"param_name" => "crop_image",
				"value" => array(
					__("Yes, please", 'laforat') => 1
				),
				"dependency" => array(
					"element" => "tpl",
					"value" => array('tpl','tpl2')
				  ),
				"group" => __("Template", 'laforat'),
				"description" => __('Crop or not crop image on your Post.', 'laforat')
			),
			array(
				"type" => "textfield",
				"heading" => __('Width image', 'laforat'),
				"param_name" => "width_image",
				"dependency" => array(
					"element" => "tpl",
					"value" => array('tpl','tpl2')
				  ),
				"group" => __("Template", 'laforat'),
				"description" => __('Enter the width of image. Default: 557.', 'laforat')
			),
			array(
				"type" => "textfield",
				"heading" => __('Height image', 'laforat'),
				"param_name" => "height_image",
				"dependency" => array(
					"element" => "tpl",
					"value" => array('tpl','tpl2')
				  ),
				"group" => __("Template", 'laforat'),
				"description" => __('Enter the height of image. Default: 370.', 'laforat')
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __("Button Text", 'laforat'),
				"param_name" => "button_text",
				"value" => "",
				"dependency" => array(
					"element" => "tpl",
					"value" => array('tpl','tpl2')
				  ),
				 "group" => __("Template", 'laforat'),
				"description" => __("Please, enter title in this element.", 'laforat')
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
