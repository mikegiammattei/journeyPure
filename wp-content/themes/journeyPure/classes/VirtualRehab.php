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
		$this->set_bios();
		$this->set_faq();
		$this->set_highlights_v2();
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
	 * Set highlights v2 (legacy block 2)
	 *
	 * @return void
	 */
	private function set_highlights_v2() {
		$this->highlights_v2 = (object) array(
			'heading'              => $this->fields['block_2']['heading'],
			'list'                 => $this->fields['block_2']['list'],
			// 'tag_sections'         => $this->fields['block_2']['aside_tags'],
			'show_insurance_logos' => $this->fields['block_2']['show_insurance_logos'],
		);

		if ( ! empty( $this->highlights_v2->list ) ) {
			foreach ( $this->highlights_v2->list as $i => $item ) {
				if ( ! empty( $item['review'] ) ) {
					require_once get_stylesheet_directory() . '/classes/Reviews.php';
					$reviews = new \Reviews\Reviews();

					$reviews->setPostByPostId( array( $item['review'] ) );

					$this->highlights_v2->list[ $i ]['review']       = $reviews->reviews[0];
					$this->highlights_v2->list[ $i ]['review_avg']   = $reviews->getAvgRating();
					$this->highlights_v2->list[ $i ]['review_total'] = $reviews->getTotalReviews();
				}
			}
		}
	}

}
