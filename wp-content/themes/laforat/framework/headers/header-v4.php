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
<div class="tb-header-wrap tb-header-v4 <?php if( $jws_theme_header_full ) echo 'tb-layout-fullwidth ';echo esc_attr(implode(' ', $jws_theme_header_class)); ?>">
	<!-- Start Header Sidebar -->
	<?php if($jws_theme_display_widget_top) { ?>
		<div class="tb-header-top">
			<div class="container">
				<div class="all_header_top">
				<!-- Start Sidebar Top Left -->
				<?php if(is_active_sidebar( 'tbtheme-header-top-widget-3' )){ ?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
						<div class="tb-sidebar tb-sidebar-left"><?php dynamic_sidebar("tbtheme-header-top-widget-3");?></div>
					</div>
				<?php } ?>
				<!-- End Sidebar Top Left -->
				<!-- Start Sidebar Top Right -->
				<?php if(is_active_sidebar( 'tbtheme-header-top-widget-4' )){ ?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
						<div class="tb-sidebar tb-sidebar-right"><?php dynamic_sidebar("tbtheme-header-top-widget-4");?></div>
					</div>
				<?php } ?>
				<!-- End Sidebar Top Right -->
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Header Sidebar -->
	<!-- Start Header Menu -->
	<div class="header-top-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 text-left">
					<div class="tb-sidebar tb-sidebar-left">
						<?php if(is_active_sidebar('tbtheme-header-top-widget-2')){ dynamic_sidebar("tbtheme-header-top-widget-2");} ?>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-3 col-md-6 col-lg-8 text-center">
					<div class="tb-logo">
						<a href="<?php echo esc_url(home_url()); ?>">
							<?php jws_theme_logo(); ?>
						</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-3 col-lg-2 text-right">
					<?php if(is_active_sidebar('tbtheme-woo-sidebar')) { ?> 
					<div id="tb-lg-menu-sidebar" class="tb-menu-sidebar">
						<?php dynamic_sidebar('tbtheme-woo-sidebar');?>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="tb-header-menu">
		<div class="container">
			<div class="tb-header-menu-inner">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 text-left">
					<div class="tb-logo">
						<a href="<?php echo esc_url(home_url()); ?>">
							<?php jws_theme_logo(); ?>
						</a>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
					<div class="tb-menu">
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
					<?php if(is_active_sidebar('tbtheme-header-top-widget-3-for-3')) { ?> 
						<div class="tb-menu-sreach">
							<?php dynamic_sidebar('tbtheme-header-top-widget-3-for-3');?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Header Menu -->