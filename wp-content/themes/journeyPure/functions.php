<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

// ENQUEUE STYLES

function enqueue_styles() {

	/** REGISTER css/styles.css **/
	wp_register_style( 'screen-style', THEME_DIR . '/style.css', array(), '1', 'all' );
	wp_enqueue_style( 'screen-style' );

}

// BLOCK DEFAULTS
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
	wp_dequeue_style( 'wp-block-library' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// ENQUEUE SCRIPTS

function enqueue_scripts() {

	// Replace default jquery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.4.1.min.js", array(), '3.4.1' );



	/** REGISTER HTML5 Shim **/
	wp_register_script( 'html5-shim', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'html5-shim' );

	/** REGISTER HTML5 OtherScript.js **/
	//wp_register_script( 'custom-script', THEME_DIR . '/js_path/customscript.js', array( 'jquery' ), '1', false );
	//wp_enqueue_script( 'custom-script' );

	wp_register_script( 'vendor-script', get_stylesheet_directory_uri() . '/js/vendor.min.js', array( 'jquery' ), '5', false );
	wp_enqueue_script( 'vendor-script' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// DISABLE GUTENBERG
add_filter('use_block_editor_for_post', '__return_false', 10);


// WP Admin Mods
function change_admin_footer(){
	echo '<span id="footer-note">Custom WordPress Editor for <a href="http://www.journeypure.com/" target="_blank">JourneyPure</a>.</span>';
}
add_filter('admin_footer_text', 'change_admin_footer');

function update_adminbar($wp_adminbar) {
	// remove unnecessary items
	$wp_adminbar->remove_node('wp-logo');
	$wp_adminbar->remove_node('customize');
	$wp_adminbar->remove_node('comments');

}
// admin_bar_menu hook
add_action('admin_bar_menu', 'update_adminbar', 999);


// Custom Sections
require_once(get_stylesheet_directory() . '/custom/init.php');


// Enable post thumbnail
add_theme_support( 'post-thumbnails' );

// Error Handler
require_once(get_stylesheet_directory() . '/classes/ErrorHandler.php');
//$Errors = new ErrorHandler();

