<?php

class jws_theme_Widget_Mini_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_mini_cart_wrap widget_mini_icon';
		$this->widget_description = __( "Display the user's Cart in the sidebar.", 'woocommerce' );
		$this->widget_id          = 'jws_theme_widget_mini_cart';
		$this->widget_name        = __( 'TB Mini Search & Cart', 'woocommerce' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),
			'hide_search' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide search form', 'woocommerce' )
			),
			'hide_cart' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide Cart form', 'woocommerce' )
			),
			'hide_setting' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide Setting form', 'woocommerce' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if cart is empty', 'woocommerce' )
			),
			'full_search' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Full search cover header, see header version 1', 'woocommerce' )
			),
			'show_text' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show text', 'woocommerce' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		global $post, $jws_theme_options, $woocommerce;
		$jws_theme_header = $jws_theme_options["jws_theme_header_layout"];
		$jws_theme_custom_header = isset( $post->ID ) ? get_post_meta($post->ID, 'jws_theme_header_layout', true) : 'global';
		if($post && isset($post->ID) && $jws_theme_custom_header && $jws_theme_custom_header  !='global' ){
			$jws_theme_header = $jws_theme_custom_header;
		}
		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		$hide_search = in_array( $jws_theme_header, array('v5','v8') ) ? 1 : ( empty( $instance['hide_search'] ) ? 0 : 1 );
		$full_search = ( $jws_theme_header == "v1" ) ? 1 : ( empty( $instance['full_search'] ) ? 0 : 1 );
		$show_text = $jws_theme_options['show_cart_text'] = empty( $instance['show_text'] ) ? '' : ' widget-show-text-icon ';
		$hide_cart = empty( $instance['hide_cart'] ) ? 0 : 1;
		$hide_setting = empty( $instance['hide_setting'] ) ? 0 : 1;
		?>
		<div class="wrap-mini-cart<?php echo $show_text;?>">
		<div class="<?php if( $hide_search ) echo 'hidden ';if( ! $full_search ) echo 'searchform_fixed ';?>widget_cart_search_wrap_item widget_searchform_content_wrap widget_mini_icon">
			<a href="javascript:void(0)" class="icon icon_search_wrap"><?php if( $show_text ){ ?><em><?php esc_html_e('Search','laforat');?></em> <?php }?><i class="fa animated fa-search<?php if( $show_text ){echo ' fa-flip-horizontal';}?> search-icon"></i></a>
			<?php if( $full_search ){ ?>
			<div class="widget_searchform_content full_search">
				<div class="tb-container">
					<a href="#" class="tb-close-fullsearch" title="<?php esc_html_e('Close','laforat');?>">X</a>
			<?php }else{ ?>
				<div class="widget_searchform_content">
			<?php } ?>
			<form method="get" action="<?php echo esc_url( home_url( '/'  ) );?>">
				<input type="text" value="<?php echo get_search_query();?>" name="s" placeholder="<?php esc_html_e('Search here...','laforat');?>" />
				<?php if( ! $full_search ): ?>
				<input type="submit" value="<?php echo esc_attr__( 'Search', 'woocommerce' )?>" />
				<a href="#" class="tb-close-fixedsearch" title="<?php esc_html_e('Close','laforat');?>">X</a>
				<?php endif; ?>
				<?php if(is_woocommerce()):?>
					<input type="hidden" name="post_type" value="product" />
				<?php endif;?>
			</form>
			<?php if( $full_search ){ ?>
			</div>
			<?php } ?>
			</div>
		</div>
		<div class="<?php if( $hide_search ){ echo 'hide_search ';} if( $hide_cart ) echo 'hide_cart ';if( $hide_setting ) echo 'hide_setting ';?>tb-menu-canvas-wrap">
			<?php
			if(! $hide_setting){
				?>
				<!-- Menu Icon -->
				<div class="header-menu-item-icon">
					<a class="icon user_icon" href="#"><i class="pe-7s-config"></i></a> 
				</div>
				<a class="icon_sreach_screen" href="#">
					<i class="pe-7s-search"></i>
				</a> 
				<div class="tb-menu-account">
					<?php if(is_active_sidebar('tbtheme-woo-account-sidebar')) dynamic_sidebar('tbtheme-woo-account-sidebar');?>
				</div>
				<?php
			}
			if($jws_theme_header == "v4" || $jws_theme_header == "v5"){
				?>
					<!-- Menu Icon -->
					<ul class="header-menu-item-icona">
						<li>
							<a href="/wishlist/" class="get_number_wl"><i class="pe-7s-like"></i></a>
						</li>
						<li>
							<a href="/wishlist/" class="get_user"><i class="fa fa-user" aria-hidden="true"></i></a>
						</li>
					</ul>
				<?php 
			}
			?>
		</div>
		<?php
		
		$this->widget_start( $args, $instance );
		if ( $hide_if_empty ) {

			echo '<div class="hide_cart_widget_if_empty">';
		}
		echo '<div class="header"><a class="icon icon_cart_wrap" href="'. $woocommerce->cart->get_cart_url() .'"><i class="pe-7s-cart"></i><span class="cart_total" >(0)</span></a></div>';

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load
		echo '<div class="shopping_cart_dropdown"><div class="widget_shopping_cart_content"></div></div>';

		if ( $hide_if_empty ) {
			echo '</div>';
		}
		echo '</div>';

		$this->widget_end( $args );
	}
}

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_icon_add_to_cart_fragment');
if(!function_exists('woocommerce_icon_add_to_cart_fragment')){
	function woocommerce_icon_add_to_cart_fragment( $fragments ) {
		ob_start();
		global $post, $jws_theme_options, $woocommerce;
		$jws_theme_header = $jws_theme_options["jws_theme_header_layout"];
		$jws_theme_custom_header = isset( $post->ID ) ? get_post_meta($post->ID, 'jws_theme_header_layout', true) : 'global';
		if($post && isset($post->ID) && $jws_theme_custom_header && $jws_theme_custom_header  !='global' ){
			$jws_theme_header = $jws_theme_custom_header;
		}
		?>
		<div class="header">
			<a class="icon icon_cart_wrap" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
				<i class="pe-7s-cart"></i>
				<span class="cart_total" >
				(<?php echo sprintf( _n( '%s ', ' %s ', $woocommerce->cart->cart_contents_count), $woocommerce->cart->cart_contents_count ); ?>)
				</span>
			</a>
		</div>	
		<?php 
		$fragments['div.header'] = ob_get_clean();
		return $fragments;
	}
}

/**
 * Class jws_theme_Widget_Mini_Cart
 */
function register_ct_widget_mini_cart() {
    register_widget('jws_theme_Widget_Mini_Cart');
}
add_action('widgets_init', 'register_ct_widget_mini_cart');
