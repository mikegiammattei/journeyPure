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

		// Cache the fields.

		$cache_key    = 'class-fields-' . $this->post->ID;
		$this->fields = get_transient( $cache_key );

		if ( false === $this->fields ) {
			$this->fields = get_fields();

			if ( ! is_wp_error( $this->fields ) && ! empty( $this->fields ) ) {
				set_transient( $cache_key, $this->fields, HOUR_IN_SECONDS );
			}
		}

		// END Cache the fields.

		$this->set_table_section();
		$this->set_faq_section();
	}

	/**
	 * Set Table section content
	 *
	 * @return void
	 */
	public function set_table_section() {
		$this->cards_1_title    = $this->fields['outpatient_location_1_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_1_category = $this->fields['outpatient_location_1_category'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_1          = array();

		if ( ! empty( $this->cards_1_category ) ) {
			$args = array(
				'post_type'      => 'outpatient-locations',
				'posts_per_page' => 50,
				'category__in'   => array( $this->cards_1_category ),
			);

			$wp_query = new \WP_Query( $args );
			$ids      = wp_list_pluck( $wp_query->posts, 'ID' );

			foreach ( $ids as $post_id ) {
				$this->cards_1[] = array(
					'title'   => get_field( 'facility_name', $post_id ),
					'ratings' => get_field( 'ratings', $post_id ),
					'address' => get_field( 'address', $post_id ),
					'link'    => get_field( 'link', $post_id ),
				);
			}
		}

		$this->cards_2_title    = $this->fields['outpatient_location_2_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_2_category = $this->fields['outpatient_location_2_category'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_2          = array();

		if ( ! empty( $this->cards_2_category ) ) {
			$args = array(
				'post_type'      => 'outpatient-locations',
				'posts_per_page' => 50,
				'category__in'   => array( $this->cards_2_category ),
			);

			$wp_query = new \WP_Query( $args );
			$ids      = wp_list_pluck( $wp_query->posts, 'ID' );

			foreach ( $ids as $post_id ) {
				$this->cards_2[] = array(
					'title'   => get_field( 'facility_name', $post_id ),
					'ratings' => get_field( 'ratings', $post_id ),
					'address' => get_field( 'address', $post_id ),
					'link'    => get_field( 'link', $post_id ),
				);
			}
		}

		$this->cards_3_title    = $this->fields['outpatient_location_3_title'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_3_category = $this->fields['outpatient_location_3_category'] ?: null; // phpcs:ignore WordPress.PHP.DisallowShortTernary.Found
		$this->cards_3          = array();

		if ( ! empty( $this->cards_3_category ) ) {
			$args = array(
				'post_type'      => 'outpatient-locations',
				'posts_per_page' => 50,
				'category__in'   => array( $this->cards_3_category ),
			);

			$wp_query = new \WP_Query( $args );
			$ids      = wp_list_pluck( $wp_query->posts, 'ID' );

			foreach ( $ids as $post_id ) {
				$this->cards_3[] = array(
					'title'   => get_field( 'facility_name', $post_id ),
					'ratings' => get_field( 'ratings', $post_id ),
					'address' => get_field( 'address', $post_id ),
					'link'    => get_field( 'link', $post_id ),
				);
			}
		}
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

			foreach ( $faqs_category_ids as $faq_post ) {
				// Cache the fields.

				$cache_key = 'class-fields-' . $faq_post->ID;
				$faq       = get_transient( $cache_key );

				if ( false === $faq ) {
					$faq = get_fields( $faq_post->ID );

					if ( ! is_wp_error( $faq ) && ! empty( $faq ) ) {
						set_transient( $cache_key, $faq, HOUR_IN_SECONDS );
					}
				}

				// END Cache the fields.

				$this->faq->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer'   => $faq['answer'],
				);
			}
		}
	}
}
