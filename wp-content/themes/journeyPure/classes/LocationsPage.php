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
	public $reviewStats = array();
	public $locationName;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->setRatings();
		$this->reviewStats = $this->reviewStats();
		$this->setLocationName();
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
	public function getReviewsByLocationCat($locationCat){

		require_once(get_stylesheet_directory() . '/classes/Reviews.php');
		$Reviews = new \Reviews\Reviews();

		$catId = get_category_by_slug( $locationCat);
		$Reviews->setPostByCategoryId(array($catId->term_id));

		$this->reviews = $Reviews->reviews;

		$this->reviewAvg = $Reviews->getAvgRating();
		$this->reviewTotal= $Reviews->getTotalReviews();

	}

	public function reviewStats(){
		global $wpdb;
		$table = $wpdb->prefix.'review_loc_stats';
		$results = $wpdb->get_results(
			$wpdb->prepare("SELECT `data` FROM {$table} WHERE id=%d", 1)
		);
		if($results){
			$results = json_decode($results[0]->data,true);
		}else{
			$results = array();
		}
		$array = array(
			'Tennessee' => array(
				'total' => $results['tennessee-alcohol-038-drug-rehab-review-count'],
				'avg' => $results['tennessee-alcohol-038-drug-rehab-review-avg']
			),
			'Kentucky' => array(
				'total' => $results['kentucky-alcohol-038-drug-rehab-review-count'],
				'avg' => $results['kentucky-alcohol-038-drug-rehab-review-avg']
			),
			'Florida' => array(
				'total' => $results['florida-alcohol-038-drug-rehab-review-count'],
				'avg' => $results['florida-alcohol-038-drug-rehab-review-avg']
			),
			'Military' => array(
				'total' => $results['military-program-review-count'],
				'avg' => $results['military-program-review-avg']
			),
		);

		return $array;
	}

	public function setLocationName(){
		$this->locationName = ($this->fields['location_name']) ? : 'Tennessee';
	}
}
