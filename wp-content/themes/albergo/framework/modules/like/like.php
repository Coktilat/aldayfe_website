<?php

class AlbergoElatedLike {
	private static $instance;
	
	private function __construct() {
		add_action( 'wp_ajax_albergo_elated_like', array( $this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_albergo_elated_like', array( $this, 'ajax' ) );
	}
	
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	function ajax() {
		
		//update
		if ( isset( $_POST['likes_id'] ) ) {
			$post_id = str_replace( 'eltd-like-', '', $_POST['likes_id'] );
			$post_id = substr( $post_id, 0, - 4 );
			$type    = isset( $_POST['type'] ) ? $_POST['type'] : '';
			
			echo wp_kses( $this->like_post( $post_id, 'update', $type ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			) );
		} //get
		else {
			$post_id = str_replace( 'eltd-like-', '', $_POST['likes_id'] );
			$post_id = substr( $post_id, 0, - 4 );
			echo wp_kses( $this->like_post( $post_id, 'get' ), array(
				'span' => array(
					'class'       => true,
					'aria-hidden' => true,
					'style'       => true,
					'id'          => true
				),
				'i'    => array(
					'class' => true,
					'style' => true,
					'id'    => true
				)
			) );
		}
		
		exit;
	}
	
	public function like_post( $post_id, $action = 'get', $type = '' ) {
		if ( ! is_numeric( $post_id ) ) {
			return;
		}
		
		switch ( $action ) {
			
			case 'get':
				$like_count = get_post_meta( $post_id, '_eltd-like', true );

				if ( isset( $_COOKIE[ 'eltd-like_' . $post_id ] ) ) {
					$text = esc_html__('liked', 'albergo');
				} else {
					if ($like_count == 1){
						$text = esc_html__('like', 'albergo');
					}
					else{
						$text = esc_html__('likes', 'albergo');
					}
				}

				if ( ! $like_count ) {
					$like_count = 0;
					add_post_meta( $post_id, '_eltd-like', $like_count, true );
				}

				$return_value = "<span>" . esc_attr( $like_count ) . "</span><span> ".$text."</span>";

				return $return_value;
				break;
			
			case 'update':
				$like_count = get_post_meta( $post_id, '_eltd-like', true );
				
				if ( isset( $_COOKIE[ 'eltd-like_' . $post_id ] ) ) {
					return $like_count;
				}

				$text = esc_html__('liked', 'albergo');
				
				$like_count ++;
				
				update_post_meta( $post_id, '_eltd-like', $like_count );
				setcookie( 'eltd-like_' . $post_id, $post_id, time() * 20, '/' );

				$return_value = "<span>" . esc_attr( $like_count ) . "</span> ".$text;

				return $return_value;
				
				break;
			default:
				return '';
				break;
		}
	}
	
	public function add_like() {
		global $post;
		
		$output = $this->like_post( $post->ID );
		
		$class       = 'eltd-like';
		$rand_number = rand( 100, 999 );
		$title       = esc_html__( 'Like this', 'albergo' );
		
		if ( isset( $_COOKIE[ 'eltd-like_' . $post->ID ] ) ) {
			$class = 'eltd-like liked';
			$title = esc_html__( 'You already like this!', 'albergo' );
		}
		
		return '<a href="#" class="' . $class . '" id="eltd-like-' . $post->ID . '-' . $rand_number . '" title="' . $title . '">' . $output . '</a>';
	}
}

if ( ! function_exists( 'albergo_elated_create_like' ) ) {
	function albergo_elated_create_like() {
		AlbergoElatedLike::get_instance();
	}
	
	add_action( 'after_setup_theme', 'albergo_elated_create_like' );
}