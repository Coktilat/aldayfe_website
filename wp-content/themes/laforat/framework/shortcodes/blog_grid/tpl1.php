<article <?php post_class(); ?>>
	<div class="tb-post-item">
		<?php if($show_thumb) { ?>
			<a href="<?php the_permalink(); ?>">
				<div class="show_meta_day_month">
						<h2 class="the_dated"><?php echo get_the_date('d');?></h2>
						<h2 class="the_datec"><?php echo get_the_date('M');?></h2>
				</div>
				<div class="tb-thumb tb-image">
					<?php the_post_thumbnail($thumb_size); ?>
				</div>
			</a>
		<?php } ?>
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
				<a class="tb-readmore <?php if( $readmore_block ) echo ' block';?>" href="<?php the_permalink(); ?>"><?php echo esc_attr( $readmore_text ); ?></a>
			<?php } ?>
		</div>
	</div>
</article>