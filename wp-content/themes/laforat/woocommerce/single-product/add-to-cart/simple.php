<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
?>

<?php
	// Availability
	$availability = $product->get_availability();

	if ( $availability['availability'] )
		echo apply_filters( 'woocommerce_stock_html', '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>', $availability['availability'] );
?>

<?php if ( $product->is_in_stock() ) : ?>
	<div class="single_simple_wrap">
			<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

			<form class="cart" method="post" enctype='multipart/form-data'>
				<?php
					do_action( 'woocommerce_before_add_to_cart_button' );
					if ( ! $product->is_sold_individually() ):
				?>
				<div class="ro-quantity">
					<label>
						<p><?php _e('Qty:', 'laforat'); ?><span> *</span></p>
					</label>
						<?php
							woocommerce_quantity_input( array(
								'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
								'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
							) );
					?>
				</div>
				<?php endif; ?>
				
				<div class="ro-action">
					<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />

					<button type="submit" class="single_add_to_cart_button  btn-add-to-cart alt"><?php echo esc_attr($product->single_add_to_cart_text()); ?></button>
					<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
					<?php jws_theme_add_compare_link(); ?>
					<!-- <a class="ro-btn-circle tb-send-mail" href="#jws_theme_send_mail">
						<i class="fa fa-envelope"></i>
					</a> -->
				</div>
				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>

			<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
	</div>
<?php endif; ?>