<?php

function create_bios() {

	register_post_type( 'bios',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Bios' ),
				'singular_name' => __( 'Bio' ),
				'add_new_item'       => __( 'Add New Bio'),
				'edit_item'          => __( 'Edit Bio' ),
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'bio'),
			'menu_icon' => 'dashicons-admin-users',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'bio-api',
			'taxonomies' => array('post_tag','category'),
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_bios' );
