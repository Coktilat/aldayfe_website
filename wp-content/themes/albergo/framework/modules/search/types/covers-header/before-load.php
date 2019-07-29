<?php

if ( ! function_exists( 'albergo_elated_set_search_covers_header_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function albergo_elated_set_search_covers_header_global_option( $search_type_options ) {
        $search_type_options['covers-header'] = esc_html__( 'Covers Header', 'albergo' );

        return $search_type_options;
    }

    add_filter( 'albergo_elated_search_type_global_option', 'albergo_elated_set_search_covers_header_global_option' );
}