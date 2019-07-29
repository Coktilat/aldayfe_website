<?php
$title_tag = isset($link_tag) ? $link_tag : 'h5';
$post_link_meta = get_post_meta(get_the_ID(), "eltd_post_link_link_meta", true );


if(!empty($post_link_meta)) {
    $post_link = esc_html($post_link_meta);
}
else {
    $post_link = get_the_permalink();
}

?>

<div class="eltd-post-link-holder">
    <a itemprop="url" href="<?php echo esc_url($post_link); ?>" title="<?php the_title_attribute(); ?>" target="_blank"></a>
    <div class="eltd-post-link-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="eltd-link-title">
            <?php if(!empty($post_link_meta)) {
                echo esc_url($post_link);
            } else {
                echo get_the_title();
            } ?>
        </<?php echo esc_attr($title_tag);?>>
    </div>
</div>