<?php
/**
 * Create Custom Post Type OP
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */
function create_op_ctp() {
	register_post_type(
		'op',
		array(
			'labels' => array(
				'name'          => __( 'OP' ),
				'singular_name' => __( 'OP' ),
				'add_new_item'  => __( 'Add New OP' ),
				'edit_item'     => __( 'Edit OP' ),
			),
			'public'          => true,
			'query_var'       => true,
			'rewrite'         => array( 'slug' => 'outpatient' ),
			'menu_icon'       => 'dashicons-admin-page',
			'capability_type' => 'post',
			'has_archive'     => false,
			'supports'        => array( 'title' ),
		)
	);
}

add_action( 'init', 'create_op_ctp' );
