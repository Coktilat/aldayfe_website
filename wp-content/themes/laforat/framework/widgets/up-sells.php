<?php

/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class laforat_WC_Widget_Upsell extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce upsells';
		$this->widget_description = __( 'Shows a custom banner', 'woocommerce' );
		$this->widget_id          = 'laforat_woocommerce_upsells';
		$this->widget_name        = __( '@laforat WooCommerce Upsell', 'woocommerce' );
		
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Upsell Products', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of products to show', 'woocommerce' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'date',
				'label' => __( 'Order by', 'woocommerce' ),
				'options' => array(
					'date'   => __( 'Date', 'woocommerce' ),
					'price'  => __( 'Price', 'woocommerce' ),
					'rand'   => __( 'Random', 'woocommerce' ),
					'sales'  => __( 'Sales', 'woocommerce' ),
				)
			),
			'hide_rating' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide ratting', 'woocommerce' )
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
	public function widget( $args, $instance ) {
		global $product;

		$upsells = $product->get_upsell_ids();

		if ( sizeof( $upsells ) == 0 ) {
			return;
		}

		$meta_query = WC()->query->get_meta_query();

		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$show_rating    = !( ! empty( $instance['hide_rating'] ) ? sanitize_title( $instance['hide_rating'] ) : $this->settings['hide_rating']['std'] );
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];

		$args_upsel = array(
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'no_found_rows'       => 1,
			'posts_per_page'      => $number,
			'orderby'             => $orderby,
			'post__in'            => $upsells,
			'post__not_in'        => array( $product->get_id()),
			'meta_query'          => $meta_query
		);

		$products = new WP_Query( $args_upsel );
		if( ! $products->have_posts() ) return;
		ob_start();
		$this->widget_start( $args, $instance );
		?>
		<?php

		if ( $products->have_posts() ) : ?>
				<?php //woocommerce_product_loop_start(); ?>
				<div class="slide_top_rate">
					<div class="owl-carousel">
					<?php
						$start='<div class="item_product">';
						$end ='</div>';
						$dem = 0;
						?>
						<?php while ( $products->have_posts() ) : $products->the_post();
							if($dem==0 || $dem%3 == 0){
								echo $start;
							}
								include( locate_template( 'woocommerce/loop/loop-widget.php' ) );
							$dem++;
							if($dem == 3 || $dem == $products->post_count){
								echo $end;
							}
						endwhile; // end of the loop. ?>

					<?php //woocommerce_product_loop_end(); ?>
					</div>
				</div>
		<?php endif;

		wp_reset_postdata();

		$this->widget_end( $args );

		echo ob_get_clean();
	}
}

function register_laforat_upsel() {
    register_widget('laforat_WC_Widget_Upsell');
}
add_action('widgets_init', 'register_laforat_upsel');
