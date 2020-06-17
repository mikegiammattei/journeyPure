<?php
/**
 * OP CPT model class
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Pages;

/**
 * OP CPT model class
 */
class OP {

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
		$this->set_highlights_section();
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
		$this->masthead_title    = $this->fields['title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->masthead_subtitle = $this->fields['subtitle'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

	/**
	 * Set Highlights section content
	 *
	 * @return void
	 */
	private function set_highlights_section() {
		$this->highlights_insurers_image = $this->fields['highlights_insurers_image'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->highlights_main_image     = $this->fields['highlights_main_image'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

}
