<?php
function jws_theme_service_box_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'icon' => '',
		'title' => '',
        'ex_link' => '',
        'el_align' => 'text-center',
        'tpl' => 'tpl',
		'image_1' =>'',
        'el_class' => ''
    ), $atts));

	$content = wpb_js_remove_wpautop($content, true);
	
    $class = $child_class = array();
	$class[] = 'tb-service-wrap';
	$class[] = $el_class;
	$child_class[] = $el_align;
	$child_class[] = $tpl;
    ob_start();
    ?>
		<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
			<?php if( !empty( $ex_link ) ){?>
			<a href="<?php echo esc_url($ex_link); ?>">
			<?php } ?>
			<?php if($tpl == 'tpl1'): ?>
				<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
					<?php
						if( ! empty( $icon ) ) echo '<div class="tb-icon"><i class="'.esc_attr($icon).'"></i></div>';
						if( ! empty( $title ) ) echo '<h5 class="tb-title">'.esc_html($title).'</h5>';
						if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div>';
					?>
				</div>
			<?php else:?>
				<div class="tb-service <?php echo esc_attr(implode(' ', $child_class)); ?>">
					<?php
						if( ! empty( $image_1 ) ) echo '<div class="tb-icon">'.wp_get_attachment_image( $image_1, 'full', false, array('class'=>'img-responsive') ).'</div>';
						if( ! empty( $title ) ) echo '<h5 class="tb-title">'.esc_html($title).'</h5>';
						if( ! empty( $content ) ) echo '<div class="tb-content">'.$content.'</div>';
					?>
				</div>
			<?php endif; ?>
			<?php if( !empty( $ex_link ) ){ ?>
			</a>
			<?php } ?>
		</div>
		
    <?php
    return ob_get_clean();
}
if(function_exists('insert_shortcode')) { insert_shortcode('service_box', 'jws_theme_service_box_func');}
