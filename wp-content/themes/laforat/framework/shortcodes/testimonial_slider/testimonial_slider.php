<?php
function tb_testimonial_slider_func($atts, $content = null) {
    extract(shortcode_atts(array(
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'tpl' => '',
        'show_image' => 0,
        'show_title' => 0,
        'show_excerpt' => 0,
        'excerpt_length' => 25,
		'crop_image' => 0,
        'width_image' => 557,
        'height_image' => 370,
        'excerpt_more' => '...',
    ), $atts));
			
    $class = array();
    $class[] = 'tb-testimonial-slider';
    $tpl = ! empty( $tpl ) ? esc_attr( $tpl ) : 'tpl';
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'testimonial',
        'post_status' => 'publish');
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div id="tb-testimonial-1" class="tb-testimonial-1 <?php echo $tpl;?>">
			<div class="owl-carousel">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
					<div class="tb-item">
                        <?php include( $tpl .'.php' ); ?>
					</div>
				<?php } wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('testimonial_slider', 'tb_testimonial_slider_func'); }
