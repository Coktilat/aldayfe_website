<li class="eltd-bl-item eltd-item-space clearfix">
	<div class="eltd-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			albergo_elated_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="eltd-bli-content" <?php albergo_elated_inline_style($content_styles); ?>>
            <?php if ($post_info_section == 'yes') { ?>
                <div class="eltd-bli-info">
	                <?php
		                if ( $post_info_date == 'yes' ) {
			                albergo_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		                }
		                if ( $post_info_category == 'yes' ) {
			                albergo_elated_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                albergo_elated_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                albergo_elated_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                albergo_elated_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }

	                ?>
                </div>
            <?php } ?>

	        <?php albergo_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="eltd-bli-excerpt">
		        <?php albergo_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php
		        if ( $post_read_more == 'yes' ) {
			        albergo_elated_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params );
		        }?>
				<?php
				if ( $post_info_share == 'yes' ) {
					albergo_elated_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
				}
				?>
	        </div>
        </div>
	</div>
</li>