<?php
/*
Template Name: Full Width
*/
?>
<?php
$eltd_sidebar_layout = albergo_elated_sidebar_layout();

get_header();
albergo_elated_get_title();
get_template_part( 'slider' );
do_action('albergo_elated_before_main_content');
?>

<div class="eltd-full-width">
    <?php do_action( 'albergo_elated_after_container_open' ); ?>
	<div class="eltd-full-width-inner">
        <?php do_action( 'albergo_elated_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="eltd-grid-row">
				<div <?php echo albergo_elated_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'albergo_elated_page_after_content' );
					?>
				</div>
				<?php if ( $eltd_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo albergo_elated_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'albergo_elated_before_container_inner_close' ); ?>
	</div>

    <?php do_action( 'albergo_elated_before_container_close' ); ?>
</div>

<?php get_footer(); ?>