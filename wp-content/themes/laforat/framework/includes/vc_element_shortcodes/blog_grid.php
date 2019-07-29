<?php
vc_map ( array (
	"name" => 'Blog Grid',
	"base" => "blog_grid",
	"icon" => "tb-icon-for-vc",
	"category" => __('laforat', 'laforat' ), 
	'admin_enqueue_js' => array(JWS_THEME_URI_PATH_ADMIN.'/assets/js/customvc.js'),
	"params" => array (
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Template", 'laforat'),
			"param_name" => "tpl",
			"value" => array(
				__("Template 1",'laforat') => "tpl1",
				__("Template 2(Blog no images)",'laforat') => "tpl2",
				__("Template 3",'laforat') => "tpl3",
				__("Template 4",'laforat') => "tpl4",
				__("Template 5",'laforat') => "tpl5",
				__("Template 6",'laforat') => "tpl6"
			),
			"description" => __('Select template in this element.', 'laforat')
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Style", 'laforat'),
			"param_name" => "style",
			"value" => array(
				"Style" => "default",
				"Style 1" => "style_one",
				"Style 2" => "style_two",
				"Style 3" => "style_three",
			),
			"dependency" => array(
		        "element" => "tpl",
		        "value" => array('tpl1')
		      ),
			"description" => __('Select style for text in this element.', 'laforat')
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
            ),
			"description" => __('Select columns in this elment.', 'laforat')
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
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'laforat'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'laforat' )
		),
		array (
				"type" => "jws_theme_taxonomy",
				"taxonomy" => "category",
				"heading" => __( "Categories", 'laforat' ),
				"param_name" => "category",
				"group" => __("Build Query", 'laforat'),
				"description" => __( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'laforat' )
		),
		
		array (
				"type" => "textfield",
				"heading" => __( 'Count', 'laforat' ),
				"param_name" => "posts_per_page",
				'value' => '',
				"group" => __("Build Query", 'laforat'),
				"description" => __( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __( 'Order by', 'laforat' ),
				"param_name" => "orderby",
				"value" => array (
						__( "None",'laforat') => "none",
						__("Title",'laforat') => "title",
						__("Date",'laforat') => "date",
						__("ID" ,'laforat')=> "ID"
				),
				"group" => __("Build Query", 'laforat'),
				"description" => __( 'Order by ("none", "title", "date", "ID").', 'laforat' )
		),
		array (
				"type" => "dropdown",
				"heading" => __( 'Order', 'laforat' ),
				"param_name" => "order",
				"value" => Array (
						__("None",'laforat') => "none",
						__("ASC" ,'laforat')=> "ASC",
						__("DESC",'laforat') => "DESC"
				),
				"group" => __("Build Query", 'laforat'),
				"description" => __( 'Order ("None", "Asc", "Desc").', 'laforat' )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Image", 'laforat'),
			"param_name" => "show_thumb",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not image of post in this element.", 'laforat')
		),
		array (
				"type" => "dropdown",
				"heading" => __( 'Image Size', 'laforat' ),
				"param_name" => "thumb_size",
				"value" => Array (
						__("Full",'laforat' ) => 'full',
						__('Large','laforat' ) => 'large',
						__('Large Hard Crop','laforat') => 'laforat-blog-large-hard-crop',
						__('Medium','laforat' ) => 'medium',
						__('Medium Hard Crop','laforat') => 'laforat-blog-medium-hard-crop',
						__('Blog Grid','laforat' ) => 'laforat-blog-grid',
						__('Blog Grid Medium (270x200)','laforat') => 'laforat-blog-grid-medium',
						__('Thumbnail','laforat' ) => 'thumbnail'
				),
				"group" => __("Template", 'laforat'),
				"description" => __( 'Select image size of post in this element.', 'laforat' )
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Title", 'laforat'),
			"param_name" => "show_title",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not title of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Info", 'laforat'),
			"param_name" => "show_info",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not info of post in this element.", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Excerpt", 'laforat'),
			"param_name" => "show_excerpt",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"std"=>true,
			"group" => __("Template", 'laforat'),
			"description" => __("Show or not excerpt of post in this element.", 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Excerpt Length", 'laforat'),
			"param_name" => "excerpt_lenght",
			"value" => "",
			"group" => __("Template", 'laforat'),
			"description" => __("Please, Enter excerpt lenght in this element. EX: 20", 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Excerpt More", 'laforat'),
			"param_name" => "excerpt_more",
			"value" => "",
			"group" => __("Template", 'laforat'),
			"description" => __("Please, Enter excerpt more in this element. EX: ...", 'laforat')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Read More Text", 'laforat'),
			"param_name" => "readmore_text",
			"value" => "",
			"group" => __("Template", 'laforat'),
			"description" => __("Please, Enter read more text in this element. EX: Read more", 'laforat')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("New line for read more text?", 'laforat'),
			"param_name" => "readmore_block",
			"value" => array (
				__( "Yes, please", 'laforat' ) => true
			),
			"group" => __("Template", 'laforat'),
			"description" => __("Show read more text as new line", 'laforat')
		)
	)
));