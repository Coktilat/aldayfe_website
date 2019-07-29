<?php
function jws_theme_blog_grid_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'tpl' => 'tpl1',
		'columns' =>4,
		'show_pagination' => 0,
        'el_class' => '',
		'category' => '',
		'posts_per_page' => -1,
		'orderby' => 'none',
        'order' => 'none',
		'show_thumb' => 0,
		'thumb_size' => 'laforat-blog-grid',
		'show_title' => 0,
		'show_info' => 0,
        'show_excerpt' => 0,
        'excerpt_lenght' => 15,
        'excerpt_more' => '',
        'readmore_text' => '',
		'style' => '',
        'readmore_block' => ''
    ), $atts));
			
    $class = array('row');
    $class[] = $tpl;
	$class[] = $style;

    if($tpl == 'tpl1' || $tpl == 'tpl3'){
    	$class[] =  'tb-blog-grid';
    }else if($tpl == 'tpl4'|| $tpl == 'tpl6'){
		$class[] =  'tb-blog-tpl4';
	}else if($tpl == 'tpl5'){
		$class[] =  'tb-blog-columns';
	}else{
    	$tpl = 'tpl2';
    }

    $class[] = $el_class;


	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'post',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		switch ($columns) {
			case 1:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				break;
			case 2:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
				break;
			case 3:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
				break;
			case 4:
				$class_columns[] = 'col-xs-12 col-sm-12 col-sm-6 col-md-4 col-lg-3';
				break;
			default:
				$class_columns[] = 'col-xs-12 col-sm-12 col-sm-6 col-md-4 col-lg-4';
				break;
		}
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<?php $i=0; while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
			<div class="<?php echo esc_attr(implode(' ', $class_columns)); ?>">
				<?php include $tpl.'.php'; ?>
			</div>
		<?php } ?>
		<div style="clear: both;"></div>
		<?php if(!empty($show_pagination)){ ?>
			<div class="col-xs-12">
				<nav class="pagination tb-pagination text-right" role="navigation">
				<span class="title_page"><?php echo esc_html("page: ","laforat");?></span>
				<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'type'               => 'plain',
						'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'laforat' ),
						'next_text' => __( '<i class="fa fa-angle-right"></i>', 'laforat' ),
					) );
				?>
				</nav>
			</div>
		<?php } wp_reset_postdata(); ?>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('blog_grid', 'jws_theme_blog_grid_func'); }
