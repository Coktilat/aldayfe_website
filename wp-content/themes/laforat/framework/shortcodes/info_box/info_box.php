<?php
function jws_theme_info_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'tpl' => 'tpl1',
        'heading_1' => '',
		'title' =>'',
        'image_1' => '',
		'image_2' => '',
		'image_3' => '',
		'image_4' => '',
        'align_image1' => '',
        'link_text' => '',
        'ex_link' => '',
        'promotion_text' => '',
        'promotion_link' => '',
		'style' => '',
        'el_class' => ''
    ), $atts));
	$content = wpb_js_remove_wpautop($content, true);
    $class = array();
	$class[] = 'tb-info-box-wrap';
	$class[] = $tpl;
	$class[] = $style;
	$class[] = $el_class;
	$heading_1 = jws_theme_get_sep_title( $heading_1 );
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php include $tpl.".php"; ?>
		</div>
		
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('info_box', 'jws_theme_info_box_func');}
