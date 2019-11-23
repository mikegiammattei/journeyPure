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

class Reviews
{

	public $reviews;
	private $post;
	private $fields = array();
	private $reviewPostsIds;
	private $reviewCount;
	private $avgRating;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields($post->ID);

	}
	public function setAvgRating($reviews){
		$total = 0;
		foreach ($reviews as $rating):
			$total = $total + $rating->star_rating;
		endforeach;

		$avg = $total / $this->reviewCount;
		$avg = sprintf('%0.1f', $avg);

		$this->avgRating = $avg;
	}
	private function setReviews(){

		foreach ($this->reviewPostsIds as $index => $reviewPostsId){
			$review = get_fields($reviewPostsId);

			$this->reviews[] = (object) array(
				'photo' => array(
					'image' => $review['image']['sizes']['medium'],
					'alt' => $review['image']['alt']
				),
				'source_image' => null,
				'heading' => $review['heading'],
				'star_rating' => $review['star_rating'],
				'review_text' => $review['review_text']
			);

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
	public function getAvgRating(){
		return $this->avgRating;
	}
	public function getTotalReviews(){
		return $this->reviewCount;
	}
	public function setPostByCategoryId($categoryIDs){

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
	public function setPostByPostId($posts){
	$this->reviewPostsIds = wp_list_pluck( $posts, 'ID' );

	if(!empty($this->reviewPostsIds)){
		$this->setReviews();
	}

}
	public function setPostTag($tagName){

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
}
