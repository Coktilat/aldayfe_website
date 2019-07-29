<li class="eltd-blog-slider-item">
    <div class="eltd-blog-slider-item-inner">
        <div class="eltd-item-image">
            <a itemprop="url" href="<?php echo get_permalink(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
            </a>
        </div>
        <div class="eltd-item-text-wrapper">
            <div class="eltd-item-text-holder">
                <div class="eltd-item-text-holder-inner">
	                <?php if($post_info_date == 'yes' || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes'){ ?>
		                <div class="eltd-item-info-section">
			                <?php
			                if ($post_info_date == 'yes') {
				                albergo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
			                }
			                if ($post_info_category == 'yes') {
				                albergo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
			                }
			                if ($post_info_author == 'yes') {
				                albergo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
			                }
			                if ($post_info_comments == 'yes') {
				                albergo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
			                }
			                ?>
		                </div>
	                <?php } ?>
	
	                <?php albergo_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
                </div>
            </div>
        </div>
    </div>
</li>