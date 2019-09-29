<?php

function create_reviews() {

	register_post_type( 'reviews',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'reviews' ),
				'singular_name' => __( 'review' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'reviews'),
			'menu_icon' => 'dashicons-groups',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'reviews-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_reviews' );
