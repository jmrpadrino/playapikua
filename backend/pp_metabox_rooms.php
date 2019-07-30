<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'room_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'room_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function room_register_metabox() {
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$pp_custom_metabox = new_cmb2_box( array(
		'id'            => 'room_metabox',
		'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'room' ), // Post type
		// 'show_on_cb' => 'room_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'room_add_some_classes', // Add classes through a callback.

		/*
		 * The following parameter is any additional arguments passed as $callback_args
		 * to add_meta_box, if/when applicable.
		 *
		 * CMB2 does not use these arguments in the add_meta_box callback, however, these args
		 * are parsed for certain special properties, like determining Gutenberg/block-editor
		 * compatibility.
		 *
		 * Examples:
		 *
		 * - Make sure default editor is used as metabox is not compatible with block editor
		 *      [ '__block_editor_compatible_meta_box' => false/true ]
		 *
		 * - Or declare this box exists for backwards compatibility
		 *      [ '__back_compat_meta_box' => false ]
		 *
		 * More: https://wordpress.org/gutenberg/handbook/extensibility/meta-box/
		 */
		// 'mb_callback_args' => array( '__block_editor_compatible_meta_box' => false ),
	) );




	$pp_custom_metabox->add_field( array(
		'name'         => esc_html__( 'Gallery', 'cmb2' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cmb2' ),
		'id'           => 'room_gallery',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

	$pp_custom_metabox->add_field( array(
		'name'       => esc_html__( 'Properties', 'cmb2' ),
		'desc'       => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'         => 'room_properties',
		'type'       => 'text',
		//'show_on_cb' => 'room_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		 'repeatable'      => true,
		 //'sortable'       => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );

	$pp_custom_metabox->add_field( array(
		'name' => esc_html__( 'Price', 'cmb2' ),
		'desc' => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'   => 'room_price',
		'type' => 'text_money',
		'before_field' => '$', 
		'attributes' => array(
			'step' => 0,
		),
		// 'before_field' => '£', // override '$' symbol if needed
		// 'repeatable' => true,
	) );

	$pp_custom_metabox->add_field( array(
		'name'    => esc_html__( 'Short Information', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'room_short_information',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );

	$pp_custom_metabox->add_field( array(
		'name'    => esc_html__( 'Amenities (Standard)', 'cmb2' ),
		'desc'    => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'      => 'room_amenities_st',
		'type'    => 'multicheck',
		// 'multiple' => true, // Store values in individual rows
		'options' => array(
			'wifi' => esc_html__( 'Wifi', 'cmb2' ),
			'archive' => esc_html__( 'Safe', 'cmb2' ),
			'glass' => esc_html__( 'Minibar', 'cmb2' ),
			'shower' => esc_html__( 'Shower', 'cmb2' ),
			'bath' => esc_html__( 'Bath', 'cmb2' ),
			'cutlery' => esc_html__( 'Kitchen', 'cmb2' ),
			'suitcase' => esc_html__( 'Work Space', 'cmb2' ),
			'towels' => esc_html__( 'Towels', 'cmb2' ),
		),
		// 'inline'  => true, // Toggles display to inline
	) );

	$pp_custom_metabox->add_field( array(
		'name'       => esc_html__( 'Amenities (Extra)', 'cmb2' ),
		'desc'       => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'         => 'room_amenities_ex',
		'type'       => 'text',
		//'show_on_cb' => 'room_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		 'repeatable'      => true,
		 //'sortable'       => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );
	$pp_custom_metabox->add_field( array(
		'name'       => esc_html__( 'Packs', 'cmb2' ),
		'desc'       => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'         => 'room_packs',
		'type'       => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );
	$pp_custom_metabox->add_field( array(
		'name'       => esc_html__( 'Aditional Packs', 'cmb2' ),
		'desc'       => esc_html__( 'field description (optional)', 'cmb2' ),
		'id'         => 'room_aditional_packs',
		'type'       => 'text_small',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
		),
		//'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
		// 'column'          => true, // Display field value in the admin post-listing columns
	) );

}
