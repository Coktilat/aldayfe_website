<?php
function ro_category_slider_func($atts, $content = null) {
	 extract(shortcode_atts(array(
		'tpl' => 'tpl1',
        'el_class' => '',
		'button_text' =>'',
		'show_title' => 0,
		'show_number' => 0,
		'show_image' => 0,
		'number_cat' => 0,
		'show_view_more_cat' => 0,
		'show_description' =>'',
		'crop_image' => 0,
        'width_image' => 557,
        'height_image' => 370,
		'style' => 'sty_slider',
    ), $atts));
			
    $class = array();
    $class[] = 'ro-cate-slider';
    $classa[] = $style;
    $class[] = $el_class;
    ob_start();
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class));?>">
		<div class="<?php echo $tpl;?> <?php echo esc_attr(implode(' ', $classa)); ?>">
			<?php include $tpl.".php"; ?>
		</div>
	</div>
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('list_category', 'ro_category_slider_func');}
