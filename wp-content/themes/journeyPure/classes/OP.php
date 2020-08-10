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
	 * Bios
	 *
	 * @var bios
	 */
	public $bios;

	/**
	 * FAQ
	 *
	 * @var faq
	 */
	public $faq;

	/**
	 * Location
	 *
	 * @var location
	 */
	public $location;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		global $post;
		$this->post = $post;

		$this->fields = get_fields();

		$this->set_core_fields();
		$this->set_masthead_section();
		$this->set_highlights_section();
		$this->set_bios();
		$this->set_faq();
		$this->set_location();
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
		$this->masthead_title                   = $this->fields['title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->masthead_subtitle                = $this->fields['subtitle'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->masthead_youtube_video_id        = $this->fields['youtube_video_id'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->masthead_youtube_video_thumbnail = $this->fields['youtube_video_thumbnail'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

	/**
	 * Set Highlights section content
	 *
	 * @return void
	 */
	private function set_highlights_section() {
		$this->highlights_insurers_image_1 = $this->fields['highlights']['highlights_insurers_image_1'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->highlights_insurers_image_2 = $this->fields['highlights']['highlights_insurers_image_2'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->highlights_main_image       = $this->fields['highlights']['highlights_main_image'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
	}

	/**
	 * Set Bios section content
	 *
	 * @return void
	 */
	private function set_bios() {
		if ( ! empty( $this->fields['bios'] ) ) {
			require_once get_stylesheet_directory() . '/classes/Bios.php';

			$bios              = new \Bios\Bios();
			$bios_category_ids = $this->fields['bios']['bios'];
			$bios->setPostByCategoryId( $bios_category_ids );

			$this->bios = $bios->bios;

			$this->bios = (object) array(
				'heading'    => $this->fields['bios']['heading'],
				'subheading' => $this->fields['bios']['subheading'],
				'bios'       => $this->bios,
			);
		}
	}

	/**
	 * Set FAQ section content
	 *
	 * @return void
	 */
	private function set_faq() {
		if ( ! empty( $this->fields['faq'] ) ) {
			$this->faq = (object) array(
				'heading'    => $this->fields['faq']['heading'],
				'subheading' => $this->fields['faq']['subheading'],
			);
		}

		if ( ! empty( $this->fields['faq']['faq'] ) ) {
			/*
			require_once get_stylesheet_directory() . '/classes/FAQs.php';

			$faqs              = new \FAQs\FAQs();
			$faqs_category_ids = $this->fields['faq']['faq'];
			$faqs->setFAQs( $faqs_category_ids );
			*/

			$faqs_category_ids = $this->fields['faq']['faq'];
			$this->faq->faqs   = array();

			foreach ( $faqs_category_ids as $faq_post_id ) {
				$faq = get_fields( $faq_post_id );

				$this->faq->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer'   => $faq['answer'],
				);
			}
		}
	}

	/**
	 * Set Location section content
	 *
	 * @return void
	 */
	private function set_location() {
		if ( ! empty( $this->fields['location'] ) ) {
			$this->location                 = (object) array();
			$this->location->name           = $this->fields['location']['name'] ?: null;
			$this->location->street_address = $this->fields['location']['street_address'] ?: null;
			$this->location->city           = $this->fields['location']['city'] ?: null;
			$this->location->state          = $this->fields['location']['state'] ?: null;
			$this->location->zip            = $this->fields['location']['zip'] ?: null;
			$this->location->description    = $this->fields['location']['description'] ?: null;

			$this->location->full_address = $this->fields['location']['street_address'] ?
				$this->fields['location']['name'] . ' ' .
				$this->fields['location']['street_address'] . ' ' .
				$this->fields['location']['city'] . ' ' .
				$this->fields['location']['state'] . ' ' .
				$this->fields['location']['zip']
				: null;

			$this->location->tag_sections = $this->fields['location']['aside_tags'];
		}

		if ( ! empty( $this->fields['location'] ) ) {
			require_once get_stylesheet_directory() . '/classes/LocationStatus.php';

			$location_status        = new \Status\LocationStatus( $this->post->ID );
			$this->location->status = ( $location_status );
		}
	}

}
