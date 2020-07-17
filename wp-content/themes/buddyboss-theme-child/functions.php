<?php
/**
 * @package BuddyBoss Child
 * The parent theme functions are located at /buddyboss-theme/inc/theme/functions.php
 * Add your own functions at the bottom of this file.
 */


/****************************** THEME SETUP ******************************/

/**
 * Sets up theme for translation
 *
 * @since BuddyBoss Child 1.0.0
 */
function buddyboss_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'buddyboss_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function buddyboss_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'buddyboss-child-css', get_stylesheet_directory_uri().'/assets/css/custom.css', '', '1.0.5' );
  wp_enqueue_style( 'jp-custom-css', get_stylesheet_directory_uri().'/assets/css/jp-style.css', '', '1.0.5' );

  // Javascript
  wp_enqueue_script( 'buddyboss-child-js', get_stylesheet_directory_uri().'/assets/js/custom.js', [ 'jquery' ], '1.0.5' );
  wp_enqueue_script( 'jp-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', [ 'jquery' ], '1.0.5' );
  wp_enqueue_script( 'jp-bootstrap', get_stylesheet_directory_uri().'/assets/js/jp/dist/bootstrap.min.js', [ 'jquery' ], '1.0.5' );
  wp_enqueue_script( 'jp-custom-js', get_stylesheet_directory_uri().'/assets/js/jp/dist/main.babel.min.js', [ 'jp-bootstrap' ], '1.0.5' );
}
add_action( 'wp_enqueue_scripts', 'buddyboss_theme_child_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/

// Add your own custom functions here

define("JOURNEY_PURE_DIR", WP_CONTENT_DIR . "/themes/journeyPure/");
define("JOURNEY_PURE_URL", WP_CONTENT_URL . "/themes/journeyPure/");
define("THEME_PATH", WP_CONTENT_DIR);
define("AOD_ASSETS", get_stylesheet_directory() . '/assets/');
define("AOD_COMP", get_stylesheet_directory() . '/assets/src/components/');
define("AOD_CLASSES", get_stylesheet_directory() . '/classes/');
define("AOD_INC", get_stylesheet_directory() . '/includes/');
//require_once(JOURNEY_PURE_DIR . 'custom/options/options.php');

// Call for question form.
require_once(get_stylesheet_directory() . '/ajax-calls/ask-question-form.php');

// Call to liked post pagination
require_once(get_stylesheet_directory() . '/ajax-calls/liked-post-pagination.php');

// Override functions set in the parent BB theme
require_once(AOD_CLASSES . 'OverrideFunctions.php');
$OF = new OverrideFunctions();

add_filter('acf/settings/show_admin', '__return_false');

require_once(AOD_INC . 'aod-filters.php');
require_once(AOD_INC . 'structured-data.php');
require_once(AOD_INC . 'buddyboss-filters.php');

add_filter('bp_core_validate_user_signup','aod_disable_user_name_bp_core');
function aod_disable_user_name_bp_core($array){
  $newUsername = preg_replace('/[^\w]/', '', $array['user_email']);
  $array['user_name'] = $newUsername;
  return $array;
}
add_filter('wpmu_validate_user_signup','aod_disable_user_name_wpmu');
function aod_disable_user_name_wpmu($array){
  $newUsername = time();
  $array['user_name'] = $newUsername;
  $array['orig_username'] = $newUsername;
  $errors = $array['errors'];
  unset($errors->errors['user_name']);
  $_POST['field_3'] = $array['user_name'];

  return $array;
}
?>
