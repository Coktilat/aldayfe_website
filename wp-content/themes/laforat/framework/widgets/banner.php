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
class laforat_WC_Widget_Banner extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_banner';
		$this->widget_description = __( 'Shows a custom banner', 'woocommerce' );
		$this->widget_id          = 'laforat_woocommerce_banner';
		$this->widget_name        = __( '@laforat WooCommerce Banner', 'woocommerce' );
		
		$this->settings = array(
			'title' => array(
				'type'  => 'text',
				'std'   => __( '', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),
			'heading' => array(
				'type'  => 'text',
				'std'   => __( 'SAVE', 'woocommerce' ),
				'label' => __( 'Heading banner', 'woocommerce' )
			),
			'sub_head' => array(
				'type'  => 'text',
				'std'   => __( 'SPECAIL TODAY', 'woocommerce' ),
				'label' => __( 'Subheading', 'woocommerce' )
			),
			'content' => array(
				'type'  => 'textarea',
				'std'   => __( '', 'woocommerce' ),
				'label' => __( 'Content', 'woocommerce' )
			),
			'img_src' => array(
				'type'    => 'text',
				'std'     => '',
				'label'   => __( 'Image source', 'woocommerce' )
			),
			'link' => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Link', 'woocommerce' )
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
		$this->widget_start( $args, $instance );
		$heading = esc_attr( $instance['heading'] );
		$content = esc_attr( $instance['content'] );
		$sub_head = esc_attr( $instance['sub_head'] );
		$el_class= ! empty( $instance['el_class'] ) ? esc_attr( $instance['el_class'] ) : '';
		$link = empty( $instance['link'] ) ? '#' : esc_url( $instance['link'] );
		?>
			<div class="tb-woo-banner <?php echo $el_class;?>">
				<div class="title_image">
					<?php if( ! empty( $heading ) ){ ?>
						<h2 class="font-laforat-2"><?php echo $heading; ?></h2>
					<?php } ?>
					<a href="<?php echo $link;?>">
					<?php if( ! empty( $instance['img_src'] ) ){ ?>
						<img class="img-responsive" src="<?php echo esc_url( $instance['img_src'] );?>" alt="<?php echo $sub_head;?>">
					<?php } ?>
					</a>
				</div>
				<div class="title_content">
					<?php if( ! empty( $sub_head ) ): ?>
						<h3 class="font-laforat-2"><?php echo $sub_head;?></h3>
					<?php endif; ?>
					<?php if( ! empty( $content )){?>
						<p><?php echo $content; ?></p>
					<?php }?>
				</div>
			</div>
		<?php

		$this->widget_end( $args );

		echo ob_get_clean();
	}
}

function register_laforat_banner() {
    register_widget('laforat_WC_Widget_Banner');
}
add_action('widgets_init', 'register_laforat_banner');
