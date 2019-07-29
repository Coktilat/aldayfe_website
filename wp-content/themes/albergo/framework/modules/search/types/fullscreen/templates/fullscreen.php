<div class="eltd-fullscreen-search-holder">
	<a class="eltd-fullscreen-search-close" href="javascript:void(0)">
		<?php echo albergo_elated_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ); ?>
	</a>
	<div class="eltd-fullscreen-search-table">
		<div class="eltd-fullscreen-search-cell">
			<div class="eltd-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="eltd-fullscreen-search-form" method="get">
					<div class="eltd-form-holder">
						<div class="eltd-form-holder-inner">
							<div class="eltd-field-holder">
								<input type="text" placeholder="<?php esc_html_e( 'Search for...', 'albergo' ); ?>" name="s" class="eltd-search-field" autocomplete="off"/>
							</div>
							<button type="submit" class="eltd-search-submit"><?php echo albergo_elated_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
							<div class="eltd-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>