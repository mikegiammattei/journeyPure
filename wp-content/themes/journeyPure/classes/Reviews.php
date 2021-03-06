<?php
/**
 * FileName: Reviews.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/4/2019
 */

namespace Reviews;

class Reviews {

	public $reviews;
	private $reviewPostsIds;
	private $reviewCount;
	private $avgRating;

	public function __construct() { }

	public function setAvgRating($reviews) {
		$total = 0;
		foreach ($reviews as $rating):
			$total = $total + $rating->star_rating;
		endforeach;

		$avg = $total / $this->reviewCount;
		$avg = sprintf('%0.1f', $avg);

		$this->avgRating = $avg;
	}

	private function setReviews() {
		$this->reviews  = array();
		foreach ($this->reviewPostsIds as $index => $reviewPostsId){
			// Cache the fields.

			$cache_key = 'class-fields-' . $reviewPostsId;
			$review    = get_transient( $cache_key );

			if ( false === $review ) {
				$review = get_fields( $reviewPostsId );

				if ( ! is_wp_error( $review ) && ! empty( $review ) ) {
					set_transient( $cache_key, $review, HOUR_IN_SECONDS );
				}
			}

			// END Cache the fields.

			$this->reviews[] = (object) array(
				'identifier' => 'reviews_' . $reviewPostsId,
				'photo' => array(
					'image' => '/wp-content/uploads/2019/11/reviewer.jpg',
					'alt'   => 'Reviewer',
				),
				'source_image' => null,
				'heading' => $review['heading'],
				'star_rating' => $review['star_rating'],
				'review_text' => $review['review_text'],
				'sober_since' => empty( $review['sober_since'] ) ? null : $review['sober_since'],
			);

			if ( isset( $review['image'] ) ) {
				$this->reviews[ $index ]->photo = array(
					'image' => $review['image']['sizes']['medium'] ?: '/wp-content/uploads/2019/11/reviewer.jpg',
					'alt'   => $review['image']['alt'] ?: 'Reviewer',
				);
			}

			if(isset($review['source_image'])){
				$this->reviews[$index]->source_image = array(
					'image' => ($review['source_image']['sizes']['thumbnail']) ? : null,
					'alt' => ($review['source_image']['alt']) ? : null
				);
			}
		}

		/** Set Review Count */
		$this->reviewCount = count($this->reviewPostsIds);

		$this->setAvgRating($this->reviews);
	}

	public function getAvgRating() {
		return $this->avgRating;
	}

	public function getTotalReviews() {
		return $this->reviewCount;
	}

	public function setPostByCategoryId($categoryIDs) {
		/** Get reviews if there are any associated with the post review category */
		if($categoryIDs){
			// Get review post by the categories ID
			$args=array(
				'posts_per_page' => 500,
				'post_type' => 'reviews',
				'cat' => $categoryIDs,
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$this->reviewPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

			$this->setReviews();
		}
	}

	public function setPostByPostId($posts) {
		$this->reviewPostsIds = wp_list_pluck( $posts, 'ID' );

		if(!empty($this->reviewPostsIds)){
			$this->setReviews();
		}
	}

	public function setPostTag($tagName) {
		$args=array(
			'posts_per_page' => 100,
			'post_type' => 'reviews',
			'orderby' => 'publish_date',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'post_tag',
					'field'    => 'name',
					'terms'    => $tagName,
				),
			),
		);
		$wp_query = new \WP_Query( $args );

		// Get just Post IDs
		$this->reviewPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

		if(!empty($this->reviewPostsIds)){
			$this->setReviews();
		}
	}

	/**
	 * Set reviews excluding category/categories
	 *
	 * @param array $category_ids Category IDs.
	 * @param int   $page Page.
	 *
	 * @return void
	 */
	public function set_post_by_category( $category_ids, $category_ids_exclude, $page, $orderby, $order ) {
		if ( $page ) {
			if ( 'likes' === $orderby ) {
				// @TODO cusom query.
			} else {
				$cache_key = 'reviews_p' . $page . '_ob' . $orderby . '_o' . $order;

				if ( ! empty( $category_ids ) ) {
					if ( is_array( $category_ids ) ) {
						foreach ( $category_ids as $i => $cat ) {
							$cache_key .= '_ci' . $cat;
						}
					} else {
						$cache_key .= '_ci' . (string) $category_ids;
					}
				}

				if ( ! empty( $category_ids_exclude ) ) {
					if ( is_array( $category_ids_exclude ) ) {
						foreach ( $category_ids_exclude as $i => $cat ) {
							$cache_key .= '_cni' . $cat;
						}
					} else {
						$cache_key .= '_cni' . (string) $category_ids_exclude;
					}
				}

				$reviews = get_transient( $cache_key );

				if ( false === $reviews ) {
					$args = array(
						'posts_per_page' => 10,
						'paged'          => $page,
						'post_type'      => 'reviews',
					);

					if ( ! empty( $category_ids ) ) {
						$args['category__in'] = $category_ids;
					}

					if ( ! empty( $category_ids_exclude ) ) {
						$args['category__not_in'] = $category_ids_exclude;
					}

					if ( 'date' === $orderby ) {
						$args['order']   = $order;
						$args['orderby'] = $orderby;
					} else {
						$args['order']    = $order;
						$args['orderby']  = 'meta_value_num';
						$args['meta_key'] = $orderby; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
					}

					$wp_query = new \WP_Query( $args );
					$reviews  = $wp_query->posts;
					set_transient( $cache_key, $reviews, HOUR_IN_SECONDS );
				}
			}

			// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
			$this->reviewPostsIds = wp_list_pluck( $reviews, 'ID' );
			$this->setReviews();

			// Set total counters to be global and not filtered.
			if ( 1 === $page || '1' === $page ) {
				$this->set_global_counters();
			}
		}
	}

	/**
	 * Set total counters to be global and not filtered
	 *
	 * @return void
	 */
	public function set_global_counters() {
		global $wpdb;

		// ---

		$cache_key    = 'reviews_review_count';
		$review_count = get_transient( $cache_key );

		if ( false === $review_count ) {
			$review_count = wp_count_posts( 'reviews' )->publish;
			set_transient( $cache_key, $review_count, HOUR_IN_SECONDS );
		}

		// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$this->reviewCount = $review_count;

		// ---

		$cache_key   = 'reviews_avg_rating';
		$star_rating = get_transient( $cache_key );

		if ( false === $star_rating ) {
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery
			$star_rating = $wpdb->get_col(
				$wpdb->prepare(
					"
						SELECT SUM(pm.meta_value) FROM {$wpdb->postmeta} pm
						LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
						WHERE pm.meta_key = %s
						AND p.post_status = %s
						AND p.post_type = %s
					",
					'star_rating',
					'publish',
					'reviews'
				)
			);

			set_transient( $cache_key, $star_rating, HOUR_IN_SECONDS );
		}

		// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$avg = $star_rating[0] / $review_count;
		$avg = sprintf( '%0.1f', $avg );

		// phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
		$this->avgRating = $avg;
	}
}
