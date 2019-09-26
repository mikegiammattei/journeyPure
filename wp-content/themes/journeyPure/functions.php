<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

// ENQUEUE STYLES

function enqueue_styles() {

	/** REGISTER css/styles.css **/
	wp_register_style( 'screen-style', THEME_DIR . '/style.min.css', array(), '1', 'all' );
	wp_enqueue_style( 'screen-style' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// ENQUEUE SCRIPTS

function enqueue_scripts() {

	/** REGISTER HTML5 Shim **/
	wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'html5-shim' );

	/** REGISTER HTML5 OtherScript.js **/
	wp_register_script( 'custom-script', THEME_DIR . '/js_path/customscript.js', array( 'jquery' ), '1', false );
	wp_enqueue_script( 'custom-script' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

