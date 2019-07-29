<?php
// Register Custom Post Type
function jws_theme_add_post_type_testimonial() {
    // Register taxonomy
    $labels = array(
            'name'              => _x( 'Testimonial Category', 'taxonomy general name', 'laforat' ),
            'singular_name'     => _x( 'Testimonial Category', 'taxonomy singular name', 'laforat' ),
            'search_items'      => __( 'Search Testimonial Category', 'laforat' ),
            'all_items'         => __( 'All Testimonial Category', 'laforat' ),
            'parent_item'       => __( 'Parent Testimonial Category', 'laforat' ),
            'parent_item_colon' => __( 'Parent Testimonial Category:', 'laforat' ),
            'edit_item'         => __( 'Edit Testimonial Category', 'laforat' ),
            'update_item'       => __( 'Update Testimonial Category', 'laforat' ),
            'add_new_item'      => __( 'Add New Testimonial Category', 'laforat' ),
            'new_item_name'     => __( 'New Testimonial Category Name', 'laforat' ),
            'menu_name'         => __( 'Testimonial Category', 'laforat' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'testimonial_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'testimonial_category', array( 'testimonial' ), $args );
    }
    //Register tags
    $labels = array(
            'name'              => _x( 'Testimonial Tag', 'taxonomy general name', 'laforat' ),
            'singular_name'     => _x( 'Testimonial Tag', 'taxonomy singular name', 'laforat' ),
            'search_items'      => __( 'Search Testimonial Tag', 'laforat' ),
            'all_items'         => __( 'All Testimonial Tag', 'laforat' ),
            'parent_item'       => __( 'Parent Testimonial Tag', 'laforat' ),
            'parent_item_colon' => __( 'Parent Testimonial Tag:', 'laforat' ),
            'edit_item'         => __( 'Edit Testimonial Tag', 'laforat' ),
            'update_item'       => __( 'Update Testimonial Tag', 'laforat' ),
            'add_new_item'      => __( 'Add New Testimonial Tag', 'laforat' ),
            'new_item_name'     => __( 'New Testimonial Tag Name', 'laforat' ),
            'menu_name'         => __( 'Testimonial Tag', 'laforat' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'testimonial_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'testimonial_tag', array( 'testimonial' ), $args );
    }
    
    //Register post type Testimonial
    $labels = array(
            'name'                => _x( 'Testimonial', 'Post Type General Name', 'laforat' ),
            'singular_name'       => _x( 'Testimonial Item', 'Post Type Singular Name', 'laforat' ),
            'menu_name'           => __( 'Testimonial', 'laforat' ),
            'parent_item_colon'   => __( 'Parent Item:', 'laforat' ),
            'all_items'           => __( 'All Items', 'laforat' ),
            'view_item'           => __( 'View Item', 'laforat' ),
            'add_new_item'        => __( 'Add New Item', 'laforat' ),
            'add_new'             => __( 'Add New', 'laforat' ),
            'edit_item'           => __( 'Edit Item', 'laforat' ),
            'update_item'         => __( 'Update Item', 'laforat' ),
            'search_items'        => __( 'Search Item', 'laforat' ),
            'not_found'           => __( 'Not found', 'laforat' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'laforat' ),
    );
    $args = array(
            'label'               => __( 'Testimonial', 'laforat' ),
            'description'         => __( 'Testimonial Description', 'laforat' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'testimonial_category', 'testimonial_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-yes',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'testimonial', $args );
    }
    
}

// Hook into the 'init' action
add_action( 'init', 'jws_theme_add_post_type_testimonial', 0 );
