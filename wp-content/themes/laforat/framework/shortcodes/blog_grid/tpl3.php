<?php global $i;
	$i++;
if(($i<=2) && $i!=((2*$i)+1)):?>
<article <?php post_class();?>>
	<div class="tb-post-item one_left">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
			<?php if($show_thumb) { ?>
			<a href="<?php the_permalink(); ?>">
				<div class="tb-thumb tb-image">
					<?php the_post_thumbnail($thumb_size); ?>
				</div>
			</a>
		<?php } ?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
			<div class="tb-content">
				<?php if($show_title) { ?>
					<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
				<?php } ?>
				<?php if($show_info) { ?>
					<div class="tb-info">
						<?php echo jws_theme_info_bar_render(); ?>
					</div>
				<?php } ?>
				<?php if($show_excerpt) { ?>
					<div class="tb-excerpt">
						<?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), $excerpt_more); ?>
					</div>
				<?php } ?>
				<?php if($readmore_text) { ?>
					<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><span><?php echo esc_attr( $readmore_text ); ?></span></a>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
<?php else:?>
<article <?php post_class();?>>
	<div class="tb-post-item one_right">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left">
			<div class="tb-content">
				<?php if($show_title) { ?>
					<a href="<?php the_permalink(); ?>"><h4 class="tb-title"><?php the_title(); ?></h4></a>
				<?php } ?>
				<?php if($show_info) { ?>
					<div class="tb-info">
						<?php echo jws_theme_info_bar_render(); ?>
					</div>
				<?php } ?>
				<?php if($show_excerpt) { ?>
					<div class="tb-excerpt">
						<?php echo jws_theme_custom_excerpt(intval($excerpt_lenght), $excerpt_more); ?>
					</div>
				<?php } ?>
				<?php if($readmore_text) { ?>
					<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><span><?php echo esc_attr( $readmore_text ); ?></span></a>
				<?php } ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right">
			<?php if($show_thumb) { ?>
			<a href="<?php the_permalink(); ?>">
				<div class="tb-thumb tb-image">
					<?php the_post_thumbnail($thumb_size); ?>
				</div>
			</a>
		<?php } ?>
		</div>
	</div>
</article>
<?php endif;?>