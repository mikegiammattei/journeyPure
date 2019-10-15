<?php

/**
 * FileName: Homepage.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/11/2019
 */

namespace Homepage;


class Homepage
{

	public $ratings;
	public $reviews;

	public function __construct(){
		$this->setRatings();
		$this->setReviews();
	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();

		$Ratings->setPostByCategoryId(5);

		$this->ratings = $Ratings->ratings;
	}
	private function setReviews(){

		require_once(get_stylesheet_directory() . '/classes/Reviews.php');
		$Reviews = new \Reviews\Reviews();
		// Send the reviews id to the the reviews class to set the bios array object
		$ReviewsCategoryIDs = 5;
		$Reviews->setPostByCategoryId($ReviewsCategoryIDs);

		$this->reviews = $Reviews->reviews;

	}

}
