<?php
require_once(JWS_THEME_ABS_PATH_ADMIN .'/tgm-plugin-activation/plugin-options.php');
add_action( 'wp_ajax_sample', 'prefix_ajax_sample' );
function prefix_ajax_sample(){
    installSample();
}
