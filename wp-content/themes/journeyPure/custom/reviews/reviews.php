<?php

function create_reviews() {

	register_post_type( 'reviews',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Reviews' ),
				'singular_name' => __( 'Review' )
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
			'taxonomies' => array('post_tag','category'),
			'supports'           => array( 'title','author', 'thumbnail', 'excerpt')
		)
	);
}

/*function add_review_post_title( $post_id ) {

	global $post;
	if ($post->post_type != 'reviews'){
		return;
	}

	// unhook this function so it doesn't loop infinitely
	remove_action( 'save_post', 'add_review_post_title' );

	// update the post, which calls save_post again
	$ThePost = array(
		'ID'           => $post_id,
		'post_title'   => get_field('heading', $post_id)
	);
	wp_update_post( $ThePost );

	// re-hook this function
	add_action( 'save_post', 'add_review_post_title' );
}
add_action( 'save_post', 'add_review_post_title' );*/

// Hooking up our function to theme setup
add_action( 'init', 'create_reviews' );
