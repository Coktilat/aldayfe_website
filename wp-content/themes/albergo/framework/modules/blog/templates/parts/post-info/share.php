<?php
$share_type = isset($share_type) ? $share_type : 'dropdown';
?>
<?php if(albergo_elated_options()->getOptionValue('enable_social_share') === 'yes' && albergo_elated_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="eltd-blog-share">
        <?php echo albergo_elated_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>