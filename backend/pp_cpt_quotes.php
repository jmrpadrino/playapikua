<?php

if ( ! function_exists('pp_quotes') ) {

// Register Custom Post Type
function pp_quotes() {

	$labels = array(
		'name'                  => _x( 'Quotes', 'Post Type General Name', 'pp' ),
		'singular_name'         => _x( 'Quote', 'Post Type Singular Name', 'pp' ),
		'menu_name'             => __( 'Quotes', 'pp' ),
		'name_admin_bar'        => __( 'Quote', 'pp' ),
		'archives'              => __( 'Quote Archives', 'pp' ),
		'attributes'            => __( 'Quote Attributes', 'pp' ),
		'parent_item_colon'     => __( 'Parent Quote:', 'pp' ),
		'all_items'             => __( 'All Quotes', 'pp' ),
		'add_new_item'          => __( 'Add New Quote', 'pp' ),
		'add_new'               => __( 'New Quote', 'pp' ),
		'new_item'              => __( 'New Quote', 'pp' ),
		'edit_item'             => __( 'Edit Quote', 'pp' ),
		'update_item'           => __( 'Update Quote', 'pp' ),
		'view_item'             => __( 'View Quote', 'pp' ),
		'view_items'            => __( 'View Quote', 'pp' ),
		'search_items'          => __( 'Search Quote', 'pp' ),
		'not_found'             => __( 'Not found', 'pp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pp' ),
		'featured_image'        => __( 'Featured Image', 'pp' ),
		'set_featured_image'    => __( 'Set featured image', 'pp' ),
		'remove_featured_image' => __( 'Remove featured image', 'pp' ),
		'use_featured_image'    => __( 'Use as featured image', 'pp' ),
		'insert_into_item'      => __( 'Insert into quote', 'pp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this quote', 'pp' ),
		'items_list'            => __( 'Quotes list', 'pp' ),
		'items_list_navigation' => __( 'Quotes list navigation', 'pp' ),
		'filter_items_list'     => __( 'Filter quotes list', 'pp' ),
	);
	$args = array(
		'label'                 => __( 'Quote', 'pp' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_base'             => 'pp_quotes',
	);
	register_post_type( 'quote', $args );

}
add_action( 'init', 'pp_quotes', 0 );

}