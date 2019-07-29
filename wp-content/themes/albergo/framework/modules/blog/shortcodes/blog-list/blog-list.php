<?php
namespace ElatedCore\CPT\Shortcodes\BlogList;

use ElatedCore\Lib;

class BlogList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltd_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));

		//Category filter
		add_filter( 'vc_autocomplete_eltd_blog_list_category_callback', array( &$this, 'blogCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Category render
		add_filter( 'vc_autocomplete_eltd_blog_list_category_render', array( &$this, 'blogCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                      => esc_html__( 'Albergo Blog List', 'albergo' ),
				'base'                      => $this->base,
				'icon'                      => 'icon-wpb-blog-list extended-custom-icon',
				'category'                  => esc_html__( 'by ELATED', 'albergo' ),
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'type',
						'heading'     => esc_html__( 'Type', 'albergo' ),
						'value'       => array(
							esc_html__( 'Standard', 'albergo' ) => 'standard',
							esc_html__( 'Boxed', 'albergo' )    => 'boxed',
							esc_html__( 'Masonry', 'albergo' )  => 'masonry',
							esc_html__( 'Simple', 'albergo' )   => 'simple',
							esc_html__( 'Minimal', 'albergo' )  => 'minimal'
						),
						'save_always' => true
					),


					array(
						'type'        => 'textfield',
						'param_name'  => 'content_padding_left',
						'heading'     => esc_html__( 'Content padding left (px)', 'albergo' ),
						'description' => esc_html__( 'Set left padding for standard blog list. Default value is 0', 'albergo' ),
						'dependency'  => array( 'element' => 'type', 'value'   => 'standard' ),
						'group'       => esc_html__( 'Text Settings', 'albergo' )
					),

					array(
						'type'        => 'textfield',
						'param_name'  => 'content_padding_right',
						'heading'     => esc_html__( 'Content padding right (px)', 'albergo' ),
						'description' => esc_html__( 'Set right padding for standard blog list. Default value is 0', 'albergo' ),
						'dependency'  => array( 'element' => 'type', 'value'   => 'standard' ),
						'group'       => esc_html__( 'Text Settings', 'albergo' )
					),


					array(
						'type'       => 'textfield',
						'param_name' => 'number_of_posts',
						'heading'    => esc_html__( 'Number of Posts', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'number_of_columns',
						'heading'    => esc_html__( 'Number of Columns', 'albergo' ),
						'value'      => array(
							esc_html__( 'One', 'albergo' )   => '1',
							esc_html__( 'Two', 'albergo' )   => '2',
							esc_html__( 'Three', 'albergo' ) => '3',
							esc_html__( 'Four', 'albergo' )  => '4',
							esc_html__( 'Five', 'albergo' )  => '5'
						),
						'dependency' => Array( 'element' => 'type', 'value' => array( 'standard', 'boxed', 'masonry' ) )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'space_between_items',
						'heading'     => esc_html__( 'Space Between Items', 'albergo' ),
						'value'       => array_flip( albergo_elated_get_space_between_items_array() ),
						'save_always' => true,
						'dependency'  => array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) )
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
						'type'        => 'autocomplete',
						'param_name'  => 'category',
						'heading'     => esc_html__( 'Category', 'albergo' ),
						'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'image_size',
						'heading'    => esc_html__( 'Image Size', 'albergo' ),
						'value'      => array(
							esc_html__( 'Original', 'albergo' )  => 'full',
							esc_html__( 'Square', 'albergo' )    => 'albergo_elated_square',
							esc_html__( 'Landscape', 'albergo' ) => 'albergo_elated_landscape',
							esc_html__( 'Portrait', 'albergo' )  => 'albergo_elated_portrait',
							esc_html__( 'Thumbnail', 'albergo' ) => 'thumbnail',
							esc_html__( 'Medium', 'albergo' )    => 'medium',
							esc_html__( 'Large', 'albergo' )     => 'large'
						),
						'save_always' => true,
						'dependency'  => Array( 'element' => 'type', 'value' => array( 'standard', 'boxed', 'masonry' ) )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'skin',
						'heading'    => esc_html__( 'Skin', 'albergo' ),
						'value'      => array(
							esc_html__( 'Default', 'albergo' )            => '',
							esc_html__( 'Light', 'albergo' )        => 'light'
						),
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'title_tag',
						'heading'    => esc_html__( 'Title Tag', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_title_tag( true ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'title_transform',
						'heading'    => esc_html__( 'Title Text Transform', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_text_transform_array( true ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'excerpt_length',
						'heading'     => esc_html__( 'Text Length', 'albergo' ),
						'description' => esc_html__( 'Number of characters', 'albergo' ),
						'dependency'  => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry', 'simple' ) ),
						'group'       => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_image',
						'heading'    => esc_html__( 'Enable Post Info Image', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_section',
						'heading'    => esc_html__( 'Enable Post Info Section', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'type', 'value'   => array( 'standard', 'boxed', 'masonry' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_author',
						'heading'    => esc_html__( 'Enable Post Info Author', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_date',
						'heading'    => esc_html__( 'Enable Post Info Date', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_category',
						'heading'    => esc_html__( 'Enable Post Info Category', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false, true ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_comments',
						'heading'    => esc_html__( 'Enable Post Info Comments', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_like',
						'heading'    => esc_html__( 'Enable Post Info Like', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_info_share',
						'heading'    => esc_html__( 'Enable Post Info Share', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
						'dependency' => Array( 'element' => 'post_info_section', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Post Info', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'post_read_more',
						'heading'    => esc_html__( 'Enable Post Read More', 'albergo' ),
						'value'      => array_flip( albergo_elated_get_yes_no_select_array( false ) ),
						'group'      => esc_html__( 'Additional Features', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'line_position',
						'heading'    => esc_html__( ' Post button line position', 'albergo' ),
						'value'      => array(
							esc_html__( 'Left', 'albergo' ) => 'left',
							esc_html__( 'Center', 'albergo' )   => 'center',
							esc_html__( 'Right', 'albergo' )  => 'right',
						),
						'dependency' => Array( 'element' => 'post_read_more', 'value' => array( 'yes' ) ),
						'group'      => esc_html__( 'Additional Features', 'albergo' )
					),
					array(
						'type'       => 'dropdown',
						'param_name' => 'pagination_type',
						'heading'    => esc_html__( 'Pagination Type', 'albergo' ),
						'value'      => array(
							esc_html__( 'None', 'albergo' )            => 'no-pagination',
							esc_html__( 'Standard', 'albergo' )        => 'standard-blog-list',
							esc_html__( 'Load More', 'albergo' )       => 'load-more',
							esc_html__( 'Infinite Scroll', 'albergo' ) => 'infinite-scroll'
						),
						'group'      => esc_html__( 'Additional Features', 'albergo' )
					)
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                  => 'standard',
			'content_padding_left'  => '',
			'content_padding_right' => '',
			'number_of_posts'       => '-1',
			'number_of_columns'     => '3',
			'space_between_items'   => 'normal',
			'category'              => '',
			'orderby'               => 'title',
			'order'                 => 'ASC',
			'image_size'            => 'full',
			'title_tag'             => 'h4',
			'title_transform'       => '',
			'excerpt_length'        => '40',
			'skin'                  => '',
			'post_info_section'     => 'yes',
			'post_info_image'       => 'yes',
			'post_info_author'      => 'yes',
			'post_info_date'        => 'yes',
			'post_info_category'    => 'yes',
			'post_info_comments'    => 'no',
			'post_info_like'        => 'no',
			'post_info_share'       => 'no',
			'post_read_more'        => 'yes',
			'line_position'         => 'left',
			'pagination_type'       => 'no-pagination'
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$queryArray             = $this->generateQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		$params['holder_data']    = $this->getHolderData( $params );
		$params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		$params['content_styles']  = $this->getContentStyles( $params );
		$params['module']         = 'list';
		$params['max_num_pages'] = $query_result->max_num_pages;
		$params['paged']         = isset( $query_result->query['paged'] ) ? $query_result->query['paged'] : 1;
		
		$params['this_object'] = $this;

		
		ob_start();
		
		albergo_elated_get_module_template_part( 'shortcodes/blog-list/holder', 'blog', $params['type'], $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		return $html;
	}
	
	public function getHolderClasses( $params, $default_atts ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltd-bl-' . $params['type'] : 'eltd-bl-' . $default_atts['type'];
		$holderClasses[] = $this->getColumnNumberClass( $params['number_of_columns'] );
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'eltd-' . $params['space_between_items'] . '-space' : 'eltd-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['pagination_type'] ) ? 'eltd-bl-pag-' . $params['pagination_type'] : 'eltd-bl-pag-' . $default_atts['pagination_type'];
		$holderClasses[] = ! empty( $params['skin'] ) ? 'eltd-bl-skin-' . $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}


	private function getContentStyles( $params ) {
		$styles = array();

		if ( $params['content_padding_left'] !== '' && $params['type'] === 'standard' ) {
			$styles[] = 'padding-left: ' . albergo_elated_filter_px( $params['content_padding_left'] ) . 'px';
		}

		if ( $params['content_padding_right'] !== '' && $params['type'] === 'standard' ) {
			$styles[] = 'padding-right: ' . albergo_elated_filter_px( $params['content_padding_right'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	
	public function getColumnNumberClass( $params ) {
		switch ( $params ) {
			case 1:
				$classes = 'eltd-bl-one-column';
				break;
			case 2:
				$classes = 'eltd-bl-two-columns';
				break;
			case 3:
				$classes = 'eltd-bl-three-columns';
				break;
			case 4:
				$classes = 'eltd-bl-four-columns';
				break;
			case 5:
				$classes = 'eltd-bl-five-columns';
				break;
			default:
				$classes = 'eltd-bl-three-columns';
				break;
		}
		
		return $classes;
	}
	
	public function getHolderData( $params ) {
		$dataString = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_result = $params['query_result'];
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		
		if ( ! empty( $paged ) ) {
			$params['next-page'] = $paged + 1;
		}
		
		foreach ( $params as $key => $value ) {
			if ( $key !== 'query_result' && $value !== '' ) {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-' . $new_key . '=' . esc_attr( $value );
			}
		}
		
		return $dataString;
	}
	
	public function generateQueryArray( $params ) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['category_name'] = $params['category'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$queryArray['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $queryArray;
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}

	/**
	 * Filter blog categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function blogCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'albergo' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find blog category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function blogCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {
				
				$category_slug = $category->slug;
				$category_title = $category->name;
				
				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'albergo' ) . ': ' . $category_title;
				}
				
				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}