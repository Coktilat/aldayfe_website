<li class="eltd-blog-slider-item">
	<div class="eltd-blog-slider-item-inner">
		<div class="eltd-item-image">
			<a itemprop="url" href="<?php echo get_permalink(); ?>">
				<?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
			</a>
		</div>
		<div class="eltd-bli-content">
			<?php albergo_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
			
			<div class="eltd-bli-excerpt">
				<?php albergo_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
				<?php albergo_elated_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
			</div>
		</div>
	</div>
</li>