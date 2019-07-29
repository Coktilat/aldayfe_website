<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Top Rated Products Widget.
 *
 * Gets and displays top rated products in an unordered list.
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class laforat_WC_Widget_Top_Rated_Products extends WC_Widget {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_top_rated_products_one';
		$this->widget_description = __( 'Display a list of your top rated products on your site.', 'woocommerce' );
		$this->widget_id          = 'laforat_top_rated_products';
		$this->widget_name        = __( 'laforat Top Rated Products', 'woocommerce' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Top Rated Products', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of products to show', 'woocommerce' )
			)
		);
		parent::__construct();
	}
	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}
		ob_start();
		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$query_args = array( 'posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );
		$query_args['meta_query'] = WC()->query->get_meta_query();
		$r = new WP_Query( $query_args );
		if ( $r->have_posts() ) {
			$this->widget_start( $args, $instance );
			echo '<div class="slide_top_rate">';
				echo '<div class="owl-carousel">';
					$start='<div class="item_product">';
					$end ='</div>';
					$dem = 0;
					while ( $r->have_posts() ) { 
						$r->the_post();
						if($dem==0 || $dem%3 == 0){
							echo $start;
						}
						wc_get_template( 'content-widget-product.php', array( 'show_rating' => true ) );
						$dem++;
						if($dem == 3 || $dem == $r->post_count){
							echo $end;
						}
					}
				echo '</div>';
			echo '</div>';
			$this->widget_end( $args );
		}
		wp_reset_postdata();
		$content = ob_get_clean();
		echo $content;
		$this->cache_widget( $args, $content );
	}
}
function register_laforat_top_rated_products() {
    register_widget('laforat_WC_Widget_Top_Rated_Products');
}
add_action('widgets_init', 'register_laforat_top_rated_products');
