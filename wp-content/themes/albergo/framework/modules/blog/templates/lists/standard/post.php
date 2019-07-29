<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-heading">
            <?php albergo_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-info-top">
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>

                </div>
                <div class="eltd-post-text-main">
                    <?php albergo_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('albergo_elated_single_link_pages'); ?>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $part_params); ?>
                </div>
                <div class="eltd-post-info-bottom clearfix">
                    <div class="eltd-post-info-bottom-left">
                        <?php if(albergo_elated_options()->getOptionValue( 'blog_tags' ) == 'yes') {
                        albergo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                        } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</article>