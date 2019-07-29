<?php

class AlbergoElatedButtonWidget extends AlbergoElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_button_widget',
			esc_html__( 'Albergo Button Widget', 'albergo' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'albergo' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'albergo' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'albergo' ),
					'outline' => esc_html__( 'Outline', 'albergo' ),
					'simple'  => esc_html__( 'Simple', 'albergo' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'albergo' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'albergo' ),
					'medium' => esc_html__( 'Medium', 'albergo' ),
					'large'  => esc_html__( 'Large', 'albergo' ),
					'huge'   => esc_html__( 'Huge', 'albergo' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'albergo' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'albergo' ),
				'default' => esc_html__( 'Button Text', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'albergo' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'albergo' ),
				'options' => albergo_elated_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'albergo' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'albergo' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'albergo' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'albergo' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'albergo' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'albergo' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'albergo' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltd-button-widget">';
			echo do_shortcode( "[eltd_button $params]" ); // XSS OK
		echo '</div>';
	}
}