<?php
function jws_theme_images_slider($atts, $content = null) {
    extract(shortcode_atts(array(
        'images' => '',
        'el_class' => ''
    ), $atts));
    $class = array();
	$class[] = 'jws-slider-images';
	$class[] = $el_class;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<div class="imges_sliders_full">
				<div class="owl-carousel">
					<?php
						for($i=0; $i<count(explode(",",$images));$i++){
							echo '<div class="jws-theme-image">'.wp_get_attachment_image(explode(",",$images)[$i],'full', false, array('class'=>'img-responsive')).'</div>';;
						}
					?>
				</div>
			</div>
		</div>
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('slider_images', 'jws_theme_images_slider');}
