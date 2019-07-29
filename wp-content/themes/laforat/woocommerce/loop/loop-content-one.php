<?php $jws_theme_options = $GLOBALS['jws_theme_options'];
	global $product;
	$show_sale_flash = (int) isset( $jws_theme_options['jws_theme_archive_show_sale_flash_product'] ) ? $jws_theme_options['jws_theme_archive_show_sale_flash_product'] : 1;
	$show_quick_view = (int) isset( $jws_theme_options['jws_theme_archive_show_quick_view_product'] ) ? $jws_theme_options['jws_theme_archive_show_quick_view_product'] : 1;
	$show_rating = (int) isset( $jws_theme_options['jws_theme_archive_show_rating_product'] ) ? $jws_theme_options['jws_theme_archive_show_rating_product'] : 1;
	$show_add_to_cart = (int) isset( $jws_theme_options['jws_theme_archive_show_add_to_cart_product'] ) ? $jws_theme_options['jws_theme_archive_show_add_to_cart_product'] : 1;
	$show_whishlist = (int) isset( $jws_theme_options['jws_theme_archive_show_whishlist_product'] ) ? $jws_theme_options['jws_theme_archive_show_whishlist_product'] : 1;
	$show_compare = (int) isset( $jws_theme_options['jws_theme_archive_show_compare_product'] ) ? $jws_theme_options['jws_theme_archive_show_compare_product'] : 1;
	$show_title = (int) isset( $jws_theme_options['jws_theme_archive_show_title_product'] ) ? $jws_theme_options['jws_theme_archive_show_title_product'] : 1;
	$show_price = (int) isset( $jws_theme_options['jws_theme_archive_show_price_product'] ) ? $jws_theme_options['jws_theme_archive_show_price_product'] : 1;
	$show_cat = (int) isset($jws_theme_options['jws_theme_archive_show_cat_product']) ? $jws_theme_options['jws_theme_archive_show_cat_product'] : 1;
?>
<div <?php post_class(); ?>>
							
	<div class="tb-product-item-inner one_columns">
		<div class="action_image tb_one_columns">
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
							<span>
								<img src="<?php echo esc_url( wp_get_attachment_image_src( array_shift( $att_ids ),'shop_catalog' )[0] );?>" alt="<?php the_title();?>">
							</span>
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
		</div>
		<div class="tb-item-content-info">
			<?php if( $show_title ): ?>
			<div class="tb-title text-ellipsis"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			<?php endif;
				if( $show_cat ): ?>
				<div class="tb-category"><?php the_terms( get_the_ID(), 'product_cat', '', ', ');?></div>
			<?php
				endif;
				if($jws_theme_options['jws_theme_archive_show_price_product']):
			?>
				<div class="tb-product-wrap-price-rating">
					<?php
						if( $show_rating ) do_action( 'woocommerce_template_single_rating' );
						if( $show_price ) do_action( 'woocommerce_template_loop_price' );
					?>
				</div>
			<?php endif;?>
			<!-- Content -->
			<div class="tb-product-content">

				<?php jws_theme_custom_content(40,'');?>

			</div>
			<?php if($jws_theme_options['jws_theme_archive_show_add_to_cart_product']):?>
				<div class="tb-product-btn">
					<?php

						if( $show_add_to_cart ) do_action( 'woocommerce_template_loop_add_to_cart' );

						if( $show_whishlist ) echo do_shortcode('[yith_wcwl_add_to_wishlist]');

						if( $show_compare ) jws_theme_add_compare_link();

						if( $show_quick_view ) jws_theme_add_quick_view_button();
					?>

				</div>
			<?php endif;?>
		</div>
	</div>
	
</div>