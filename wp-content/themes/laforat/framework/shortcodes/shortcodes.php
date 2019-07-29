<?php
$elements = array(
	'video',
	'title',
	'info_box',
	'service_box',
	'testimonial_slider',
	'blog_carousel',
	'blog_grid',
	'map_v3',
	'login_form',
	'register_form',
	'portfolio_grid',
	// 'slider_collection',
	'logo',
	'banner',
	'list_team',
	'instagram_feed',
	'countdown',
	'list_category',
	'search_mega',
	'best_seller',
	'slider_images'
);

foreach ($elements as $element) {
	include($element .'/'. $element.'.php');
}

if(class_exists('Woocommerce')){
	$wooshops = array(
		'product_carousel',
		'product_grid'
	);
	
	foreach ($wooshops as $wooshop) {
		include($wooshop .'/'. $wooshop.'.php'); 
	}
}
