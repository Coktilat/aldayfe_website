<?php

class AlbergoElatedSearchPostType extends AlbergoElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_search_post_type',
			esc_html__( 'Albergo Search Post Type', 'albergo' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'albergo' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'albergo_elated_search_post_type_widget_params_post_type', array( 'post' => 'Post' ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'albergo' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'albergo' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'eltd-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget eltd-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php albergo_elated_class_attribute( $search_type_class ); ?>>
				<input class="eltd-post-type-search-field" value="" placeholder="<?php esc_html_e( 'Search here', 'albergo' ) ?>">
				<i class="eltd-search-icon fa fa-search" aria-hidden="true"></i>
				<i class="eltd-search-loading fa fa-spinner fa-spin eltd-hidden" aria-hidden="true"></i>
			</div>
			<div class="eltd-post-type-search-results"></div>
		</div>
	<?php }
}