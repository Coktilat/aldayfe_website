<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;
$jws_theme_options = $GLOBALS['jws_theme_options'];
$fullwidth = ( (isset( $_GET['layout']) && $_GET['layout'] ==='fullwidth' ) || ($jws_theme_options['jws_theme_single_sidebar_pos_shop'] ==='jws_theme-sidebar-hidden' ) );
if ( empty( $product ) || ! $product->exists() ) {
	return;
}
$posts_per_page = $fullwidth ? 4 : $posts_per_page;
$related = wc_get_related_products($product->get_id(),$posts_per_page );


if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

$jws_theme_cols = $columns === 4 ? 'col-md-3 col-sm-6 col-xs-12' : 'col-md-4 col-sm-6 col-xs-12';

if ( $products->have_posts() ) : ?>

	<div class="products ro-product-relate">
		<div class="ro-title text-center"><h4><?php _e( 'Related Products', 'laforat' ); ?></h4></div>
		<?php if($posts_per_page == 4):?>
		<div class="woocommerce tb-product-carousel tb-product-carousel4">
			<div class="tb-product-items">
				<div class="owl-carousel tb-products-grid">
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<div class="pd-item">
							<?php wc_get_template('loop/loop-content.php'); ?>
						</div>
					<?php endwhile; // end of the loop. ?>
			
				</div>
				
			</div>
		</div>
		<?php else:?>
		<div class="woocommerce tb-product-carousel tb-product-carousel3">
			<div class="tb-product-items">
				<div class="owl-carousel tb-products-grid">
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
						<div class="pd-item">
							<?php wc_get_template('loop/loop-content.php'); ?>
						</div>
					<?php endwhile; // end of the loop. ?>
			
				</div>
				
			</div>
		</div>
		<?php endif;?>
	</div>

<?php endif;

wp_reset_postdata();
