<?php do_action('albergo_elated_before_page_title'); ?>

<div class="eltd-title-holder <?php echo esc_attr($holder_classes); ?>" <?php albergo_elated_inline_style($holder_styles); ?> <?php echo albergo_elated_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="eltd-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_html($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="eltd-title-wrapper" <?php albergo_elated_inline_style($wrapper_styles); ?>>
		<div class="eltd-title-inner">
			<div class="eltd-grid">
				<?php albergo_elated_custom_breadcrumbs(); ?>
			</div>
	    </div>
	</div>
</div>

<?php do_action('albergo_elated_after_page_title'); ?>
