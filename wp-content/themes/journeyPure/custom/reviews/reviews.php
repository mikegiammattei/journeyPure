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
			'rewrite' => array('slug' => 'review'),
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

add_action( 'init', 'create_reviews' );

require(__DIR__ . '/class.user-review.php');
require(__DIR__ . '/class.user-review-type.php');

// Add user review to the sidebar
add_action('admin_menu', array('UserReviews','add_user_reviews'));

// Register the review post type
add_action('init', array('UserReviewsType','register_user_reviews'));

require_once(plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR  . 'stats.php');
