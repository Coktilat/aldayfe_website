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
<div class="tb-header-wrap tb-header-v3 <?php if( $jws_theme_header_full ) echo 'tb-layout-fullwidth ';echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
	<!-- Start Header Sidebar -->
	<?php if($jws_theme_display_widget_top) { ?>
		<div class="tb-header-top">
			<div class="container">
				<div class="row">
					<!-- Start Sidebar Top Left -->
					<?php if(is_active_sidebar( 'tbtheme-header-top-widget-1' )){ ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-left">
						<div class="tb-sidebar tb-sidebar-left"><?php dynamic_sidebar("tbtheme-header-top-widget-1");?>
						</div>
					</div>
					<?php } ?>
					<!-- End Sidebar Top Left -->
					<!-- Start Sidebar Top Center -->
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
						<div class="tb-logo">
							<a href="<?php echo esc_url(home_url()); ?>">
								<?php jws_theme_logo(); ?>
							</a>
						</div>
					</div>
					<!-- End Sidebar Top Center -->
					<!-- Start Sidebar Top Right -->
					<?php if(is_active_sidebar( 'tbtheme-header-top-widget-2' )){ ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-right">
						<div class="tb-sidebar tb-sidebar-right"><?php 	dynamic_sidebar("tbtheme-header-top-widget-2");?>
						</div>
					</div>
					<?php } ?>
					<!-- End Sidebar Top Right -->
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Header Sidebar -->
	<!-- Start Header Menu -->
	<div class="tb-header-menu tb-header-menu-md">
		<div class="container">
			<div class="tb-header-menu-inner">
				<div class="row">
					<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 text-center">
						<div class="tb-menu">
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
							<div class="tb-menu-control-mobi">
								<a href="javascript:void(0)"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 text-right">
						<?php if(is_active_sidebar('tbtheme-header-top-widget-3-for-3')) { ?> 
							<div class="<?php if( $jws_theme_header_full ) echo 'hidden-lg';?> tb-menu-sidebar">
								<?php if( !$jws_theme_header_full ) dynamic_sidebar('tbtheme-header-top-widget-3-for-3');?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Header Menu -->