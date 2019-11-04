<?php

class UserReviewsType{

	public static function register_user_reviews() {


		register_post_type( 'user-reviews',
			// CPT Options
			array(
				'labels' => array(
					'name' => __( 'User Reviews' ),
					'singular_name' => __( 'User Reviews' ),
					'edit_item'          => __( 'Edit Users Reviews' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => false,
				'query_var'          => true,
				'rewrite' => array('slug' => 'user-question'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'show_in_rest'       => true,
				'rest_base'          => 'user-reviews-api',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'taxonomies' => array('post_tag','category'),
				'supports'           => array( 'title','editor','custom-fields')
			)
		);
	}
}
