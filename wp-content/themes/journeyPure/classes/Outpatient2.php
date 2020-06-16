<?php
/**
 * Outpatient 2 model class
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Pages;

/**
 * Outpatient 2 model class
 */
class Outpatient2 {

	/**
	 * City
	 *
	 * @var city
	 */
	public $city;

	/**
	 * State
	 *
	 * @var state
	 */
	public $state;

	/**
	 * Masthead Title
	 *
	 * @var masthead_title
	 */
	public $masthead_title;

	/**
	 * Masthead Subtitle
	 *
	 * @var masthead_subtitle
	 */
	public $masthead_subtitle;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->fields = get_fields();

		$this->set_core_fields();
		$this->set_masthead_section();
	}

	/**
	 * Set core fields
	 *
	 * @return void
	 */
	private function set_core_fields() {
		$this->city  = $this->fields['city'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->state = $this->fields['state'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

	/**
	 * Set Masthead section content
	 *
	 * @return void
	 */
	private function set_masthead_section() {
		global $post;

		$this->masthead_title    = $post->post_title ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->masthead_subtitle = $this->fields['subtitle'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

}
