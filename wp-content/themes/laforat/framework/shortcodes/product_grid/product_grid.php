<?php
function jws_theme_products_grid_render($atts) {
	global $wp_query;
    $atts = shortcode_atts(array(
		'product_cat'       	=> '',
        'show'              	=> 'all_products',
        'number'            	=> -1,
        'hide_free'         	=> 0,
        'show_hidden'       	=> 0,
		'orderby'           	=> 'none',
        'order'             	=> 'none',
		'tpl'					=> 'tpl1',
		'columns'				=> 4,
		'show_pagination' 		=> 0,
		'align_pagination' 		=> 'text-center',
		'el_class' 				=> '',
		'title_load'            => '',
		'show_sale_flash'       => 0,
		'show_title'        	=> 0,
        'show_price'        	=> 0,
        'show_rating'        	=> 0,
        'show_add_to_cart'      => 0,
        'show_quick_view'      	=> 0,
        'show_whishlist'      	=> 0,
        'show_compare'      	=> 0,
		'show_view_more_cat'    => 0,
		'date_end' => '2016/20/20 12:34:56',
        'show_view_more'        => 0
    ), $atts);
    
    extract( $atts );
	
    $class = array();
    $class[] = 'woocommerce tb-products-grid';
    $class[] = $tpl;
    // if( $tpl == 'tpl2' && $columns > 1){
    //     $class[] = 'tb-products-grid';
    // }
	$class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query_args = array(
			'post_type' 	 => 'product',
			'post_status' 	 => 'publish',
			'ignore_sticky_posts' => 1,
            'posts_per_page' => $number,
			'paged' 		 => $paged,
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
        $category[] = trim($cat);
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
            case 'variable' :
                    $query_args['tax_query'][] = array(
                        'taxonomy' 		=> 'product_type',
                        'terms' 		=> 5,
                        'field' 		=> 'id',
                        'operator' 		=> 'IN'
                    );
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

   $wpp = new WP_Query( $query_args );
	$class_columns = array();
	switch ($columns) {
		case 1:
			$class_columns[] = 'tb-product-item tb-woo-one-column col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 tb-home4';
			break;
		case 3:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-4 col-lg-4 tb-three-colums-gird';
			break;
		case 4:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3 tb-test-home';
			break;
        case 5:
            $class_columns[] = "col-lg-20 col-md-3 col-sm-6 col-xs-12 tb-file-columns";
            break;
		 case 6:
            $class_columns[] = "tb-no-columns";
            break;
		default:
			$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
	
	ob_start();	
	if ($wpp->have_posts() ) {
        $i = 0;
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>">

		<div class="row<?php if( $columns == 1) { echo ' tb-product-items';}elseif($tpl !='tpl1'){echo ' tb-products-grid';} ?>">
		<?php if($tpl == 'tpl4') echo '<ul class="get_category">';?>
			<?php
				while ($wpp->have_posts() ) {$wpp->the_post();
					$count_post= $wp_query->post_count;
                    if( $i==0 && $tpl=='tpl1' ){
                        ?>
                            <?php include $tpl.'.php'; ?>
                        <?php
                        $tpl = 'tpl2';
                    }else{
						if($tpl == 'tpl4'){?>
							<li>
								<div class="<?php echo esc_attr(implode(' ', $class_columns)) ?>">
								
									<?php include $tpl.'.php'; ?>
									
								</div>
							</li>
						<?php }
						else{?>
							<div class="<?php echo esc_attr(implode(' ', $class_columns)) ?>">
							
								<?php include $tpl.'.php'; ?>
								
							</div>
						<?php }
                    }
                    $i++;
				}
			?>
			<?php if($tpl == 'tpl4') echo '</ul>';?>
			<div style="clear: both;"></div>
		</div>
        <?php if( $show_view_more ): ?>
            <div class="tb-view-more-link"><a data-args='<?php echo json_encode( $query_args );?>' data-atts='<?php echo json_encode( $atts );?>'  href="#"><span><?php echo esc_attr($title_load);?> &nbsp; <i class="fa fa-plus"></i></span></a></div>
        <?php endif; ?>
        <?php if( $show_pagination && $wpp->max_num_pages > 1 ){ ?>
			<nav class="pagination <?php echo esc_attr( $align_pagination );?>" role="navigation">
				<?php
					$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, $paged ),
						'total' =>$wpp->max_num_pages,
						'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'laforat' ),
						'next_text' => __( '<i class="fa fa-angle-right"></i>', 'laforat' ),
					) );
				?>
			</nav>
		<?php } ?> 
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

if(function_exists('insert_shortcode')) { insert_shortcode('products_grid', 'jws_theme_products_grid_render'); }