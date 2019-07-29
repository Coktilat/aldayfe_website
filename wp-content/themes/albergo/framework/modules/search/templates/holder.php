<div class="eltd-grid-row">
	<div <?php echo albergo_elated_get_content_sidebar_class(); ?>>
		<div class="eltd-search-page-holder">
			<?php albergo_elated_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'albergo_elated_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo albergo_elated_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>