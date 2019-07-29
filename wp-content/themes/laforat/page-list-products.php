<?php
/**
* Template Name: List Products Template
*
*/
if (!defined('ABSPATH')) exit; // Exit if accessed directly
global $woocommerce_loop;
$jws_theme_options = $GLOBALS['jws_theme_options'];

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 1 );

$loop_shop_columns = get_option('loop_shop_columns');

if( isset( $_GET['columns'] ) ){
	$loop_shop_columns = intval( $_GET['columns'] );
}else{
	$loop_shop_columns = intval( get_option('loop_shop_columns') );
}

$woocommerce_loop['columns'] = $loop_shop_columns;
get_header();
?>
<?php
	$cl_content = 'col-sx-12 col-sm-12 col-md-12 col-lg-12';
	$cl_sidebar = '';
	if (is_active_sidebar('tbtheme-woo-sidebar')) {
		
		$cl_content = 'col-sx-12 col-sm-8 col-md-8 col-lg-9 tb-content';
		$cl_sidebar = 'col-sx-12 col-sm-4 col-md-4 col-lg-3 sidebar-area';
	}
	$jws_theme_sidebar_pos = !empty($jws_theme_options['jws_theme_archive_sidebar_pos_shop'])?$jws_theme_options['jws_theme_archive_sidebar_pos_shop']:'tb-sidebar-right';
?>
<div class="archive-products">
	<div class="container">
		<div class="row <?php echo esc_attr($jws_theme_sidebar_pos); ?>">

			<?php if ($jws_theme_sidebar_pos == 'tb-sidebar-left') { ?>
				<div class="<?php echo esc_attr($cl_sidebar); ?>">
					<div id="secondary" class="widget-area" role="complementary">
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php
								if(is_active_sidebar('tbtheme-woo-shop-sidebar')){
									dynamic_sidebar( 'tbtheme-woo-shop-sidebar' ); 
								}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php $woocommerce_loop['columns'] = $loop_shop_columns;?>
			
			<div class="<?php echo esc_attr($cl_content); ?>">
				
				<?php the_content(); ?>

			</div>
			<?php if ($jws_theme_sidebar_pos == 'tb-sidebar-right') { ?>
				<div class="<?php echo esc_attr($cl_sidebar); ?>">
					<div id="secondary" class="widget-area" role="complementary">
						<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
							<?php
								if(is_active_sidebar('tbtheme-woo-shop-sidebar')){
									dynamic_sidebar( 'tbtheme-woo-shop-sidebar' ); 
								}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer('shop'); ?>
