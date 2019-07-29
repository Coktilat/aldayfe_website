<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class=$title='';
function jws_theme_banner_widget_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'img_src' => '',
		'heading' => '',
		'sub_head' => '',
        'link' => '',
        'el_class' => ''
    ), $atts));

	$content = wpb_js_remove_wpautop($content, true);
	
	$heading = esc_attr( $heading );
	$img_src = wp_get_attachment_image_src( $img_src, 'full' );
	$sub_head = jws_theme_get_sep_title( $sub_head);
	$el_class= ! empty( $el_class ) ? esc_attr( $el_class ) : '';
	$link = empty( $link ) ? '#' : esc_url( $link );

	$class = array();
	$class[] = 'tb-woo-banner';
	$class[] = $el_class;

    ob_start();
    ?>
		<div class="<?php echo implode(' ',$class);?>">
			<a href="<?php echo $link;?>">
			<?php if( ! empty( $img_src ) ){ ?>
				<img class="img-responsive" src="<?php echo esc_url( $img_src[0] );?>" alt="<?php echo $heading;?>">
			<?php } ?>
			</a>
			<div class="hgroup">
			<?php if( ! empty( $heading ) ){ ?>
				<h2 class="font-laforat-2"><?php echo $heading; ?></h2>
			<?php } ?>
			<?php if( ! empty( $sub_head ) ): ?>
				<h3 class="font-laforat-2"><?php echo $sub_head[0];if( isset( $sub_head[1] ) ) echo '<span>'. $sub_head[1] .'</span>'; ?></h3>
			<?php endif; ?>
			</div>
		</div>
		
    <?php
    return ob_get_clean();
}


if(function_exists('insert_shortcode')) { insert_shortcode('banner', 'jws_theme_banner_widget_func'); }
