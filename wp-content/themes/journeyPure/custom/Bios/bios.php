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
			'supports'           => array('title','author', 'thumbnail', 'excerpt')
		)
	);
}

/*function add_bio_post_title( $post_id ) {

	// unhook this function so it doesn't loop infinitely
	remove_action( 'save_post', 'add_bio_post_title' );

	// update the post, which calls save_post again
	$ThePost = array(
		'ID'           => $post_id,
		'post_title'   => get_field('name', $post_id)
	);

	print_r($post_id);

	// re-hook this function
	add_action( 'save_post', 'add_bio_post_title' );
}
add_action( 'save_post', 'add_bio_post_title' );*/

// Hooking up our function to theme setup
add_action( 'init', 'create_bios' );
