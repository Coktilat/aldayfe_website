<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$jws_theme_options = $GLOBALS['jws_theme_options'];
$fullwidth = ( (isset( $_GET['layout']) && $_GET['layout'] ==='fullwidth' ) || ($jws_theme_options['jws_theme_single_sidebar_pos_shop'] ==='tb-sidebar-hidden' ) );
get_header(); ?>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-562f7aa6d38d8980" async="async"></script>
<?php
	if( $fullwidth ){
		$cl_content = 'col-xs-12 tb-content tb-fullwidth';
		$cl_sidebar = 0;
	}else{
		$cl_content = 'col-xs-12 col-sm-12 col-md-9 col-lg-9 tb-content';
		$cl_sidebar = 'col-xs-12 col-sm-12 col-md-3 col-lg-3 tb-sidebar';
	}
	$jws_theme_sidebar_pos = !empty($jws_theme_options['jws_theme_single_sidebar_pos_shop'])?$jws_theme_options['jws_theme_single_sidebar_pos_shop']:'tb-sidebar-right';
?>
<div class="single-product">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($jws_theme_sidebar_pos); ?>">
				<div class="<?php echo esc_attr($cl_content); ?>">
					
					<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; wp_reset_postdata(); // end of the loop. ?>
					<?php if($jws_theme_options['jws_theme_single_show_related_products'])do_action( 'woocommerce_output_related_products' ); ?>
					<?php if( $fullwidth ):?>
						<div class="usesell_rate">
							<div class="content_title">
								<span class="top_rate active">Related</span>
								<span class="usleepsa">Upsell</span>
							</div>
							<?php 
								do_action('woocommerce_upsell_display');
								do_action( 'woocommerce_output_related_products' );
							?>
						</div>
					<?php endif; ?>
				</div>
				<?php if( $cl_sidebar ): ?>
				<div class="<?php echo esc_attr($cl_sidebar); ?>">
					<div id="secondary" class="widget-area" role="complementary">
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'tbtheme-woo-single-sidebar' ); ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
</div>

<?php get_footer( 'shop' ); ?>
