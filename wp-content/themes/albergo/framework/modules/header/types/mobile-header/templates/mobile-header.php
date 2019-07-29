<?php do_action('albergo_elated_before_mobile_header'); ?>

<header class="eltd-mobile-header">
	<?php do_action('albergo_elated_after_mobile_header_html_open'); ?>
	
	<div class="eltd-mobile-header-inner">
		<div class="eltd-mobile-header-holder">
			<div class="eltd-grid">
				<div class="eltd-vertical-align-containers">
					<div class="eltd-vertical-align-containers">
						<?php if($show_navigation_opener) : ?>
							<div class="eltd-mobile-menu-opener">
								<a href="javascript:void(0)">
									<span class="eltd-mobile-menu-icon">
										<?php echo albergo_elated_icon_collections()->renderIcon('icon_menu', 'font_elegant'); ?>
									</span>
									<?php if(!empty($mobile_menu_title)) { ?>
										<h5 class="eltd-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
									<?php } ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="eltd-position-center">
							<div class="eltd-position-center-inner">
								<?php albergo_elated_get_mobile_logo(); ?>
							</div>
						</div>
						<div class="eltd-position-right">
							<div class="eltd-position-right-inner">
								<?php if(is_active_sidebar('eltd-right-from-mobile-logo')) {
									dynamic_sidebar('eltd-right-from-mobile-logo');
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php albergo_elated_get_mobile_nav(); ?>
	</div>
	
	<?php do_action('albergo_elated_before_mobile_header_html_close'); ?>
</header>

<?php do_action('albergo_elated_after_mobile_header'); ?>