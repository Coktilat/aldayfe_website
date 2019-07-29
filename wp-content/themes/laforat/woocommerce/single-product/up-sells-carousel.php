<?php
/**
 * Single Product Up-Sells
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

$posts_per_page = $fullwidth ? 4 : $posts_per_page;
$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) == 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$jws_theme_cols = $posts_per_page === 4 ? 'col-md-3 col-sm-6 col-xs-12' : 'col-md-4 col-sm-6 col-xs-12';

if ( $products->have_posts() ) : ?>

	<div class="upsellss products">
		<div class="laforat-title-separator-wrap text-center laforat-title-underline-2">
            <h3 class="laforat-title-separator laforat-title text-center"><span><?php esc_html_e( 'Upsell Products', 'woocommerce' ) ?></span></h3>
        </div>
		<?php if($posts_per_page == 4):?>
		<div class="woocommerce tb-product-carousel tb-product-carousel4">
			<div class="owl-carousel tb-products-grid">

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					<div class="pd-item">
						<?php wc_get_template('loop/loop-content.php'); ?>
					</div>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
		<?php else:?>
		<div class="woocommerce tb-product-carousel tb-product-carousel3">
			<div class="owl-carousel tb-products-grid">
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
					<div class="pd-item">
						<?php wc_get_template('loop/loop-content.php'); ?>
					</div>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
		<?php endif;?>
	</div>

<?php endif;

wp_reset_postdata();
