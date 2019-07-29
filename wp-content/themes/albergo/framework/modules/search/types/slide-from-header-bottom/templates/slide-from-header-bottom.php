<div class="eltd-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="eltd-form-holder">
			<input type="text" placeholder="<?php esc_html_e( 'Search', 'albergo' ); ?>" name="s" class="eltd-search-field" autocomplete="off" />
			<button type="submit" class="eltd-search-submit"><?php echo albergo_elated_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
		</div>
	</form>
</div>