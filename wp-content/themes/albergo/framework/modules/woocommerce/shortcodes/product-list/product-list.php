<?php

namespace ElatedCore\CPT\Shortcodes\ProductList;

use ElatedCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltd_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Albergo Product List', 'albergo' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by ELATED', 'albergo' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'albergo' ),
							'value'       => array(
								esc_html__( 'Standard', 'albergo' ) => 'standard',
								esc_html__( 'Masonry', 'albergo' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'albergo' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'albergo' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'albergo' )    => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'albergo' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'albergo' ),
							'value'       => array(
								esc_html__( 'One', 'albergo' )   => '1',
								esc_html__( 'Two', 'albergo' )   => '2',
								esc_html__( 'Three', 'albergo' ) => '3',
								esc_html__( 'Four', 'albergo' )  => '4',
								esc_html__( 'Five', 'albergo' )  => '5',
								esc_html__( 'Six', 'albergo' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'albergo' ),
							'value'       => array_flip( albergo_elated_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'albergo' ),
							'value'       => array_flip( albergo_elated_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'albergo' ),
							'value'       => array_flip( albergo_elated_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'albergo' ),
							'value'       => array(
								esc_html__( 'Category', 'albergo' ) => 'category',
								esc_html__( 'Tag', 'albergo' )      => 'tag',
								esc_html__( 'Id', 'albergo' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'albergo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'albergo' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'albergo' ),
							'value'      => array(
								esc_html__( 'Default', 'albergo' )        => '',
								esc_html__( 'Original', 'albergo' )       => 'full',
								esc_html__( 'Square', 'albergo' )         => 'square',
								esc_html__( 'Landscape', 'albergo' )      => 'landscape',
								esc_html__( 'Portrait', 'albergo' )       => 'portrait',
								esc_html__( 'Medium', 'albergo' )         => 'medium',
								esc_html__( 'Large', 'albergo' )          => 'large',
								esc_html__( 'Shop Catalog', 'albergo' )   => 'shop_catalog',
								esc_html__( 'Shop Single', 'albergo' )    => 'shop_single',
								esc_html__( 'Shop Thumbnail', 'albergo' ) => 'shop_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'albergo' ),
							'value'      => array(
								esc_html__( 'Default', 'albergo' ) => 'default',
								esc_html__( 'Light', 'albergo' )   => 'light',
								esc_html__( 'Dark', 'albergo' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'albergo' ),
							'description' => esc_html__( 'Number of characters', 'albergo' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'albergo' ),
							'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'albergo' ),
							'value'      => array(
								esc_html__( 'Default', 'albergo' ) => 'default',
								esc_html__( 'Light', 'albergo' )   => 'light',
								esc_html__( 'Dark', 'albergo' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'albergo' ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'albergo' ),
							'value'      => array(
								esc_html__( 'Default', 'albergo' ) => '',
								esc_html__( 'Left', 'albergo' )    => 'left',
								esc_html__( 'Center', 'albergo' )  => 'center',
								esc_html__( 'Right', 'albergo' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'albergo' ),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'albergo' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-on-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => '4',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'product_info_skin'       => '',
			'title_tag'               => 'h5',
			'title_transform'         => '',
			'display_category'        => 'no',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'yes',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
			'info_bottom_margin'      => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : $default_atts['info_position'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = albergo_elated_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltd-' . $params['type'] . '-layout' : 'eltd-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'eltd-' . $params['space_between_items'] . '-space' : 'eltd-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getColumnNumberClass( $params );
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'eltd-' . $params['info_position'] : 'eltd-' . $default_atts['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'eltd-product-info-' . $params['product_info_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getColumnNumberClass( $params ) {
		$columnsNumber = '';
		$columns       = $params['number_of_columns'];
		
		switch ( $columns ) {
			case 1:
				$columnsNumber = 'eltd-one-column';
				break;
			case 2:
				$columnsNumber = 'eltd-two-columns';
				break;
			case 3:
				$columnsNumber = 'eltd-three-columns';
				break;
			case 4:
				$columnsNumber = 'eltd-four-columns';
				break;
			case 5:
				$columnsNumber = 'eltd-five-columns';
				break;
			case 6:
				$columnsNumber = 'eltd-six-columns';
				break;
			default:
				$columnsNumber = 'eltd-four-columns';
				break;
		}
		
		return $columnsNumber;
	}
	
	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'eltd_product_featured_image_size', true );
		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . albergo_elated_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}