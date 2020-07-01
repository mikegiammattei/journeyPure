<?php
/**
 * Template Virtual Rehab
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Pages;

/**
 * Template Virtual Rehab model class
 */
class VirtualRehab {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		global $post;
		$this->post = $post;

		$this->fields = get_fields();

		$this->set_masthead_section();
		$this->set_highlights_section();
		$this->set_bios();
		$this->set_faq();
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

}
