<?php

function create_locations() {

	register_post_type( 'locations',
		// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Locations' ),
				'singular_name' => __( 'Location' )
			),
			'public'             => true,
			'hierarchical'       => false,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite' => array('slug' => 'locations'),
			'menu_icon' => 'dashicons-location-alt',
			'capability_type'    => 'post',
			'has_archive'        => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'rest_base'          => 'locations-api',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'taxonomies' => array('post_tag','category'),
			'supports'           => array( 'title', 'author', 'excerpt')
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_locations' );

require(__DIR__ . '/class.outpatient-type.php');
require(__DIR__ . '/class.outpatient-locations.php');

// Add user review to the sidebar
add_action('admin_menu', array('OutpatientLocation','add_outpatient_location'));

// Register the user-faqs post type
add_action('init', array('OutPatientType','register_out_patient_type'));

