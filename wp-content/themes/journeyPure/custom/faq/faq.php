<?php

require(__DIR__ . '/class.user-question.php');
require(__DIR__ . '/class.user-question-type.php');

function create_FAQ() {


	register_post_type( 'faq',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'FAQ' ),
				'singular_name' => __( 'FAQ' ),
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
			'supports'           => array( 'title','author', 'thumbnail', 'excerpt')
		)
	);
}

// Hooking up our function to theme setup
add_action( 'init', 'create_FAQ' );


// Add user faq to the sidebar
add_action('admin_menu', array('UserQuestions','add_user_questions'));

// Register the user-faqs post type
add_action('init', array('UserFaqQuestions','register_user_questions'));

