<?php

class AlbergoElatedSideAreaOpener extends AlbergoElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_side_area_opener',
			esc_html__( 'Albergo Side Area Opener', 'albergo' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'albergo' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'icon_color',
				'title'       => esc_html__( 'Side Area Opener Color', 'albergo' ),
				'description' => esc_html__( 'Define color for side area opener', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'icon_hover_color',
				'title'       => esc_html__( 'Side Area Opener Hover Color', 'albergo' ),
				'description' => esc_html__( 'Define hover color for side area opener', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'albergo' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Side Area Opener Title', 'albergo' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}
		?>
		
		<a class="eltd-side-menu-button-opener eltd-icon-has-hover" <?php echo albergo_elated_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php albergo_elated_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="eltd-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="eltd-side-menu-icon">
        		<span class="eltd-side-meni-icon-line"></span>
        		<span class="eltd-side-meni-icon-line"></span>
        		<span class="eltd-side-meni-icon-line"></span>
        	</span>
		</a>
	<?php }
}