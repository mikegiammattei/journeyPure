<?php

/**
 * FileName: Reviews.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/4/2019
 */

namespace Reviews;

class Reviews
{

	public $reviews;
	private $post;
	private $fields = array();
	private $reviewPostsIds;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields($post->ID);
	}
	private function setReviews(){

		foreach ($this->reviewPostsIds as $reviewPostsId){
			$review = get_fields($reviewPostsId);

			$this->reviews[] = (object) array(
				'photo' => array(
					'image' => $review['image']['sizes']['medium'],
					'alt' => $review['image']['alt']
				),
				'heading' => $review['heading'],
				'star_rating' => $review['star_rating'],
				'review_text' => $review['review_text']
			);
		}
	}
	public function setPostByCategoryId($categoryIDs){

		/** Get reviews if there are any associated with the post review category */
		if($categoryIDs){
			// Get review post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'reviews',
				'cat' => $categoryIDs,
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$this->reviewPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

			$this->setReviews();
		}

	}
}
