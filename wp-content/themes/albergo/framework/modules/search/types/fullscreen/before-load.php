<?php

if ( ! function_exists( 'albergo_elated_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function albergo_elated_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'albergo' );

        return $search_type_options;
    }

    add_filter( 'albergo_elated_search_type_global_option', 'albergo_elated_set_search_fullscreen_global_option' );
}