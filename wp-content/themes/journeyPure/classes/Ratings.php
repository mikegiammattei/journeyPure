<?php

/**
 * FileName: Ratings.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 9/30/2019
 */

namespace Ratings;


class Ratings
{

	public $ratings;
	private $post;
	private $fields = array();
	private $ratingPostsIds;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields($post->ID);
	}
	private function setRatings(){

		foreach ($this->ratingPostsIds as $ratingPostsId){
			$rating = get_fields($ratingPostsId);
			@$this->ratings[] = (object) array(
				'image' => $rating['image'],
				'line_1' => $rating['line_1'],
				'controller' => $rating['line_2'],
				'line_2_text' => ($rating['line_2_text']) ? : null,
				'stars' => $rating['line_2_stars'],
				'line_3' => $rating['line_3'],
			);
		}

	}
	public function setPostByCategoryId($categoryIDs){

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
