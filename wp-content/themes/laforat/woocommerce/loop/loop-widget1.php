<?php
	global $product;
	$show_rating = isset( $show_rating ) ? $show_rating : 1;
	$show_title = isset( $show_title ) ? $show_title : 1;
	$show_price = isset( $show_price ) ? $show_price : 1;
	$show_quick_view = isset( $show_quick_view ) ? $show_quick_view : 0;
	$show_compare = isset( $show_compare ) ? $show_compare : 0;
	$show_add_to_cart = isset( $show_add_to_cart ) ? $show_add_to_cart : 0;
	$show_whishlist = isset( $show_whishlist ) ? $show_whishlist : 0;
	$show_view_more_cat = isset( $show_view_more_cat ) ? $show_view_more_cat : 0;
 ?>
 
<div <?php post_class('products-widget'); ?>>
				
	<div class="tb-product-item">
		<div class="tb-image ">
			<?php if( $show_quick_view ): ?>
				<div class="tb-product-btn tb-btn-quickview">
					<div data-toggle="tooltip" data-placement="top" title="<?php _e('Quick view','cayto');?>">
						<?php jws_theme_add_quick_view_button(); ?>
					</div>
				</div>
				<?php
					endif;
				?>
			<?php
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
		
		<div class="tb-content">
			<div class="tb-title text-ellipsis">
			<?php if( $show_title ): ?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endif; ?>
			</div>
			<div class="tb-price-rating">
				<?php
					if( $show_rating ) do_action( 'woocommerce_template_loop_rating' );
					if( $show_price ) do_action( 'woocommerce_template_loop_price' ); 
				?>
			</div>
			<?php if( $show_add_to_cart ): ?>
			<div class="all">
				<div class="tb-btn-prod tb-btn-tocart">
					<?php do_action( 'woocommerce_template_loop_add_to_cart' ); ?>
				</div>
				<?php if( $show_compare || $show_add_to_cart || $show_whishlist ): ?>
			<div class=" tb-products-grid">
				<div class="tb-product-item-inner">
					<div class="tb-action">
						<?php	if( $show_add_to_cart ):
							global $product;
						?>
						<div class="tb-product-btn tb-btn-tocart">
							<div data-toggle="tooltip" data-placement="top" title="<?php echo esc_html( $product->add_to_cart_text()); ?>">
								<?php do_action( 'woocommerce_template_loop_add_to_cart' ); ?>
							</div>
						</div>
						<?php endif;
							if( $show_whishlist ):
								if( function_exists('YITH_WCWL') ):
									$wishlist_text = YITH_WCWL()->is_product_in_wishlist( get_the_ID() ) ? __(' Browse Wishlist','raymond') : __('Add To Wishlist', 'raymond');
						 ?>
						<div class="tb-product-btn tb-btn-wishlist">
							<div data-toggle="tooltip" data-placement="top" title="<?php echo $wishlist_text;?>">
								<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
							</div>
						</div>
						<?php
								endif;
							endif;
							if( $show_compare ):
						?>
						<div class="tb-product-btn tb-btn-compare">
							<div data-toggle="tooltip" data-placement="top" title="<?php _e('Add To Compare','cayto');?>">
								<?php jws_theme_add_compare_link();?>
							</div>
						</div>
						<?php
							endif;
						?>
						
					</div>
				</div>
			</div>
		<?php endif;?>
			</div>
			<?php endif; ?>
		</div>
		<?php if( $show_view_more_cat ):?>
			<div class="show_name">
				<?php
				$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
				if ( $product_cats && ! is_wp_error ( $product_cats ) ){
				$single_cat = array_shift( $product_cats );
				?>
				<a href="<?php echo get_term_link($single_cat->term_id);?>"itemprop="name" class="product_category_title"><span><?php echo esc_html("VIEW MORE","laforat");?></span> &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				<?php }?>
			</div>
		<?php endif;?>
	</div>
</div>
