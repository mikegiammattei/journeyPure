<?php

/**
 * FileName: Outpatient.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/15/2019
 */

namespace Pages;


class Outpatient
{

	public $ratings;
	public $reviews;
	public $faqs;
	public $reviewAvg;
	public $reviewTotal;
	public $locations;

	public function __construct(){
		$this->setRatings();
		$this->setReviews();
		$this->setFAQs();
		$this->setLocations();
		$this->uploadLocations();
	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();

		$ReviewsCategoryIDs = get_category_by_slug("outpatient");
		$Ratings->setPostByCategoryId($ReviewsCategoryIDs->term_id);

		$this->ratings = $Ratings->ratings;
	}
	private function setReviews(){

		require_once(get_stylesheet_directory() . '/classes/Reviews.php');
		$Reviews = new \Reviews\Reviews();
		// Send the reviews id to the the reviews class to set the bios array object
		$ReviewsCategoryIDs = get_category_by_slug("outpatient");


		$Reviews->setPostByCategoryId($ReviewsCategoryIDs->term_id);

		$this->reviews = $Reviews->reviews;

		$this->reviewAvg = $Reviews->getAvgRating();
		$this->reviewTotal= $Reviews->getTotalReviews();

	}
	private function setFAQs(){
		require_once(get_stylesheet_directory() . '/classes/FAQs.php');
		$Faqs = new \FAQs\FAQs();

		$Faqs->setFAQsByCatName('outpatient');
		$this->faqs = $Faqs->faqs;
	}
	private function setLocations(){
		require_once(get_stylesheet_directory() . '/classes/Outpatient.php');
		$Outpatient = new \Locations\Outpatient();
		$Outpatient->setLocations();

		$this->locations = $Outpatient->getLocations();
	}
	private function uploadLocations(){
		require_once(get_stylesheet_directory() . '/classes/UploaderLocations.php');
		$UploaderLocations= new \Uploader\Locations();

		$UploaderLocations->process();
	}
}
