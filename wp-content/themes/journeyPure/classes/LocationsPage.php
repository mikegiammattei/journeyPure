<?php

/**
 * FileName: Location.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 9/29/2019
 */

namespace Pages;


class LocationsPage
{

	public $ratings;
	public $reviewAvg;
	public $reviewTotal;
	public $reviews;
	public $reviewTags = array();
	public $videoObjects;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->setRatings();
	}
	public function reviewTags($tags){
		$this->reviewTags = $tags;
	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();

		$catId = get_category_by_slug( 'locations' );

		$Ratings->setPostByCategoryId($catId->term_id);

		$this->ratings = $Ratings->ratings;
	}
}
