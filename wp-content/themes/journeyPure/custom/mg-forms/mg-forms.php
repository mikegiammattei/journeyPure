<?php

function create_mg_forms() {

	register_post_type( 'mg-forms',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Form Submissions' ),
				'singular_name' => __( 'Forms' )
			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'rewrite' => array('slug' => 'rating'),
			'menu_icon' => 'dashicons-email-alt',
			'capability_type'    => 'post',
			/*'capabilities'    => array(
				'create_posts' => 'do_not_allow',
			),*/
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'forms-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'supports'           => array( 'title', 'editor')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_mg_forms' );
