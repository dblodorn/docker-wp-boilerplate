<?php

add_action( 'after_switch_theme', 'fs_flush_rewrite_rules' );

function fs_flush_rewrite_rules() {
	flush_rewrite_rules();
}

//-------------------------------------------------------------------
// CUSTOM POST TYPES
//-------------------------------------------------------------------

add_action( 'init', 'portfolio_collection_cpt' );

function portfolio_collection_cpt() {
  $labels = array(
    'name'               => _x( 'Portfolio Collections', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Portfolio Collection', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Portfolio Collections', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Portfolio Collection', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'Portfolio Collection', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New Portfolio Collection', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New Portfolio Collection', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit Portfolio Collection', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View Portfolio Collection', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All Portfolio Collections', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search Portfolio Collections', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Portfolio Collections:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No Portfolio Collections found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No Portfolio Collections found in Trash.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'portfolio-collection' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'taxonomies'         => array('category', 'medium', 'location'),
    'rest_base'          => 'portfolio-collection-api',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( 'portfolio-collection', $args );
}

?>
