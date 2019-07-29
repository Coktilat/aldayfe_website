<?php get_header(); ?>
<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$jws_theme_show_page_title = (int) isset($jws_theme_options['jws_theme_portfolio_show_page_title']) ? $jws_theme_options['jws_theme_portfolio_show_page_title'] : 1;
$jws_theme_show_page_breadcrumb = (int) isset($jws_theme_options['jws_theme_portfolio_show_page_breadcrumb']) ? $jws_theme_options['jws_theme_portfolio_show_page_breadcrumb'] : 1;

$jws_theme_show_post_nav = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_nav']) ?  $jws_theme_options['jws_theme_portfolio_show_post_nav']: 1;
$jws_theme_show_post_comment = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_comment']) ?  $jws_theme_options['jws_theme_portfolio_show_post_comment']: 1;
$jws_theme_portfolio_show_post_related = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_related']) ?  $jws_theme_options['jws_theme_portfolio_show_post_related']: 1;
$jws_theme_portfolio_no_post_related = (int) isset($jws_theme_options['jws_theme_portfolio_no_post_related']) ?  $jws_theme_options['jws_theme_portfolio_no_post_related']: 3;
$columns = $jws_theme_portfolio_no_post_related > 0 ? $jws_theme_portfolio_no_post_related : 3;
?>
	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php
				$jws_theme_blog_layout = isset($jws_theme_options['jws_theme_portfolio_layout']) ? $jws_theme_options['jws_theme_portfolio_layout'] : '3cm';
				
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
				<div class="<?php echo esc_attr($cl_content) ?> content tb-blog">
					<?php
					while ( have_posts() ) : the_post();
						$post_id = get_the_ID();
						get_template_part( 'framework/templates/portfolio/single/entry');
						// Previous/next post navigation.
						if($jws_theme_show_post_nav) jws_theme_post_nav();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( (comments_open() && $jws_theme_show_post_comment) || (get_comments_number() && $jws_theme_show_post_comment) ) comments_template();
					endwhile;
					?>
					<?php if($jws_theme_portfolio_show_post_related) { ?>
					<div class="tb-blog-related tb-porfolio-carousel3">

						<?php
						$args = array( 
							'post_type'=>'portfolio',
							'numberposts' => $jws_theme_portfolio_no_post_related,
							'post__not_in' => array($post_id)
						);
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'portfolio_category',
								'field' => 'term_id',
								'terms' => wp_get_object_terms( $post->ID, 'portfolio_category', array('fields'=>'ids' ) )
							)
						);
						$related = get_posts( $args );

						if( $related ) {
						$tpl = isset( $jws_theme_options['jws_theme_archive_portfolio_template'] ) ? $jws_theme_options['jws_theme_archive_portfolio_template'] : 'tpl2';
						echo '<div class="tb-title text-center"><h4>'. __('Relate works','laforat') .'</h4></div>
							<div id="tb-list-porfolio" class="owl-carousel '. $tpl .'">';
							foreach( $related as $post ) {
							setup_postdata($post); 
								if(has_post_thumbnail()){
									$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false);
									$image_resize = matthewruddy_image_resize( $attachment_image[0], 600, 400, true, false );
									$columns = 3;
									$show_viewmore = isset( $jws_theme_options['jws_theme_archive_portfolio_show_view_more'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_view_more'] : 1;
									$show_readmore = isset( $jws_theme_options['jws_theme_archive_portfolio_show_view_now'] ) ? $jws_theme_options['jws_theme_archive_portfolio_show_view_now'] : 1;
									?>
									<!-- <div class="col-xs-12"> -->
										<?php
											if( $tpl == 'tpl2' ){
												include( locate_template( 'framework/templates/portfolio/portfolio-lightbox.php' ) );
											}else{
												include( locate_template( 'framework/templates/portfolio/porfolio.php' ) );
											}
										?>
									<!-- </div> -->
									<?php
								}
							} 
						echo '</div>';
						}
						wp_reset_postdata(); 
						?>
					</div>
					<?php } ?>
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