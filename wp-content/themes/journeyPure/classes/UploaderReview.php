<?php

/**
 * FileName: UploaderReview.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/29/2019
 */

namespace Uploader;

class Review
{
	private $srcImgID;
	private $ProfileImg;
	private $title;
	private $location;
	private $name;
	private $rating;
	private $date;
	private $content;
	private $category;

	/**
	 * @return mixed
	 */
	public function getProfileImg()
	{
		return $this->ProfileImg;
	}

	/**
	 * @param mixed $ProfileImg
	 */
	public function setProfileImg($ProfileImg)
	{
		include_once('ReviewerImage.php');
		$ReviewerImage = new \Image\Reviewer();
		$srcImgID = $ReviewerImage->setImgId($ProfileImg);

		$this->ProfileImg = $srcImgID;
	}
	/**
	 * @return mixed
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * @param mixed $category
	 */
	public function setCategory($category)
	{
		error_reporting(3);
		$catID = null;
		$category = strtolower($category);

		$catObj = get_category_by_slug( $category );

		$this->category = $catObj->term_id;
	}
	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}


	/**
	 * @return mixed
	 */
	public function getSrcId()
	{
		return $this->srcImgID;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 * @return Review
	 */
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @param mixed $location
	 * @return Review
	 */
	public function setLocation($location)
	{
		$this->location = $location;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRating()
	{
		return $this->rating;
	}

	/**
	 * @param mixed $rating
	 * @return Review
	 */
	public function setRating($rating)
	{
		$this->rating = $rating;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param mixed $date
	 * @return Review
	 */
	public function setDate($date)
	{
		$this->date = $date;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 * @return Review
	 */
	public function setContent($content)
	{
		$this->content = $content;
		return $this;
	}

	/**
	 * @param mixed $srcImgID
	 */
	public function setSrcImg($srcImgID)
	{
		include_once('SourceImage.php');
		$SourceImage = new \Image\SourceImage();
		$srcImgID = $SourceImage->setSourceImageId($srcImgID);

		$this->srcImgID = $srcImgID;
	}
	public function process(){

		//$reviewArr = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/DataFiles/fl-reviews.csv'));
		//$reviewArr = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/DataFiles/tn-reviews.csv'));
		//$reviewArr = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/DataFiles/ky-reviews.csv'));
		$reviewArr = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/DataFiles/homepage-reviews.csv'));


		foreach ($reviewArr as $index => $item):

			unset($postArgs);
			if($index != 0){
				$this->setSrcImg($item[0]);
				$this->setDate($item[1]);
				$this->setLocation($item[2]);
				$this->setName($item[3]);
				$this->setRating($item[4]);
				$this->setContent($item[5]);
				$this->setCategory($this->getLocation());
				$this->setProfileImg($item[6]);

				$postArgs = array(
					'post_title'    => $this->getName(),
					'post_type' => 'reviews',
					'post_status'   => 'publish',
					'post_category' => array($this->getCategory())
				);

				/** Create new review post and return the new post ID */
				$new_post_id = wp_insert_post($postArgs);

				/** image - acf */
				update_field('field_5d97c80326d33', $this->getProfileImg(), $new_post_id);

				/** source_image - acf */
				update_field('field_5da8f6517e206', $this->getSrcId(), $new_post_id);

				/** heading - acf */
				update_field('field_5d97c81726d34', $this->getName(), $new_post_id);

				/** star_rating - acf */
				update_field('field_5d97c82526d35', $this->getRating(), $new_post_id);

				/** review_text - acf */
				update_field('field_5d97c83e26d36', $this->getContent(), $new_post_id);

				/** date - acf */
				update_field('field_5db8b6819c4bb', $this->getDate(), $new_post_id);
			}

		endforeach;


	}

}
