<?php

class UserFaqQuestions{

	public static function register_user_questions() {


		register_post_type( 'user-questions',
			// CPT Options
			array(
				'labels' => array(
					'name' => __( 'User Questions' ),
					'singular_name' => __( 'User Question' ),
					'edit_item'          => __( 'Edit Users Question' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite' => array('slug' => 'user-question'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'show_in_rest'       => true,
				'rest_base'          => 'user-question-api',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'taxonomies' => array('post_tag','category'),
				'supports'           => array( 'title','editor','custom-fields')
			)
		);
	}
}
