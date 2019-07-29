<?php get_header(); ?>
<?php 
$jws_theme_options = $GLOBALS['jws_theme_options'];
// $jws_theme_show_page_title = isset($jws_theme_options['jws_theme_post_show_page_title']) ? $jws_theme_options['jws_theme_post_show_page_title'] : 1;
$tpl = isset( $jws_theme_options['jws_theme_archive_portfolio_template'] ) ? $jws_theme_options['jws_theme_archive_portfolio_template'] : 'tpl';
$columns = isset( $jws_theme_options['jws_theme_archive_portfolio_column'] ) ? $jws_theme_options['jws_theme_archive_portfolio_column'] : '3';
// $jws_theme_show_page_breadcrumb = isset($jws_theme_options['jws_theme_post_show_page_breadcrumb']) ? $jws_theme_options['jws_theme_post_show_page_breadcrumb'] : 1;
wp_enqueue_script('jquery.mixitup.min', JWS_THEME_URI_PATH . '/assets/js/jquery.mixitup.min.js',array(),"2.1.5");

?>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php
				$jws_theme_blog_layout = isset($jws_theme_options['jws_theme_blog_layout']) ? $jws_theme_options['jws_theme_blog_layout'] : '3cm';
				
				$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				$cl_sb_left = '';
				$cl_sb_right = '';
				
				switch ($jws_theme_blog_layout) {
					case '1col':
						$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
						$cl_sb_left = '';
						$cl_sb_right = '';
						break;
					case '2cl':
						if(is_active_sidebar( 'tbtheme-left-sidebar' )){
							$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
							$cl_sb_left = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}
						break;
					case '2cr':
						if(is_active_sidebar( 'tbtheme-right-sidebar' )){
							$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
							$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}
						break;
					case '3cm':
						if(is_active_sidebar( 'tbtheme-left-sidebar' ) && is_active_sidebar( 'tbtheme-right-sidebar' )){
							$cl_content = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							$cl_sb_left = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
							$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
						}else{
							if(is_active_sidebar( 'tbtheme-left-sidebar' )){
								$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
								$cl_sb_left = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							}
							if(is_active_sidebar( 'tbtheme-right-sidebar' )){
								$cl_content = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
								$cl_sb_right = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
							}
						}
						break;
				}
				?>
				<!-- Start Left Sidebar -->
				<?php if($jws_theme_blog_layout == '2cl' && is_active_sidebar( 'tbtheme-left-sidebar' ) || ($jws_theme_blog_layout == '3cm' && is_active_sidebar( 'tbtheme-left-sidebar' ))){ ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> sidebar-area">
						<?php get_sidebar('left'); ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content">
					<?php
					if( have_posts() ) {
						
						$class_columns = null;
						$class=array('tb-portfolio-grid-wrapper');
						switch ($columns) {
							case 1: $class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
								break;
							case 2: $class_columns[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
								break;
							case 3: $class_columns[] = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
								break;
							case 4: $class_columns[] = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
								break;
							default: $class_columns[] = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
								break;
						}
						$class[]=$tpl;
						$show_filter = isset( $jws_theme_options['jws_theme_archive_portfolio_show_filter'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_filter'] : 1;
						$show_pagination = isset( $jws_theme_options['jws_theme_archive_portfolio_show_page'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_page'] : 1;
						$show_viewmore = isset( $jws_theme_options['jws_theme_archive_portfolio_show_view_more'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_view_more'] : 1;
						$show_readmore = isset( $jws_theme_options['jws_theme_archive_portfolio_show_view_now'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_view_now'] : 1;
						$no_padding = isset( $jws_theme_options['jws_theme_archive_portfolio_no_pading'] ) ? $jws_theme_options['jws_theme_archive_portfolio_no_pading'] : 0;
						$atts = array(
							'show_filter' => $show_filter,
							'show_pagination' => $show_pagination,
							'show_viewmore' => $show_viewmore,
							'show_readmore' => $show_readmore,
							'no_padding' => $no_padding,
							'tpl' => $tpl,
							'columns' => $columns
						);
						if( $no_padding ){
							$class[] = 'no-padding';
						}

						?>
						<div id="tb-list-porfolio" class="<?php echo esc_attr(implode(' ', $class)); ?>">

								<?php if( $show_filter ) { ?>

									<ul class="controls-filter list-unstyled list-inline text-center">

										<li class="filter active" data-filter="all"><a href="javascript:void(0);"><?php _e('All Work', 'laforat');?></a></li>

										<?php

											$terms = get_terms('portfolio_category');

											if ( !empty( $terms ) && !is_wp_error( $terms ) ){

												foreach ( $terms as $term ) {

												?>

													<li class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><a href="javascript:void(0);"><?php echo esc_html($term->name); ?></a></li>

												<?php

												}

											}

										?>

									</ul>

								<?php } ?>

								<div id="porfolio-container" class="row tb-grid-content tb-portfolio<?php if( !$show_filter ) echo ' no-filter';?>">
									<?php
									global $wp_query;
									 while ( have_posts() ) { the_post();
										if( $tpl == 'tpl2' ){
											include( locate_template( 'framework/templates/portfolio/portfolio-lightbox.php' ) );
										}else{
											include( locate_template( 'framework/templates/portfolio/porfolio.php' ) );
										}
									} ?>
								</div>
								<div class="tb-porfolio-footer">
									<?php if(  $show_viewmore && $wp_query->max_num_pages > 1 && $paged < $wp_query->max_num_pages  ) {
										global $wp_query;
										$args = $wp_query->query_vars;
										foreach( $args as $k=>$v){
											if( empty( $v ) ){
												unset( $args[$k] );
											}
										}
									 ?>
										<div class="tb-viewmore text-center <?php if($show_pagination) echo 'has_pagination'; ?>">

											<div class="tb-btn-viewmore"><a id="tb-btn-viewmore" class="btn-transparent" data-options='<?php echo esc_attr( json_encode( $atts ) );?>' data-args='<?php echo esc_attr( json_encode( $args ) );?>' href="#page/<?php echo intval( $paged + 1 );?>"><?php _e('View More','laforat');?></a></div>

										</div>
									<?php } ?>

									<?php if($show_pagination){ ?>

										<nav class="pagination tb-pagination" role="navigation">

											<?php

												$big = 999999999; // need an unlikely integer



												echo paginate_links( array(

													'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),

													'format' => '?paged=%#%',

													'current' => max( 1, get_query_var('paged') ),

													'total' => $wp_query->max_num_pages,

													'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'laforat' ),

													'next_text' => __( '<i class="fa fa-angle-right"></i>', 'laforat' ),

												) );

											?>

										</nav>

									<?php } wp_reset_postdata(); ?>

								</div>

							</div>
						<?php
					}else{
						get_template_part( 'framework/templates/entry', 'none');
					}
					?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if(($jws_theme_blog_layout == '2cr' && is_active_sidebar( 'tbtheme-right-sidebar' )) || ($jws_theme_blog_layout == '3cm' && is_active_sidebar( 'tbtheme-right-sidebar' ))){ ?>
					<div class="<?php echo esc_attr($cl_sb_right) ?> sidebar-area">
						<?php get_sidebar('right'); ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>