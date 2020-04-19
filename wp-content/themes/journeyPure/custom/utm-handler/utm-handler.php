<?php
/**
 * Register a custom menu page.
 */


function mjg_register_uml_handler() {
	add_menu_page(
		__( 'UTM Tracking' ),
		'UTM Tracking',
		'manage_options',
		'utm-tracking.php',
		'page',
		'dashicons-list-view' ,
		6
	);



	function page(){
		require_once(__DIR__  . '/ui.php');
	}
}
add_action( 'admin_menu', 'mjg_register_uml_handler' );
