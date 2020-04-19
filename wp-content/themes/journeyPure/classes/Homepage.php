<?php

/**
 * FileName: Homepage.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/11/2019
 */

namespace Homepage;


class Homepage
{

	public $ratings;
	public $reviews;
	public $bios;
	public $faqs;
	public $reviewAvg;
	public $reviewTotal;

	public function __construct(){
		$this->setRatings();
		$this->setReviews();
		$this->setBios();
		$this->setFAQs();
		define("STYLESHEET_NAME", "homepage");
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

		$this->reviewAvg = $Reviews->getAvgRating();
		$this->reviewTotal= $Reviews->getTotalReviews();

	}
	private function setBios()
	{

		require_once(get_stylesheet_directory() . '/classes/Bios.php');
		$Bios = new \Bios\Bios();

		$Bios->setPostByCategoryName('homepage');

		$this->bios = $Bios->bios;

	}
	private function setFAQs(){
		require_once(get_stylesheet_directory() . '/classes/FAQs.php');
		$Faqs = new \FAQs\FAQs();

		$Faqs->setFAQsByCatName('homepage');
		$this->faqs = $Faqs->faqs;
	}
	public function setLikes($objIdentifier){
		require_once(get_stylesheet_directory() . '/classes/Likes.php');
		$Likes = new \Likes();

		/** The identifier is the path of the bio image
		 * Returns total likes
		 */
		return $Likes->setLike($objIdentifier);
	}
	public function setInitialLikesStart($min,$max){
		require_once(get_stylesheet_directory() . '/classes/Likes.php');
		$Likes = new \Likes();

		/** The identifier is the path of the bio image */
		$Likes::setInitialLikesStart($min,$max);
	}
	public function isLikedBySession($objIdentifier){
		require_once(get_stylesheet_directory() . '/classes/Likes.php');
		$Likes = new \Likes();

		return $Likes->isLikedBySession($objIdentifier);
	}

}
