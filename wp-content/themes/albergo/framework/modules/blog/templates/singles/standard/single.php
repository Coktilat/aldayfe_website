<?php

albergo_elated_get_single_post_format_html($blog_single_type);

do_action('albergo_elated_after_article_content');

albergo_elated_get_module_template_part('templates/parts/single/author-info', 'blog');

albergo_elated_get_module_template_part('templates/parts/single/single-navigation', 'blog');

albergo_elated_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

albergo_elated_get_module_template_part('templates/parts/single/comments', 'blog');