<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Layered Navigation Widget
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class Ramond_WC_Widget_SearchBar extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'Widget Custom Search Bar';
		$this->widget_description = __( 'Shows a custom search bar', 'woocommerce' );
		$this->widget_id          = 'laforat_woocommerce_searchbar';
		$this->widget_name        = __( '@laforat Search Bar', 'woocommerce' );
		
		$this->settings = array(
			'title' => array(
				'type'  => 'text',
				'std'   => __( '', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),
			'label' => array(
				'type'  => 'text',
				'std'   => __( '', 'woocommerce' ),
				'label' => __( 'Label text', 'woocommerce' )
			),
			'type' => array(
				'type'  => 'select',
				'std'   => 'type',
				'label' => __( 'Type category', 'woocommerce' ),
				'options' => array(
					'product'   => __( 'Product', 'woocommerce' ),
					'blog'  => __( 'Blogs', 'woocommerce' )
				)
			),
			'hide_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if category is empty', 'woocommerce' )
			),
			'el_class' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Extra class', 'woocommerce' )
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
		ob_start();
		echo '<div class="container">';
		$this->widget_start( $args, $instance );
		$hide_empty = esc_attr( $instance['hide_empty'] );
		$label = esc_attr( $instance['label'] );
		$type = esc_attr( $instance['type'] );
		$el_class= ! empty( $instance['el_class'] ) ? esc_attr( $instance['el_class'] ) : '';
	
			$class = array('searchform');
		$class[] = $el_class;
		$argss = array(
	    'orderby'    => 'titles',
	    'order'      => 'ASC',
	    'exclude'    => 1,//remove uncategory
	    'hide_empty' => $hide_empty
	    );
	    $is_blog = $type == 'blog';
	    $cat = $is_blog ? 'category' : 'product_cat';
	    $product_categories = get_terms( $cat, $argss );
	    $count = count($product_categories);
    ?>
	    <form method="get" id="tb-mega-searchform" class="<?php echo esc_attr( implode( ' ', $class ) );?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	        <div class="clearfix">
	            <div class="col-xs-45">
	                <div class="dropdown">
	                    <!--<i class="fa fa-th"></i> -->
	                    <!-- <span class="tb-title"></span> -->
	                    <select>
	                        <option value=""><?php echo esc_attr($label);?></option>
	                        <?php
	                           if ( $count > 0 ){
	                            foreach ( $product_categories as $product_category ) {
	                                ?>
	                                <option value="<?php echo esc_attr( $product_category->slug );?>">
	                                        <?php echo esc_attr( $product_category->name); ?>
	                                </option>
	                                <?php
	                            }
	                        }
	                        ?>
	                    </select>
	                    <span class="caret"></span>
	                </div>
	            </div>
	            <div class="col-xs-55">
	                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="search here.." />
	                <button type="submit" id="searchsubmit"><i class="pe-7s-search"></i></button>
	            </div>
	            <?php if( ! $is_blog ): ?>
	                <input type="hidden" name="post_type" value="product">
	            <?php  endif;?>
	            <input type="hidden" value="women" disabled name="cat" />
	            <!-- <button id="searchsubmit" type="submit"><i class="fa fa-search"></i></button> -->
	        </div>
	    </form>
    <?php

		$this->widget_end( $args );
		echo '</div>';

		echo ob_get_clean();
	}
}

function register_laforat_searchbar() {
    register_widget('Ramond_WC_Widget_SearchBar');
}
add_action('widgets_init', 'register_laforat_searchbar');
