<?php
$show_readmore  = isset( $show_readmore ) ? $show_readmore  : 0;
$show_title  = isset( $show_title ) ? $show_title  : 1;
$show_category  = isset( $show_category ) ? $show_category  : 1;
$show_icon  = isset( $show_icon ) ? $show_icon  : 1;

$terms = wp_get_post_terms(get_the_ID(), 'portfolio_category');

if ( !empty( $terms ) && !is_wp_error( $terms ) ){

	$term_list = array();

	foreach ( $terms as $term ) {

		$term_list[] = $term->slug;

	}

}
if( ! isset( $class_columns) ) $class_columns = $columns = '';
?>

<div class="mix <?php if( !is_single() ){ echo esc_attr(implode(' ', $class_columns)).' '.esc_attr(implode(' ', $term_list)); } ?>" data-myorder="<?php echo get_the_ID(); ?>">

	<div class="tb-portfolio-item">
		<div class="image-icon">
			<div class="tb-action">
			<?php if($show_icon){?>
				<a href="#" class="thumb-hover-effect" <?php if( has_post_thumbnail() ){ echo 'data-src="'. wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0] .'"';}?>>
					<i class="fa fa-search"></i>
				</a>
				<a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
			<?php }?>
			</div>
			<div class="tb-thumb">
				<?php if ( has_post_thumbnail() ) {
					?>
				<div>
					<a class="thumb-hover-effect" href="<?php the_permalink();?>" data-src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' )[0]; ?>">
						<?php the_post_thumbnail('laforat-portfolio-thumb', array('class'=>'img-responsive'));?>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="tb-content text-center">
			<div class="tb-content-inner">
			<?php if( $show_category ) { ?>

				<span class="tb-categories"><?php the_terms(get_the_ID(), 'portfolio_category', '' , ', ' ); ?></span>

			<?php } ?>

			<?php if($show_readmore) { ?>

				<div class="tb-readmore">

					<a href="<?php the_permalink(); ?>"><?php _e('View Now', 'laforat');?></a>

				</div>

			<?php } ?>
			<?php if( $show_title ) {
				$title = get_post_meta( get_the_ID(), 'jws_theme_source_project', true);
				$title = ! empty( $title ) ? $title : get_the_title();
				?>

				<h5 class="tb-title"><a href="<?php the_permalink();?>"><?php echo esc_attr( $title ); ?></a></h5>
			<?php } ?>
			</div>

		</div>

	</div>
</div>