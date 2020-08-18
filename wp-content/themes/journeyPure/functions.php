<?php
define("THEME_DIR", get_template_directory_uri());
define("THEME_PATH", get_template_directory());
// Search site for static api value - define("GOOGLE_API", 'AIzaSyDwoQ63Mff3mW9-u2fQUhnlMBmX752RKds');
define("WP_UPLOAD_PATH", wp_upload_dir()['baseurl']);

add_filter('acf/settings/show_admin', '__return_false');

/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

// Include component class
require_once(THEME_PATH . '/classes/Inc.php');
$_inc = new \Includes\Inc();

// Stylesheet Handler
include_once(get_stylesheet_directory() . '/classes/Stylesheet.php');

// BLOCK DEFAULTS
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}

// ENQUEUE SCRIPTS
function enqueue_scripts() {

    // Replace default jquery
    wp_deregister_script( 'jquery' );
//	wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.4.1.min.js", array(), '3.4.1' );

    /** REGISTER HTML5 Shim **/
//	wp_register_script( 'html5-shim', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js', array( 'jquery' ), '1', true );
//	wp_enqueue_script( 'html5-shim' );

//	wp_register_script( 'vendor-script', get_stylesheet_directory_uri() . '/js/vendor.min.js', array( 'jquery' ), '5', true );
//	wp_enqueue_script( 'vendor-script' );

//
//	wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom.min.js', 10, '10', true );
//	wp_enqueue_script( 'custom-script' );
//
//	wp_localize_script( 'custom-script', 'jp_rest_details', array(
//		'rest_url' => esc_url_raw( rest_url() ),
//		'nonce' => wp_create_nonce( 'wp_rest' ),
//		'current_date' => date("m-d-Y"),
//        'google_API_key'  => GOOGLE_API
//	) );


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

add_action( 'wp_ajax_like_action_hok', 'like_action' );
add_action( 'wp_ajax_nopriv_like_action_hok', 'like_action' );

function like_action() {
    require_once(get_stylesheet_directory() . '/classes/Likes.php');
    $Likes = new \Likes();

    /** The identifier is the path of the bio image
     * Returns total likes
     */
    $objIdentifier = $_POST['data'];
    echo $Likes->updateLikeObject($objIdentifier);

    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_insurance_form_action_hok', 'insurance_form_action' );
add_action( 'wp_ajax_nopriv_insurance_form_action_hok', 'insurance_form_action' );

function insurance_form_action() {
    require_once(get_stylesheet_directory() . '/classes/InsuranceForm.php');
    $InsuranceForm = new \InsuranceForm();

    $InsuranceForm->submitForm($_POST['data']);
    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_email_action_hok', 'review_email_action' );
add_action( 'wp_ajax_nopriv_email_action_hok', 'review_email_action' );

function review_email_action() {

    require_once(get_stylesheet_directory() . '/classes/SendMail.php');
    $SendMail = new \Mail\SendMail();

    $emailBody = $_POST['data'];

    /** The identifier is the path of the bio image
     * Returns total likes
     */
    //$SendMail->send('digitalmarketing@journeypure.com','JourneyPure',$emailBody);
    $SendMail->send('mjgseb@gmail.com','Mike',$emailBody);


    wp_die(); // this is required to terminate immediately and return a proper response
}
remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// Divider element getter function
if ( ! function_exists( 'jp_divider' ) ) :
    function jp_divider() {
        ob_start();
        include __DIR__ . '/assets/src/includes/elements/arrow-divider-view.php';
        $componentView = ob_get_clean();
        return $componentView;
    }
endif;

/**
 * Get reviews (ajax)
 *
 * @return void
 */
function ajax_get_reviews() {
	require_once get_stylesheet_directory() . '/classes/ReviewPage2.php';
	$reviews = new Pages\ReviewPage2( true );
	$reviews->ajax_get_reviews();
}

add_action( 'wp_ajax_get_reviews', 'ajax_get_reviews' );
add_action( 'wp_ajax_nopriv_get_reviews', 'ajax_get_reviews' );

/**
 * If it's a bot
 *
 * @return boolean
 */
function jp_is_bot() {
	// Show everything for BOTs, like for users.
	return false;

	// return (
	// 	isset( $_SERVER['HTTP_USER_AGENT'] )
	// 	&& preg_match( '/pagespeed|yslow|gtmetrix|lighthouse|googlebot|bot|crawl|bingbot|mediapartners/i', $_SERVER['HTTP_USER_AGENT'] )
	// );
}
