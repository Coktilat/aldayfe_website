<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltd-post-content">
        <div class="eltd-post-text">
            <div class="eltd-post-text-inner">
                <div class="eltd-post-text-main">
                    <div class="eltd-post-mark">
                    </div>
                    <?php albergo_elated_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="eltd-post-info-top">
        <?php albergo_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
        <?php albergo_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
        <?php albergo_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
        <?php albergo_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
        <?php albergo_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
    </div>

    <div class="eltd-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="eltd-post-info-bottom clearfix">
        <div class="eltd-post-info-bottom-left">
            <?php albergo_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
        <div class="eltd-post-info-bottom-right">
            <?php albergo_elated_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>

</article>