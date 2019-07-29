<?php
if(class_exists('Woocommerce')){
    vc_map(array(
        "name" => __("Best Seller", 'laforat'),
        "base" => "best_seller",
        "class" => "tb-best-seller",
        "category" => __('laforat', 'laforat'),
        'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'laforat'),
                "param_name" => "el_class",
                "value" => "",
				"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
            ),
			array (
                "type" => "jws_theme_taxonomy",
                "taxonomy" => "product_cat",
                "heading" => __( "Categories", 'laforat' ),
                "param_name" => "product_cat",
                "class" => "",
				"group" => __("Build Query", 'laforat'),
                "description" => __( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'laforat' )
            ),
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => __( "Show", 'laforat' ),
					"param_name" => "show",
					"value" => array (
							__("All Products",'laforat') => "all_products",
							__("Featured Products",'laforat') => "featured",
							__("On-sale Products",'laforat') => "onsale",
                            __("Variable Products",'laforat') => "variable"
					),
					"group" => __("Build Query", 'laforat'),
					"description" => __( "Select show product type in this elment", 'laforat' )
			),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Product Count", 'laforat'),
                "param_name" => "number",
                "value" => "",
				"group" => __("Build Query", 'laforat'),
				"description" => __('Please, enter number of post per page. Show all: -1.', 'laforat')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Columns", 'laforat'),
                "param_name" => "columns",
                "value" => array(
                    __("4 Columns",'laforat') => "4",
                    __("3 Columns",'laforat') => "3",
                    __("2 Columns",'laforat') => "2",
                    __("1 Column",'laforat') => "1",
					__("5 Columns",'laforat') => "5",
                ),
                "description" => __('Select columns in this elment.', 'laforat')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Hide Free', 'laforat'),
                "param_name" => "hide_free",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
				"group" => __("Build Query", 'laforat'),
                "description" => __('Hide free product in this element.', 'laforat')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Hidden', 'laforat'),
                "param_name" => "show_hidden",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
				"group" => __("Build Query", 'laforat'),
                "description" => __('Show Hidden product in this element.', 'laforat')
            ),
            array (
				"type" => "dropdown",
				"heading" => __( 'Order by', 'laforat' ),
				"param_name" => "orderby",
				"value" => array (
						__("None",'laforat') => "none",
						__("Date",'laforat') => "date",
						__("Price",'laforat') => "price",
						__("Random",'laforat') => "rand",
						__("Selling",'laforat') => "selling",
						__("Rated",'laforat') => "rated",
				),
				"group" => __("Build Query", 'laforat'),
				"description" => __( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'laforat' )
			),
            array(
                "type" => "dropdown",
                "heading" => __('Order', 'laforat'),
                "param_name" => "order",
                "value" => Array(
                    __("None",'laforat') => "none",
                   __("ASC",'laforat') => "ASC",
                    __("DESC",'laforat') => "DESC"
                ),
				"group" => __("Build Query", 'laforat'),
                "description" => __('Order ("None", "Asc", "Desc") in this element.', 'laforat')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Sale Flash', 'laforat'),
                "param_name" => "show_sale_flash",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "std"=>1,
				"group" => __("Template", 'laforat'),
                "description" => __('Show or hide sale flash of product.', 'laforat')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Add To Cart', 'laforat'),
                "param_name" => "show_add_to_cart",
                "value" => array(
                    __("Yes, please", 'laforat') => 1
                ),
                "std"=>1,
				"group" => __("Template", 'laforat'),
                "description" => __('Show or hide add to cart of product.', 'laforat')
            ),
        )
    ));
}
