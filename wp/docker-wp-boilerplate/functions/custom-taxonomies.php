<?php

add_action( 'init', 'create_custom_taxonomy_taxonomies', 0 );

//-------------------------------------------------------------------
// CUSTOM TAXONOMIES
//-------------------------------------------------------------------

function create_custom_taxonomy_taxonomies() {
  $labels = array(
    'name'              => _x( 'Custom Taxonomies', 'taxonomy general name' ),
    'singular_name'     => _x( 'Custom Taxonomy', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Custom Taxonomies' ),
    'all_items'         => __( 'All Custom Taxonomies' ),
    'parent_item'       => __( 'Parent Custom Taxonomy' ),
    'parent_item_colon' => __( 'Parent Custom Taxonomy:' ),
    'edit_item'         => __( 'Edit Custom Taxonomy' ),
    'update_item'       => __( 'Update Custom Taxonomy' ),
    'add_new_item'      => __( 'Add New Custom Taxonomy' ),
    'new_item_name'     => __( 'New Custom Taxonomy Name' ),
    'menu_name'         => __( 'Custom Taxonomy' ),
  );
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'custom-taxonomy' ),
  );
  register_taxonomy( 'custom_taxonomy', array( 'fair' ), $args );
}

?>
