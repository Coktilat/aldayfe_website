<?php

if(!function_exists('albergo_elated_map_woocommerce_meta')) {
    function albergo_elated_map_woocommerce_meta() {
        $woocommerce_meta_box = albergo_elated_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'albergo'),
                'name' => 'woo_product_meta'
            )
        );

        albergo_elated_add_meta_box_field(array(
            'name'        => 'eltd_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'albergo'),
            'description' => esc_html__('Choose image layout when it appears in Albergo Product List - Masonry layout shortcode', 'albergo'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'eltd-woo-image-normal-width' => esc_html__('Default', 'albergo'),
                'eltd-woo-image-large-width'  => esc_html__('Large Width', 'albergo')
            )
        ));

        albergo_elated_add_meta_box_field(
            array(
                'name'          => 'eltd_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'albergo'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'albergo'),
                'parent'        => $woocommerce_meta_box,
                'options'       => albergo_elated_get_yes_no_select_array()
            )
        );
    }
	
    add_action('albergo_elated_meta_boxes_map', 'albergo_elated_map_woocommerce_meta', 99);
}