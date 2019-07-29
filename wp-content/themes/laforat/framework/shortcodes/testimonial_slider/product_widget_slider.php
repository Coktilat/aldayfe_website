<?php
function jws_theme_product_widget_slider_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'el_class' => '',
        'title' => '',
        'sub_title' => ''
    ), $atts));
			
    $class = array();
    $class[] = 'tb-product-ưidget-slider';
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'testimonial',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = esc_attr( trim($cat) );
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'testimonial_category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div id="tb-testimonial-1" class="tb-testimonial-1">
			<ul class="slides">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
					<li class="tb-item">
                        <?php if($show_image && has_post_thumbnail( get_the_ID() ) ):?>
                            <div class="tb-image">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
						<?php
                            endif;
                            if($show_excerpt) { ?>
							<div class="tb-excerpt"><?php the_excerpt(); ?></div>
						<?php } ?>
						<?php
                            if($show_title) {
                        ?>
						<div class="tb-image-name">
							<h5 class="tb-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
							<?php
								$company = esc_attr( get_post_meta(get_the_ID(), 'jws_theme_testimonial_company', true) );
								if($company) echo '<span class="tb-company">'. $company.'</span>';
							?>
						</div>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('product_widget_slider', 'jws_theme_product_widget_slider_func'); }
