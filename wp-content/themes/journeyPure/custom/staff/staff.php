<?php

function create_Staff() {

	register_post_type( 'Staff',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Staff' ),
				'singular_name' => __( 'Staff' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'staff'),
			'menu_icon' => 'dashicons-admin-users',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'staff-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_Staff' );
