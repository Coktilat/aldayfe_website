<?php
function jws_theme_product_carousel_render($atts) {
    extract(shortcode_atts(array(
		'product_cat'       	=> '',
        'show'              	=> 'all_products',
		'tpl'					=> 'tpl1',
        'number'            	=> -1,
        'hide_free'         	=> 0,
        'show_hidden'       	=> 0,
		'orderby'           	=> 'none',
        'order'             	=> 'none',
		'columns'				=> 4,
		'show_pagination' 		=> 1,
		'el_class' 				=> '',
		'show_sale_flash'       => 1,
		'show_title'        	=> 1,
        'show_cat'            => 1,
        'show_price'        	=> 1,
        'show_rating'        	=> 1,
        'show_add_to_cart'      => 1,
        'show_quick_view'      	=> 1,
        'show_whishlist'      	=> 1,
		'date_end' => '2016/20/20 12:34:56',
        'show_compare'      	=> 1,
    ), $atts));
	
    $class = array();
    $class[] = 'woocommerce tb-product-carousel';
    $class[] = 'tb-product-carousel'. intval( $columns );
	$class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query_args = array(
			'post_type' 	 => 'product',
			'post_status' 	 => 'publish',
			'ignore_sticky_posts' => 1,
            'posts_per_page' => $number,
			'paged' 		 => $paged,
            'no_found_rows'  => 1,
            'order'          => $order
    );

    $query_args['meta_query'] = array();

    if ( empty( $show_hidden ) ) {
                    $query_args['meta_query'][] = WC()->query->visibility_meta_query();
                    $query_args['post_parent']  = 0;
            }

            if ( ! empty( $hide_free ) ) {
            $query_args['meta_query'][] = array(
                        'key'     => '_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'DECIMAL',
                    );
    }

    $query_args['meta_query'][] = WC()->query->stock_status_meta_query();
    $query_args['meta_query']   = array_filter( $query_args['meta_query'] );

    if (isset($product_cat) && $product_cat != '') {
        $cats = explode(',', $product_cat);
        $product_cat = array();
        foreach ((array) $cats as $cat) :
        $category[] = esc_attr( trim($cat) );
        endforeach;

        $query_args['tax_query'] = array(
                    array(
                            'taxonomy' 		=> 'product_cat',
                            'terms' 		=> $category,
                            'field' 		=> 'id',
                            'operator' 		=> 'IN'
                    )
        );
    }
    switch ( $show ) {
            case 'featured' :
                    $query_args['meta_query'][] = array(
                                    'key'   => '_featured',
                                    'value' => 'yes'
                            );
                    break;
            case 'onsale' :
                    $product_ids_on_sale = wc_get_product_ids_on_sale();
                            $product_ids_on_sale[] = 0;
                            $query_args['post__in'] = $product_ids_on_sale;
                    break;
    }
    switch ( $orderby ) {
			case 'price' :
				$query_args['meta_key'] = '_price';
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rand' :
				$query_args['orderby']  = 'rand';
				break;
			case 'selling' :
				$query_args['meta_key'] = 'total_sales';
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rated' :
				$query_args['orderby'] = 'title';
				break;
			default :
				$query_args['orderby']  = 'date';
    }

    $wp_query = new WP_Query( $query_args );
	
	ob_start();	
	if ( $wp_query->have_posts() ) {
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); echo $tpl;?>">
		<div class="owl-carousel tb-products-grid">
			<?php
				while ( $wp_query->have_posts() ) { $wp_query->the_post();
					if($tpl == 'tpl2'){
						include 'tpl2.php';
					}else if($tpl =='tpl3'){
						include 'tpl3.php';
					}else{
						include 'tpl1.php';
					}
				}
			?>
		</div>
    </div>
    <?php
    }else {
		echo 'Post not found!';
    } 
    ?>
    
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('product_carousel', 'jws_theme_product_carousel_render'); }