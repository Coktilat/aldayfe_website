<?php
	$jws_theme_options = $GLOBALS['jws_theme_options'];
	$jws_theme_header_fixed = jws_theme_get_object_id('jws_theme_header_fixed');
	$jws_theme_header_full = jws_theme_get_object_id('jws_theme_header_full', true);
	$jws_theme_custom_menu =  jws_theme_get_object_id('jws_theme_custom_menu');
	$jws_theme_background_version = jws_theme_get_object_id('jws_theme_background_version', true);
	$jws_theme_display_widget_top = jws_theme_get_object_id('jws_theme_display_widget_top');
	 if(is_single() || is_archive() || is_category() ||  is_search()) {
	 	$jws_theme_header_fixed = 0;
	 	$jws_theme_display_widget_top = 1;
	 }
	$jws_theme_header_class = array();
    if($jws_theme_header_fixed) $jws_theme_header_class[] = 'tb-header-fixed';
    if($jws_theme_options['jws_theme_stick_header']) $jws_theme_header_class[] = 'tb-header-stick';
	if($jws_theme_background_version) $jws_theme_header_class[] = 'background_default';
?>
<div class="clearfix">
<div class="tb-header-wrap ct-inc-megamenu tb-header-v5 <?php echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
	<!-- Start Header Sidebar -->
	<div class="mobile-header">
		<div class="tb-logo">
			<a href="<?php echo esc_url(home_url()); ?>">
				<?php jws_theme_logo(); ?>
			</a>
		</div>
		<a id="mobile-bar-v4" href="javascript:;" class="fa fa-bars"></a>
	</div>
	<div class="mobile-leftbar text-center" tabindex="0">
		<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
			<div id="tb-lg-menu-sidebar" class="tb-menu-sidebar">
				<?php dynamic_sidebar('tbtheme-woo-sidebar');?>
			</div>
		<?php } ?>
		<div class="tb-logo">
			<a href="<?php echo esc_url(home_url()); ?>">
				<?php jws_theme_logo(); ?>
			</a>
		</div>
		<a class="br-button hiden-md hidden-lg fa fa-close" href="javascript:;"></a>
		<?php
		$arr = array(
			'theme_location'  => 'main_navigation',
			'menu'            => '',
			'container'       => '',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'mobile-nav',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);
		if (has_nav_menu('main_navigation')) {
			wp_nav_menu( $arr );
		} else {
			wp_page_menu();
		}
		?>
	</div>
</div>
<!-- End Header Menu -->
<div class="col-lg-offset-26 col-lg-94 ">
<div class="tb-header-wrap tb-header-v5<?php echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
<!-- Start Header Sidebar -->
	<?php if($jws_theme_display_widget_top) { ?>
		<div class="tb-header-top">
			<div class="container">
				<div class="row">
					<!-- Start Sidebar Top Left -->
					<?php if(is_active_sidebar( 'tbtheme-header-top-widget-2' )){ ?>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
							<div class="tb-sidebar tb-sidebar-left"><?php dynamic_sidebar("tbtheme-header-top-widget-2");?></div>
						</div>
					<?php } ?>
					<!-- End Sidebar Top Left -->
					<!-- Start Sidebar Top Right -->
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
						<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
							<div class="tb-menu-sidebar">
								<?php dynamic_sidebar('tbtheme-woo-sidebar');?>
							</div>
						<?php } ?>
					</div>
				
					<!-- End Sidebar Top Right -->
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<!-- End Header Sidebar -->