<?php

// add_action( 'init', 'create_custom_taxonomy_taxonomies', 0 );

//-------------------------------------------------------------------
// CUSTOM TAXONOMIES
//-------------------------------------------------------------------

// MEDIUM
add_action( 'init', 'medium_taxonomy', 30 );
  function medium_taxonomy() {
  $labels = array(
    'name'                  => _x( 'Mediums', 'taxonomy general name' ),
    'singular_name'         => _x( 'Medium', 'taxonomy singular name' ),
    'search_items'          => __( 'Search Mediums' ),
    'all_items'             => __( 'All Mediums' ),
    'parent_item'           => __( 'Parent Mediums' ),
    'parent_item_colon'     => __( 'Parent Medium:' ),
    'edit_item'             => __( 'Edit Medium' ),
    'update_item'           => __( 'Update Medium' ),
    'add_new_item'          => __( 'Add New Medium' ),
    'new_item_name'         => __( 'New Medium Name' ),
    'menu_name'             => __( 'Medium' ),
  );
  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'medium' ),
    'show_in_rest'          => true,
    'rest_base'             => 'medium-taxonomy-api',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  );
  register_taxonomy( 'medium', array( 'portfolio-collection' ), $args );
}

// Location
add_action( 'init', 'location_taxonomy', 30 );
  function location_taxonomy() {
  $labels = array(
    'name'                  => _x( 'Locations', 'taxonomy general name' ),
    'singular_name'         => _x( 'Location', 'taxonomy singular name' ),
    'search_items'          => __( 'Search Locations' ),
    'all_items'             => __( 'All Locations' ),
    'parent_item'           => __( 'Parent Locations' ),
    'parent_item_colon'     => __( 'Parent Location:' ),
    'edit_item'             => __( 'Edit Location' ),
    'update_item'           => __( 'Update Location' ),
    'add_new_item'          => __( 'Add New Location' ),
    'new_item_name'         => __( 'New Location Name' ),
    'menu_name'             => __( 'Locations' ),
  );
  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'location' ),
    'show_in_rest'          => true,
    'rest_base'             => 'location-taxonomy-api',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
  );
  register_taxonomy( 'location', array( 'portfolio-collection' ), $args );
}

//-------------------------------------------------------------------
// CUSTOM TAXONOMY FILTER DROPDOWNS IN ADMIN
//-------------------------------------------------------------------

function tsm_filter_post_type_by_taxonomy($post_type, $taxonomy) {
	global $typenow;
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

function filter_portfolio_medium() {
  tsm_filter_post_type_by_taxonomy('portfolio-collection', 'medium');
}

function filter_portfolio_location() {
  tsm_filter_post_type_by_taxonomy('portfolio-collection', 'location');
}

add_action('restrict_manage_posts', 'filter_portfolio_medium');
add_action('restrict_manage_posts', 'filter_portfolio_location');

// NEXT
function tsm_convert_id_to_term_in_query_medium($query) {
	global $pagenow;
	$post_type = 'portfolio-collection';
	$taxonomy  = 'medium';
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

function tsm_convert_id_to_term_in_query_industry($query) {
	global $pagenow;
	$post_type = 'portfolio-collection';
	$taxonomy  = 'industry';
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_medium');
add_filter('parse_query', 'tsm_convert_id_to_term_in_query_industry');

?>
