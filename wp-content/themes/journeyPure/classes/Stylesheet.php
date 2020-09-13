<?php
/**
 * Stylesheet class
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

class Stylesheet {

	/**
	 * Main Path
	 *
	 * @var main_path
	 */
	private static $main_path;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {}

	/**
	 * Get Main Path
	 *
	 * @return string
	 */
	public static function get_main_path() {
		return self::$main_path;
	}

	/**
	 * Set Main Path
	 *
	 * @return string
	 */
	public static function set_main_path( $filename ) {
		$path = THEME_DIR . '/style.css';

		if ( 'style' !== $filename ) {
			$path = THEME_DIR . '/css/' . $filename . '.min.css';
		}

		$return_value = '<link rel="stylesheet" rel="preload" type="text/css" href="' . $path . '?v=20200913">';
		echo $return_value;
	}

	/**
	 * Set Main Path (inline CSS)
	 *
	 * @return string
	 */
	public static function set_main_path_inline( $filename ) {
		$css_path = THEME_PATH . '/style.css';

		if ( 'style' !== $filename ) {
			$css_path = THEME_PATH . '/css/' . $filename . '.min.css';
		}

		$cache_key = 'styles-' . $filename;
		$css_body  = get_transient( $cache_key );

		if ( false === $css_body ) {
			// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
			$css_body = file_get_contents( $css_path );

			if ( ! is_wp_error( $css_body ) && ! empty( $css_body ) ) {
				set_transient( $cache_key, $css_body, DAY_IN_SECONDS );
			}
		}

		if ( false !== $css_body ) {
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<style id="' . $cache_key . '">' . $css_body . '</style>';
		}
	}

}
