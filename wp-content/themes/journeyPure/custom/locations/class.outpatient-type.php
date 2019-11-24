<?php

class OutPatientType{

	public static function register_out_patient_type() {


		register_post_type( 'outpatient-locations',
			// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Outpatient Locations' ),
					'singular_name' => __( 'Outpatient Location' ),
					'edit_item'          => __( 'Edit Outpatient Location' ),
				),
				'public'             => true,
				'publicly_queryable' => false,
				'show_ui'            => true,
				'show_in_menu'       => false,
				'query_var'          => false,
				'rewrite' => array('slug' => 'outpatient-locations'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'show_in_rest'       => true,
				'rest_base'          => 'outpatient-locations-api',
				'rest_controller_class' => 'WP_REST_Posts_Controller',
				'taxonomies' => array('post_tag','category'),
				'supports'           => array( 'title','custom-fields')
			)
		);
	}
}
