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


class Review
{

	public $ratings;
	public $reviewAvg;
	public $reviewTotal;
	public $reviews;
	public $faqs;
	public $reviewTags = array();
	public $videoObjects;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->setRatings();
		$this->setReviewVideos();
		$this->setFAQs();
	}
	public function reviewTags($tags){
		$this->reviewTags = $tags;
	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();
		$RatingsCategoryID = get_category_by_slug("reviews");

		$Ratings->setPostByCategoryId($RatingsCategoryID->term_id);

		$this->ratings = $Ratings->ratings;
	}

	public function setReviews($tagName){
		require_once(get_stylesheet_directory() . '/classes/Reviews.php');
		$Reviews = new \Reviews\Reviews();

		/** Run code below to add keyword to review post according to the review source. */
		/** require_once(get_stylesheet_directory() . '/classes/ReviewsUtility.php');
		$ReviewUtility = new \Reviews\Utility();
		$ReviewUtility->setTagPerReviewSource();
		 */

		$Reviews->setPostTag($tagName);

		$this->reviews = $Reviews->reviews;
		$this->reviewAvg = $Reviews->getAvgRating();
		$this->reviewTotal= $Reviews->getTotalReviews();



	}

	public function setReviewVideos(){
		require_once(get_stylesheet_directory() . '/classes/YoutubePlaylist.php');
		$YoutubePlaylist = new \Video\YoutubePlaylist(GOOGLE_API);
		$YoutubePlaylist->setPlaylistID('PLHDsMrVMfSfKHR0jIWpOiWXz_ghu-81pU');
		$YoutubePlaylist->setApiUrl('https://www.googleapis.com/youtube/v3/playlistItems?');

		$options = array(
			"part" => 'snippet',
			"key" =>  $YoutubePlaylist->getAPI_KEY(),
			"maxResults" => 20,
			"playlistId" => $YoutubePlaylist->getPlaylistID()
		);

		$channel_URL = $YoutubePlaylist->getApiUrl() . http_build_query($options);
		$json_details = json_decode(file_get_contents($channel_URL),true);
		$this->videoObjects = $json_details;

	}
	private function setFAQs(){
		require_once(get_stylesheet_directory() . '/classes/FAQs.php');
		$Faqs = new \FAQs\FAQs();

		$Faqs->setFAQsByCatName('reviews');
		$this->faqs = $Faqs->faqs;
	}
}
