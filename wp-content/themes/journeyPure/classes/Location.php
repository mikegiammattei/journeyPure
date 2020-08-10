<?php
/**
 * Locations CPT model class
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Locations;

/**
 * Locations CPT model class
 */
class Location {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		global $post;
		$this->post = $post;

		$this->fields = get_fields();

		$this->set_above_fold();
		$this->set_gallery();
		$this->set_bios();
		$this->set_reviews();
		$this->set_highlights_v2();
		$this->set_block_4();
		$this->set_boxes();

		define( 'STYLESHEET_NAME', 'single-locations' );
	}

	/**
	 * Set above fold
	 *
	 * @return void
	 */
	private function set_above_fold() {
		$this->set_ratings();

		$this->above_fold = (object) array(
			'image'                   => $this->fields['above_fold']['feature_image']['sizes']['large'],
			'heading'                 => $this->fields['above_fold']['heading'],
			'subheading'              => $this->fields['above_fold']['sub_heading'],
			'h1'                      => ( $this->fields['above_fold']['location_text_overlay']['h1_heading'] ) ?: null,
			'h2'                      => ( $this->fields['above_fold']['location_text_overlay']['h2_heading'] ) ?: null,
			'youtube_video_id'        => $this->fields['above_fold']['layout_v2']['youtube_video_id'],
			'youtube_video_thumbnail' => $this->fields['above_fold']['layout_v2']['youtube_video_thumbnail']['sizes']['large'],
		);
	}

	/**
	 * Set ratings
	 *
	 * @return void
	 */
	private function set_ratings() {
		require_once get_stylesheet_directory() . '/classes/Ratings.php';
		$ratings = new \Ratings\Ratings();

		$ratings_category_ids = $this->fields['above_fold']['ratings'];
		$ratings->setPostByCategoryId( $ratings_category_ids );
		$this->ratings = $ratings->ratings;
	}

	/**
	 * Set gallery
	 *
	 * @return void
	 */
	private function set_gallery() {
		if ( isset( $this->fields['photo_gallery'] ) && is_array( $this->fields['photo_gallery'] ) ) {
			foreach ( $this->fields['photo_gallery'] as $gallery ) {
				$this->gallery[] = (object) array(
					'medium' => $gallery['sizes']['medium_large'],
					'alt'    => get_post_meta( $gallery['ID'], '_wp_attachment_image_alt', true ),
					'large'  => $gallery['url'],
				);
			}
		}
	}

	/**
	 * Set bios
	 *
	 * @return void
	 */
	private function set_bios() {
		if ( isset( $this->fields['bios'] ) ) {
			require_once get_stylesheet_directory() . '/classes/Bios.php';
			$bios = new \Bios\Bios();

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
	 * Set reviews
	 *
	 * @return void
	 */
	private function set_reviews() {
		if ( isset( $this->fields['reviews'] ) ) {
			require_once get_stylesheet_directory() . '/classes/Reviews.php';
			$reviews = new \Reviews\Reviews();

			$reviews_category_ids = $this->fields['reviews'];

			$reviews->setPostByPostId( $reviews_category_ids );

			$this->reviews      = $reviews->reviews;
			$this->review_avg   = $reviews->getAvgRating();
			$this->review_total = $reviews->getTotalReviews();
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
			'tag_sections'         => $this->fields['block_2']['aside_tags'],
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

	/**
	 * Set block 4
	 *
	 * @return void
	 */
	private function set_block_4() {
		if ( isset( $this->fields['block_4'] ) ) {
			$this->block4 = (object) array(
				'heading'    => $this->fields['block_4']['heading'],
				'subheading' => $this->fields['block_4']['subheading'],
			);
		}

		if ( isset( $this->fields['block_4']['faq'] ) ) {
			require_once get_stylesheet_directory() . '/classes/FAQs.php';
			$faqs = new \FAQs\FAQs();

			$faqs_category_ids = $this->fields['block_4']['faq'];
			$faqs->setFAQs( $faqs_category_ids );

			$this->block4->faqs = $faqs->faqs;
		}

		if ( isset( $this->fields['block_4']['location'] ) ) {
			$this->block4->location = (object) array();

			$this->block4->location->name           = ( $this->fields['block_4']['location']['name'] ) ?: null;
			$this->block4->location->street_address = ( $this->fields['block_4']['location']['street_address'] ) ?: null;
			$this->block4->location->city           = ( $this->fields['block_4']['location']['city'] ) ?: null;
			$this->block4->location->state          = ( $this->fields['block_4']['location']['state'] ) ?: null;
			$this->block4->location->zip            = ( $this->fields['block_4']['location']['zip'] ) ?: null;

			$this->block4->location->title       = ( $this->fields['block_4']['location']['title'] ) ?: null;
			$this->block4->location->subtitle    = ( $this->fields['block_4']['location']['subtitle'] ) ?: null;
			$this->block4->location->description = ( $this->fields['block_4']['location']['description'] ) ?: null;

			$this->block4->location->full_address = ( $this->fields['block_4']['location']['street_address'] ) ?
				$this->fields['block_4']['location']['name'] . ' ' .
				$this->fields['block_4']['location']['street_address'] . ' ' .
				$this->fields['block_4']['location']['city'] . ' ' .
				$this->fields['block_4']['location']['state'] . ' ' .
				$this->fields['block_4']['location']['zip']
				: null;
		}

		if ( isset( $this->fields['block_4']['location'] ) ) {
			require_once get_stylesheet_directory() . '/classes/LocationStatus.php';
			$location_status                = new \Status\LocationStatus( $this->post->ID );
			$this->block4->location->status = $location_status;
		}
	}

	/**
	 * Set boxes
	 *
	 * @return void
	 */
	private function set_boxes() {
		$this->boxes = (object) array(
			'heading'    => $this->fields['boxes']['heading'],
			'subheading' => $this->fields['boxes']['subheading'],
			'image'      => $this->fields['boxes']['image']['url'],
			'boxes'      => $this->fields['boxes']['box'],
		);
	}

}
