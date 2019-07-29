<?php
$post_classes[] = 'eltd-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-heading">
            <?php albergo_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-info-top">
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="eltd-post-text-main">
                    <?php albergo_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
                <?php if(albergo_elated_options()->getOptionValue( 'blog_tags' ) == 'yes') { ?>
                <div class="eltd-post-info-bottom clearfix">
                    <div class="eltd-post-info-bottom-left">
	                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</article>