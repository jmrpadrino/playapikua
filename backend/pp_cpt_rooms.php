<?php

if ( ! function_exists('pp_rooms') ) {

// Register Custom Post Type
function pp_rooms() {

	$labels = array(
		'name'                  => _x( 'Rooms', 'Post Type General Name', 'pp' ),
		'singular_name'         => _x( 'Room', 'Post Type Singular Name', 'pp' ),
		'menu_name'             => __( 'Rooms', 'pp' ),
		'name_admin_bar'        => __( 'Room', 'pp' ),
		'archives'              => __( 'Room Archives', 'pp' ),
		'attributes'            => __( 'Room Attributes', 'pp' ),
		'parent_item_colon'     => __( 'Parent Room:', 'pp' ),
		'all_items'             => __( 'All Rooms', 'pp' ),
		'add_new_item'          => __( 'Add New Room', 'pp' ),
		'add_new'               => __( 'New Room', 'pp' ),
		'new_item'              => __( 'New Room', 'pp' ),
		'edit_item'             => __( 'Edit Room', 'pp' ),
		'update_item'           => __( 'Update Room', 'pp' ),
		'view_item'             => __( 'View Room', 'pp' ),
		'view_items'            => __( 'View Room', 'pp' ),
		'search_items'          => __( 'Search Room', 'pp' ),
		'not_found'             => __( 'Not found', 'pp' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pp' ),
		'featured_image'        => __( 'Featured Image', 'pp' ),
		'set_featured_image'    => __( 'Set featured image', 'pp' ),
		'remove_featured_image' => __( 'Remove featured image', 'pp' ),
		'use_featured_image'    => __( 'Use as featured image', 'pp' ),
		'insert_into_item'      => __( 'Insert into room', 'pp' ),
		'uploaded_to_this_item' => __( 'Uploaded to this room', 'pp' ),
		'items_list'            => __( 'Rooms list', 'pp' ),
		'items_list_navigation' => __( 'Rooms list navigation', 'pp' ),
		'filter_items_list'     => __( 'Filter rooms list', 'pp' ),
	);
	$args = array(
		'label'                 => __( 'Room', 'pp' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'book-a-room',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'rest_base'             => 'pp_rooms',
	);
	register_post_type( 'room', $args );

}
add_action( 'init', 'pp_rooms', 0 );

}