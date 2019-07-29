<?php

// Register Custom Post Type

function jws_theme_add_post_type_portfolio() {

    // Register taxonomy

    $labels = array(

            'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'laforat' ),

            'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'laforat' ),

            'search_items'      => __( 'Search Portfolio Category', 'laforat' ),

            'all_items'         => __( 'All Portfolio Category', 'laforat' ),

            'parent_item'       => __( 'Parent Portfolio Category', 'laforat' ),

            'parent_item_colon' => __( 'Parent Portfolio Category:', 'laforat' ),

            'edit_item'         => __( 'Edit Portfolio Category', 'laforat' ),

            'update_item'       => __( 'Update Portfolio Category', 'laforat' ),

            'add_new_item'      => __( 'Add New Portfolio Category', 'laforat' ),

            'new_item_name'     => __( 'New Portfolio Category Name', 'laforat' ),

            'menu_name'         => __( 'Portfolio Category', 'laforat' ),

    );



    $args = array(

            'hierarchical'      => true,

            'labels'            => $labels,

            'show_ui'           => true,

            'show_admin_column' => true,

            'query_var'         => true,

            'rewrite'           => array( 'slug' => 'portfolio_category' ),

    );

    if(function_exists('custom_reg_taxonomy')) {

        custom_reg_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

    }
  

    //Register post type Portfolio

    $labels = array(

            'name'                => _x( 'Portfolio', 'Post Type General Name', 'laforat' ),

            'singular_name'       => _x( 'Portfolio Item', 'Post Type Singular Name', 'laforat' ),

            'menu_name'           => __( 'Portfolio', 'laforat' ),

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

            'label'               => __( 'Portfolio', 'laforat' ),

            'description'         => __( 'Portfolio Description', 'laforat' ),

            'labels'              => $labels,

            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),

            'taxonomies'          => array( 'portfolio_category', 'portfolio_tag' ),

            'hierarchical'        => true,

            'public'              => true,

            'show_ui'             => true,

            'show_in_menu'        => true,

            'show_in_nav_menus'   => true,

            'show_in_admin_bar'   => true,

            'menu_position'       => 5,

            'menu_icon'           => 'dashicons-pressthis',

            'can_export'          => true,

            'has_archive'         => true,

            'exclude_from_search' => false,

            'publicly_queryable'  => true,

            'capability_type'     => 'page',

    );

    

    if(function_exists('custom_reg_post_type')) {

        custom_reg_post_type( 'portfolio', $args );

    }

    

}



// Hook into the 'init' action

add_action( 'init', 'jws_theme_add_post_type_portfolio', 0 );

