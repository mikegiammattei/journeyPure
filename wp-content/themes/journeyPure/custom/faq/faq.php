<?php

function create_FAQ() {

	register_post_type( 'faq',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'FAQ' ),
				'singular_name' => __( 'FAQ' ),
				'add_new_item'       => __( 'Add New FAQ'),
				'edit_item'          => __( 'Edit FAQ' ),
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
			'taxonomies' => array('post_tag','category'),
			'supports'           => array( 'title' => "test1",'author', 'thumbnail', 'excerpt')
		)
	);
}

function add_faq_post_title( $post_id ) {

	// unhook this function so it doesn't loop infinitely
	remove_action( 'save_post', 'add_faq_post_title' );

	// update the post, which calls save_post again
	$ThePost = array(
		'ID'           => $post_id,
		'post_title'   => get_field('question', $post_id)
	);
	wp_update_post( $ThePost );

	// re-hook this function
	add_action( 'save_post', 'add_faq_post_title' );
}
add_action( 'save_post', 'add_faq_post_title' );

// Hooking up our function to theme setup
add_action( 'init', 'create_FAQ' );




