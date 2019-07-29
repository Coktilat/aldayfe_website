<?php
$eltd_blog_type = albergo_elated_get_archive_blog_list_layout();
albergo_elated_include_blog_helper_functions( 'lists', $eltd_blog_type );
$eltd_holder_params = albergo_elated_get_holder_params_blog();

get_header();
albergo_elated_get_title();
do_action('albergo_elated_before_main_content');
?>

<div class="<?php echo esc_attr( $eltd_holder_params['holder'] ); ?>">
	<?php do_action( 'albergo_elated_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $eltd_holder_params['inner'] ); ?>">
		<?php albergo_elated_get_blog( $eltd_blog_type ); ?>
	</div>
	
	<?php do_action( 'albergo_elated_before_container_close' ); ?>
</div>

<?php do_action( 'albergo_elated_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>