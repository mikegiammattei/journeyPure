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
	public $bioSection;
	public $faqs;
	public $reviewAvg;
	public $reviewTotal;
	private $fields;

	public function __construct(){
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

		$this->setRatings();
		$this->setReviews();
		$this->setBios();
		$this->setBioSection();
		$this->setFAQs();

		define( 'STYLESHEET_NAME', 'homepage' );
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
	private function setBioSection(){

		if(isset($this->fields['bios'])):

			require_once(get_stylesheet_directory() . '/classes/Bios.php');
			$Bios = new \Bios\Bios();

			// Send the bio id to the the bio class to set the bios array object
			$BiosCategoryIDs =$this->fields['bios']['bios'];

			$Bios->setPostByCategoryId($BiosCategoryIDs);

			$this->bioSection = null;
			$this->bioSection = $Bios->bios;


			if($this->fields['bios']['show']){
				$this->bioSection = (object) array(
					'heading' => $this->fields['bios']['heading'],
					'subheading' => $this->fields['bios']['subheading'],
					'bios' => $this->bioSection
				);
			}else{
				$this->bioSection = null;
			}

		endif;
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
