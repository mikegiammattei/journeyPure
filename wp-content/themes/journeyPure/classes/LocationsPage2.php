<?php
/**
 * Template Locations 2
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Pages;

/**
 * Template Locations 2 model class
 */
class LocationsPage2 {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		global $post;
		$this->post = $post;

		$this->fields = get_fields();

		$this->set_table_section();
		$this->set_faq_section();
	}

	/**
	 * Set Table section content
	 *
	 * @return void
	 */
	public function set_table_section() {
		$this->outpatient_location_1_1      = $this->fields['outpatient_location_1_1'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_1_1_link = $this->fields['outpatient_location_1_1_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->outpatient_location_1_2      = $this->fields['outpatient_location_1_2'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_1_2_link = $this->fields['outpatient_location_1_2_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_1_title = $this->fields['outpatient_location_1_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_1 = array(
			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_1_1->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_1_1->ID ),
				'address' => get_field( 'address', $this->outpatient_location_1_1->ID ),
				'link'    => $this->outpatient_location_1_1_link,
			),

			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_1_2->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_1_2->ID ),
				'address' => get_field( 'address', $this->outpatient_location_1_2->ID ),
				'link'    => $this->outpatient_location_1_2_link,
			),
		);

		$this->outpatient_location_2_1      = $this->fields['outpatient_location_2_1'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_2_1_link = $this->fields['outpatient_location_2_1_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->outpatient_location_2_2      = $this->fields['outpatient_location_1_2'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_2_2_link = $this->fields['outpatient_location_2_2_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_2_title = $this->fields['outpatient_location_2_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_2 = array(
			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_2_1->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_2_1->ID ),
				'address' => get_field( 'address', $this->outpatient_location_2_1->ID ),
				'link'    => $this->outpatient_location_2_1_link,
			),

			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_2_2->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_2_2->ID ),
				'address' => get_field( 'address', $this->outpatient_location_2_2->ID ),
				'link'    => $this->outpatient_location_2_2_link,
			),
		);

		$this->outpatient_location_3_1      = $this->fields['outpatient_location_3_1'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_3_1_link = $this->fields['outpatient_location_3_1_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->outpatient_location_3_2      = $this->fields['outpatient_location_3_2'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->outpatient_location_3_2_link = $this->fields['outpatient_location_3_2_link'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_3_title = $this->fields['outpatient_location_3_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found

		$this->cards_3 = array(
			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_3_1->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_3_1->ID ),
				'address' => get_field( 'address', $this->outpatient_location_3_1->ID ),
				'link'    => $this->outpatient_location_3_1_link,
			),

			array(
				'title'   => get_field( 'facility_name', $this->outpatient_location_3_2->ID ),
				'ratings' => get_field( 'ratings', $this->outpatient_location_3_2->ID ),
				'address' => get_field( 'address', $this->outpatient_location_3_2->ID ),
				'link'    => $this->outpatient_location_3_2_link,
			),
		);
	}

	/**
	 * Set FAQ section content
	 *
	 * @return void
	 */
	private function set_faq_section() {
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
