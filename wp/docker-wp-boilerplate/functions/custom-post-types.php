<?php

add_action( 'after_switch_theme', 'fs_flush_rewrite_rules' );

function fs_flush_rewrite_rules() {
	flush_rewrite_rules();
}

//-------------------------------------------------------------------
// CUSTOM POST TYPES
//-------------------------------------------------------------------

add_action( 'init', 'custom_cpt' );

function custom_cpt() {
  $labels = array(
    'name'               => _x( 'cpts', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'cpt', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'cpts', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'cpt', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'cpt', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New cpt', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New cpt', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit cpt', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View cpt', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All cpts', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search cpts', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent cpts:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No cpts found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No cpts found in Trash.', 'your-plugin-textdomain' )
  );

  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'cpts' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'taxonomies'         => array( 'cpt' ),
    'rest_base'          => 'cpts-api',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
  );

  register_post_type( 'cpt', $args );
}

?>
