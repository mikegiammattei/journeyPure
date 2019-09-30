<?php

function create_FAQ() {

	register_post_type( 'faq',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'FAQ' ),
				'singular_name' => __( 'FAQ' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'faq'),
			'menu_icon' => 'dashicons-text-page',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'faq-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_FAQ' );
