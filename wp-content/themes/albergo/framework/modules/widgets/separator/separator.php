<?php

class AlbergoElatedSeparatorWidget extends AlbergoElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_separator_widget',
			esc_html__( 'Albergo Separator Widget', 'albergo' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'albergo' ) )
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
					'normal'     => esc_html__( 'Normal', 'albergo' ),
					'full-width' => esc_html__( 'Full Width', 'albergo' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'albergo' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'albergo' ),
					'left'   => esc_html__( 'Left', 'albergo' ),
					'right'  => esc_html__( 'Right', 'albergo' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'albergo' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'albergo' ),
					'dashed' => esc_html__( 'Dashed', 'albergo' ),
					'dotted' => esc_html__( 'Dotted', 'albergo' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'albergo' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'albergo' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltd-separator-widget">';
			echo do_shortcode( "[eltd_separator $params]" ); // XSS OK
		echo '</div>';
	}
}