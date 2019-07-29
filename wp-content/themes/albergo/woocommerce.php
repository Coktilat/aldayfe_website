<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$eltd_sidebar_layout = albergo_elated_sidebar_layout();

get_header();
albergo_elated_get_title();
get_template_part( 'slider' );
do_action('albergo_elated_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="eltd-container">
		<div class="eltd-container-inner clearfix">
			<div class="eltd-grid-row">
				<div <?php echo albergo_elated_get_content_sidebar_class(); ?>>
					<?php albergo_elated_woocommerce_content(); ?>
				</div>
				<?php if ( $eltd_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo albergo_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="eltd-container">
		<div class="eltd-container-inner clearfix">
			<?php albergo_elated_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>