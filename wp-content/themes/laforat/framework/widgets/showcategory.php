<?php


class RO_Shocategory_Widget extends WC_Widget {

	/**
	 * Constructor
	 */
	function __construct() {
		$this->widget_cssclass    = ' ro-widget-category';
		$this->widget_description = __( "Show list category.", 'laforat' );
		$this->widget_id          = 'ro_showcategory';
		$this->widget_name        = __( 'Show Category', 'laforat' );
		$this->settings           = array(

			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Show Category', 'laforat' ),
				'label' => __( 'Title', 'laforat' )
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Extra Class', 'laforat' )
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
		global $post;
		extract( $args );

		$title          = apply_filters( 'widget_title', $instance['title'] );
		
		$el_class       = esc_attr( $instance['el_class'] );

		echo $before_widget;

		$class = array('searchform');
		$class[] = $el_class;
		$args = array(
		'orderby'    => 'title',
		'order'      => 'ASC',
		'exclude'    => 1,//remove uncategory
		);
		$cat = 'product_cat';
		$product_categories = get_terms( $cat, $args );
		$count = count($product_categories);
		?>
		 <form method="get" id="tb-mega-category" class="<?php echo esc_attr( implode( ' ', $class ) );?> ro-showcategory" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="col-xs-25">
                <div class="dropdown">
                    <select>
                        <option value=""><?php echo esc_attr($title);?></option>
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
                </div>
            </div>
		</form>
		</div>
		<?php
	}
}
function register_showcategory_grid_widget() {
    register_widget('RO_Shocategory_Widget');
}
add_action('widgets_init', 'register_showcategory_grid_widget');
