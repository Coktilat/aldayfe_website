<?php
$jws_theme_options = $GLOBALS['jws_theme_options'];
$image_default = isset($jws_theme_options['jws_theme_portfolio_image_default']) ? $jws_theme_options['jws_theme_portfolio_image_default'] : '';
if(is_home()){
	$jws_theme_show_post_title = 1;
	$jws_theme_show_post_desc = 1;
	$jws_theme_show_post_info = 1;
}elseif (is_single()) {
	$jws_theme_portfolio_crop_image = isset($jws_theme_options['jws_theme_post_crop_image']) ? $jws_theme_options['jws_theme_post_crop_image'] : 0;
	$jws_theme_portfolio_image_width = (int) isset($jws_theme_options['jws_theme_post_image_width']) ? $jws_theme_options['jws_theme_post_image_width'] : 800;
	$jws_theme_portfolio_image_height = (int) isset($jws_theme_options['jws_theme_post_image_height']) ? $jws_theme_options['jws_theme_post_image_height'] : 400;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_post_show_post_title']) ? $jws_theme_options['jws_theme_post_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_post_show_post_info']) ? $jws_theme_options['jws_theme_post_show_post_title'] : 1;
	$jws_theme_post_show_social_share = (int) isset($jws_theme_options['jws_theme_post_show_social_share']) ? $jws_theme_options['jws_theme_post_show_social_share'] : 1;
	$jws_theme_post_show_post_tags = (int) isset($jws_theme_options['jws_theme_post_show_post_tags']) ? $jws_theme_options['jws_theme_post_show_post_tags'] : 1;
	$jws_theme_post_show_post_author = (int) isset($jws_theme_options['jws_theme_post_show_post_author']) ? $jws_theme_options['jws_theme_post_show_post_author'] : 1;
	$jws_theme_show_post_desc = 1;
}else{
	$jws_theme_portfolio_crop_image = isset($jws_theme_options['jws_theme_portfolio_crop_image']) ? $jws_theme_options['jws_theme_portfolio_crop_image'] : 0;
	$jws_theme_portfolio_image_width = (int) isset($jws_theme_options['jws_theme_portfolio_image_width']) ? $jws_theme_options['jws_theme_portfolio_image_width'] : 600;
	$jws_theme_portfolio_image_height = (int) isset($jws_theme_options['jws_theme_portfolio_image_height']) ? $jws_theme_options['jws_theme_portfolio_image_height'] : 400;
	$jws_theme_show_post_title = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_title']) ? $jws_theme_options['jws_theme_portfolio_show_post_title'] : 1;
	$jws_theme_show_post_info = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_info']) ? $jws_theme_options['jws_theme_portfolio_show_post_title'] : 1;
	$jws_theme_show_post_desc = (int) isset($jws_theme_options['jws_theme_portfolio_show_post_desc']) ? $jws_theme_options['jws_theme_portfolio_show_post_desc'] : 1;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php if (has_post_thumbnail()) {
     ?>
        <div class="tb-blog-image text-center">
            <!-- Get Thumb -->
            <div class="tb-portfolio-flexslider flexslider">
            	<ul class="slides">
            		<li><?php the_post_thumbnail('laforat-single-portfolio'); ?></li>
            		<?php $galleries = get_post_meta( get_the_ID(), 'jws_theme_galleries', true);
            		if( $galleries ):
            			$galleries = explode( ',', $galleries );
            			foreach( $galleries as $src ):
            		?>
            			<li><img src="<?php echo esc_url( $src );?>" alt="<?php the_title();?>-gallery" class="img-responsive"></li>
            		<?php endforeach; endif; ?>
				</ul>
			</div>
        </div>
    <?php } ?>
	
	<div class="tb-content-block">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<?php if($jws_theme_show_post_title) echo jws_theme_theme_title_render(); ?>
				<?php if($jws_theme_show_post_desc) echo jws_theme_theme_content_render(); ?>
			</div>
			<div class="col-sm-4 col-md-3">
				<ul class="tb-portfolio-info list-unstyled">
					<?php
						$list_info = array('date'=>__('Date','laforat'),'client'=>__('Client','laforat'),'location'=>__('Location','laforat'));
						$k= 0;
						foreach( $list_info as $key=>$info ):
							$$key = get_post_meta( get_the_ID(), 'jws_theme_'. $key, true );
							if( $k ===1 ):
							?>
							<li><span><?php _e('Categories','laforat'); ?>:</span> <?php the_terms( get_the_ID(), 'portfolio_category','', ', '); ?></li>
							<?php
							endif;
							if( !empty( $$key ) ):
						?>
							<li>
								<span><?php echo $info;?>:</span> <?php echo esc_attr( $$key ); ?>
							</li>
					<?php endif;$k++;endforeach; ?>
					<?php if($jws_theme_show_post_info): ?>
						<li>
							<?php echo jws_theme_theme_info_bar_render(); ?>
						</li>
					<?php endif;?>
					<?php if($jws_theme_post_show_social_share): ?>
						<li>
						<?php echo jws_theme_theme_social_share_post_render(); ?>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		
	</div>
	
</article>