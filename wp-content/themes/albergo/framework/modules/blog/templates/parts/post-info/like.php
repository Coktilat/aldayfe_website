<?php if(albergo_elated_core_plugin_installed()) { ?>
    <div class="eltd-blog-like">
        <?php if( function_exists('albergo_elated_get_like') ) albergo_elated_get_like(); ?>
    </div>
<?php } ?>