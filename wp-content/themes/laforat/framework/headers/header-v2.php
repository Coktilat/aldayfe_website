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
<div class="tb-header-wrap tb-header-v2 <?php if( $jws_theme_header_full ) echo 'tb-layout-fullwidth ';echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
	<!-- Start Header Menu -->
	<?php if( $jws_theme_header_full ):?>
	<div class="tb-header-menu-db tb-relative">
	<?php endif; ?>
		<div class="tb-header-menu tb-header-menu-md">
			<div class="header_sub">
				<div class="container">
					<div class="tb-header-menu-inner">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
								<div class="tb-menu text-left">
									<div class="tb-logo">
										<a href="<?php echo esc_url(home_url()); ?>">
											<?php jws_theme_logo(); ?>
										</a>
									</div>
									<?php
									$arr = array(
										'theme_location' => 'main_navigation',
										'menu_id' => 'nav',
										'container_class' => 'tb-menu-list',
										'menu_class'      => 'tb-menu-list-inner',
										'echo'            => true,
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
									);
									if($jws_theme_custom_menu){
										$arr['menu'] = $jws_theme_custom_menu;
									}
									if (has_nav_menu('main_navigation')) {
										wp_nav_menu( $arr );
									}else{ ?>
									<div class="menu-list-default">
										<?php wp_page_menu();?>
									</div>    
									<?php } ?>
									
									<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
										<div class="<?php if( $jws_theme_header_full ) echo 'hidden-lg';?> tb-menu-sidebar">
											<?php if( !$jws_theme_header_full ) dynamic_sidebar('tbtheme-woo-sidebar');?>
										</div>
									<?php } ?>
									
									<div class="tb-menu-control-mobi">
										<a href="javascript:void(0)"><i class="fa fa-bars"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if( $jws_theme_header_full ):?>
				<div class="visible-lg tb-menu-lg tb-logo pull-left">
					<a href="<?php echo esc_url(home_url()); ?>">
						<?php jws_theme_logo(); ?>
					</a>
				</div>
				<div class="visible-lg tb-menu tb-menu-lg pull-right">
					<?php if(is_active_sidebar('tbtheme-header-top-widget-2')) { ?> 
						<div id="tb-lg-menu-sidebar" class="tb-menu-sidebar">
							<?php dynamic_sidebar("tbtheme-header-top-widget-2");?>
						</div>
					<?php } ?>
				</div>
			<?php endif; ?>
			</div>
			
		</div>
	<?php if( $jws_theme_header_full) echo '</div>'; ?>
</div>
<!-- End Header Menu -->