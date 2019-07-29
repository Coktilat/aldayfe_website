<?php
vc_map ( array (
		"name" => 'Portfolio Grid',
		"base" => "portfolio_grid",
		"icon" => "tb-icon-for-vc",
		"category" => __( 'laforat', 'laforat' ), 
		'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
		"params" => array (
					array (
							"type" => "jws_theme_taxonomy",
							"taxonomy" => "portfolio_category",
							"heading" => __( "Portfolio Categories", 'laforat' ),
							"param_name" => "category",
							"description" => __( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'laforat' )
					),
					array (
							"type" => "textfield",
							"heading" => __( 'Count', 'laforat' ),
							"param_name" => "posts_per_page",
							'value' => '',
							"description" => __( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'laforat' )
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Template", 'laforat'),
						"param_name" => "tpl",
						"value" => array(
							__("Template 1 ( Overlay effect )",'laforat') => "tpl1",
							__("Template 2 ( Overlay effect With Icon )",'laforat') => "tpl2",
							__("Default",'laforat') => "tpl"
						),
						"std" => 'tpl',
						"group" => __("Template", 'laforat'),
						"description" => __('Select template in this element.', 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Filter", 'laforat'),
						"param_name" => "show_filter",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"std" => true,
						"description" => __("Show or not show filter in this element.", 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Pagination", 'laforat'),
						"param_name" => "show_pagination",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"description" => __("Show or not show pagination in this element.", 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("No Padding", 'laforat'),
						"param_name" => "no_pading",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"std" => false,
						"description" => __("No padding in each items", 'laforat')
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
							"description" => __('Select columns display in this element.', 'laforat')
					),
					array (
							"type" => "dropdown",
							"heading" => __( 'Order by', 'laforat' ),
							"param_name" => "orderby",
							"value" => array (
									__("None",'laforat') => "none",
									__("Title",'laforat') => "title",
									__("Date",'laforat') => "date",
									__("ID",'laforat') => "ID"
							),
							"description" => __( 'Order by ("none", "title", "date", "ID").', 'laforat' )
					),
					array (
							"type" => "dropdown",
							"heading" => __( 'Order', 'laforat' ),
							"param_name" => "order",
							"value" => Array (
									__("None",'laforat') => "none",
									__("ASC",'laforat') => "ASC",
									__("DESC",'laforat') => "DESC"
							),
							"description" => __( 'Order ("None", "Asc", "Desc").', 'laforat' )
					),
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __("Extra Class", 'laforat'),
						"param_name" => "el_class",
						"value" => "",
						"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Title", 'laforat'),
						"param_name" => "show_title",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"std" => true,
						"group" => __("Template", 'laforat'),
						"description" => __("Show or not title of post in this element.", 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Category", 'laforat'),
						"param_name" => "show_category",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"std" => true,
						"group" => __("Template", 'laforat'),
						"description" => __("Show or not category of post in this element.", 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show View Now", 'laforat'),
						"param_name" => "show_readmore",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"group" => __("Template", 'laforat'),
						"description" => __("Show or not View Now of post in this element.", 'laforat')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Icon", 'laforat'),
						"param_name" => "show_icon",
						"value" => array (
							__( "Yes, please", 'laforat' ) => true
						),
						"std" => true,
						"group" => __("Template", 'laforat'),
						"description" => __("Show or not icon of post in this element.", 'laforat')
					)
		)
));