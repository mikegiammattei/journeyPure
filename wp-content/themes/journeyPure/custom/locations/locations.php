<?php

function create_locations() {

	register_post_type( 'locations',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Locations' ),
				'singular_name' => __( 'Location' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'locations'),
			'menu_icon' => 'dashicons-location-alt',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'locations-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_locations' );
