<?php

/**
 * FileName: Ratings.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 9/30/2019
 */

namespace Ratings;

error_reporting(0);

class Ratings {

	public $ratings;
	private $post;
	private $fields = array();
	private $ratingPostsIds;

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
	}

	private function setRatings() {
		foreach ($this->ratingPostsIds as $index => $ratingPostsId){
			// Cache the fields.

			$cache_key = 'class-fields-' . $ratingPostsId;
			$rating    = get_transient( $cache_key );

			if ( false === $rating ) {
				$rating = get_fields( $ratingPostsId );

				if ( ! is_wp_error( $rating ) && ! empty( $rating ) ) {
					set_transient( $cache_key, $rating, HOUR_IN_SECONDS );
				}
			}

			// END Cache the fields.

			@$this->ratings[$index] = (object) array(
				'image' => $rating['image'],
				'line_1' => $rating['line_1'],
				'controller' => $rating['line_2'],
				'line_2_text' => ($rating['line_2_text']) ? : null,
				'stars' => $rating['line_2_stars'],
				'number_rating' => null,
				'line_3' => $rating['line_3'],
			);

			if(isset($rating['line_2']) && $rating['line_2'] == 'stars' ){

				if(isset($rating['number_rating'])){
					$this->ratings[$index]->number_rating = $rating['number_rating'];
				}else{
					$this->ratings[$index]->number_rating = 4.9;
				}
			}
		}
	}

	public function setPostByCategoryId($categoryIDs) {
		/** Get ratings if there are any associated with the post rating category */
		if($categoryIDs){
			// Get rating post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'ratings',
				'cat' => $categoryIDs,
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$this->ratingPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

			$this->setRatings();
		}
	}

}
