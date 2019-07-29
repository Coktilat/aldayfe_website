<?php global $product;
	$jws_theme_options = $GLOBALS['jws_theme_options'];
	$show_sale_flash = (int) isset( $show_sale_flash ) ? $show_sale_flash : $jws_theme_options['jws_theme_archive_show_sale_flash_product'];
	$show_add_to_cart = (int) isset( $show_add_to_cart ) ? $show_add_to_cart : $jws_theme_options['jws_theme_archive_show_add_to_cart_product'];
	$show_cat = (int) isset( $show_cat ) ? $show_cat : $jws_theme_options['jws_theme_archive_show_cat_product'];
	$show_color_attr = (int) isset( $show_color_attr ) ? $show_color_attr : $jws_theme_options['jws_theme_archive_show_color_attribute'];
?>
<div <?php post_class(); ?>>						
	<div class="tb-product-item-inner">
		<div class="action_image">
			<div class="tb-image">
				<?php if( $show_sale_flash ) do_action( 'woocommerce_show_product_loop_sale_flash' ); ?>
				<?php
					$postDate = strtotime( get_the_date('j F Y') );
					$todaysDate = time() - (7 * 86400);// publish < current time 1 week
					if( $postDate >= $todaysDate) echo '<span class="new">'. esc_html__('New', 'laforat') .'</span>';
					$att_ids = $product->get_gallery_image_ids();
					$exist_thumb = ! empty( $att_ids );
					if( $exist_thumb ){
						?>
						<a href="<?php the_permalink(); ?>" class="tb-thumb-effect" data-tb-thumb="true">
							<?php do_action( 'woocommerce_template_loop_product_thumbnail' ); ?>
							<?php if( $show_color_attr ):
							$color_atts = wc_get_product_terms( $product->get_id(), 'pa_color', array( 'fields' => 'names' ) );
							if( ! empty( $color_atts ) ):
							?>
							<ul class="list-inline text-center tb-color-attribute">
								<?php foreach( $color_atts as $color ):
									$color = esc_attr( strtolower( $color ) );
								?>
									<li class="tb-attribute-<?php echo $color;?>"><?php echo $color;?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; endif ?>
						</a>
						<?php
					}else{
						?>
						<a class="tb-normal-effect" href="<?php the_permalink(); ?>">
							<?php do_action( 'woocommerce_template_loop_product_thumbnail' ); ?>
						</a>
						<?php
					}
				?>
			</div>
			<div class="tb-header-content">
				<div class="tb-action">
					<?php
						if( $show_add_to_cart ):
					?>
					<div class="tb-product-btn tb-btn-tocart">
						<div data-toggle="tooltip" data-placement="top">
							<?php do_action( 'woocommerce_template_loop_add_to_cart' ); ?>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>