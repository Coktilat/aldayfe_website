<?php

// Register Custom Post Type

function jws_theme_add_post_type_Team() {


    //Register post type Team

    $labels = array(

            'name'                => _x( 'Team', 'Post Type General Name', 'laforat' ),

            'singular_name'       => _x( 'Team Item', 'Post Type Singular Name', 'laforat' ),

            'menu_name'           => __( 'Team', 'laforat' ),

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

            'label'               => __( 'Team', 'laforat' ),

            'description'         => __( 'Team Description', 'laforat' ),

            'labels'              => $labels,

            'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', ),

            'hierarchical'        => true,

            'public'              => true,

            'show_ui'             => true,

            'show_in_menu'        => true,

            'show_in_nav_menus'   => true,

            'show_in_admin_bar'   => true,

            'menu_position'       => 5,

            'menu_icon'           => 'dashicons-groups',

            'can_export'          => true,

            'has_archive'         => true,

            'exclude_from_search' => false,

            'publicly_queryable'  => true,

            'capability_type'     => 'page',

    );

    

    if(function_exists('custom_reg_post_type')) {

        custom_reg_post_type( 'Team', $args );

    }

    

}



// Hook into the 'init' action

add_action( 'init', 'jws_theme_add_post_type_Team', 0 );

