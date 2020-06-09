<?php

function create_ratings() {

	register_post_type( 'ratings',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Ratings' ),
				'singular_name' => __( 'Rating' )
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'rating'),
			'menu_icon' => 'dashicons-star-filled',
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'ratings-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'taxonomies' => array('post_tag','category'),
			'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_ratings' );

require_once(plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR  . 'stats.php');
