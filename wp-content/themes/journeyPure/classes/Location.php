<?php

/**
 * FileName: Location.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 9/29/2019
 */

namespace Locations;


class Location
{

	public $aboveFold;
	public $ratings;
	public $block2;
	public $block3;
	public $gallery;
	private $fields;
	public $bios;
	public $reviews;
	public $block4;
	private $post;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields();
		$this->setAboveFold();
		$this->setBlock2();
		$this->setBlock3();
		$this->setGallery();
		$this->setBios();
		$this->setReviews();
		$this->setBlock4();

	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();


		$RatingsCategoryIDs =$this->fields['above_fold']['ratings'];
		$Ratings->setPostByCategoryId($RatingsCategoryIDs);

		$this->ratings = $Ratings->ratings;
	}
	private function setAboveFold(){
		$this->setRatings();
		$this->aboveFold = (object) array(
			'image' => $this->fields['above_fold']['feature_image']['url'],
			'heading' => $this->fields['above_fold']['heading'],
			'subheading' => $this->fields['above_fold']['sub_heading'],
			'h1' => ($this->fields['above_fold']['location_text_overlay']['h1_heading']) ? : null,
			'h2' => ($this->fields['above_fold']['location_text_overlay']['h2_heading']) ? : null,
		);
	}
	private function setBlock2(){
		$this->block2 = (object) array(
			'heading' => $this->fields['block_2']['heading'],
			'list' => $this->fields['block_2']['list'],
			'tagSections' =>$this->fields['block_2']['aside_tags']
		);
	}
	private function setBlock3(){
		if(isset($this->fields['block_3'])){
			$this->block3 = (object) array(
				'heading' => $this->fields['block_3']['heading'],
				'image' => array(
					'url' => $this->fields['block_3']['image']['sizes']['medium_large'],
					'alt' => get_post_meta( $this->fields['block_3']['image']['ID'], '_wp_attachment_image_alt', true )
				),
				'midContent' =>$this->fields['block_3']['half_size_content_box'],
				'bottomContent' => $this->fields['block_3']['bottom_content'],

			);

		}

	}
	private function setGallery(){
		if(isset($this->fields['photo_gallery']) && is_array($this->fields['photo_gallery']) ):
			foreach ($this->fields['photo_gallery'] as $gallery):
				$this->gallery[] = (object) array(
					'medium' => $gallery['sizes']['medium_large'],
					'alt' => get_post_meta( $gallery['ID'], '_wp_attachment_image_alt', true ),
					'large' => $gallery['url']
				);
			endforeach;
		endif;
	}
	private function setBios(){
		if(isset($this->fields['bios'])):

			require_once(get_stylesheet_directory() . '/classes/Bios.php');
			$Bios = new \Bios\Bios();

			// Send the bio id to the the bio class to set the bios array object
			$BiosCategoryIDs =$this->fields['bios']['bios'];
			$Bios->setPostByCategoryId($BiosCategoryIDs);

			$this->bios = $Bios->bios;

			$this->bios = (object) array(
				'heading' => $this->fields['bios']['heading'],
				'subheading' => $this->fields['bios']['subheading'],
				'bios' => $this->bios
			);
		endif;
	}
	private function setReviews(){
		if(isset($this->fields['reviews'])):

			require_once(get_stylesheet_directory() . '/classes/Reviews.php');
			$Reviews = new \Reviews\Reviews();

			// Send the reviews id to the the reviews class to set the review array object
			$ReviewsCategoryIDs =$this->fields['reviews'];

			$Reviews->setPostByPostId($ReviewsCategoryIDs);

			$this->reviews = $Reviews->reviews;

		endif;
	}
	private function setBlock4(){
		if(isset($this->fields['block_4'])):
			$this->block4 = (object) array(
				'heading' => $this->fields['block_4']['heading'],
				'subheading' => $this->fields['block_4']['subheading'],
			);
		endif;
		if(isset($this->fields['block_4']['faq'])):
			require_once(get_stylesheet_directory() . '/classes/FAQs.php');
			$Faqs = new \FAQs\FAQs();

			// Send the reviews id to the the reviews class to set the bios array object
			$faqsCategoryIDs = $this->fields['block_4']['faq'];
			$Faqs->setFAQs($faqsCategoryIDs);

			$this->block4->faqs = $Faqs->faqs;
		endif;
		if(isset($this->fields['block_4']['location'])):
			$this->block4->location = (object)array();
			$this->block4->location->name = ($this->fields['block_4']['location']['name']) ? : null;
			$this->block4->location->street_address = ($this->fields['block_4']['location']['street_address']) ? : null;
			$this->block4->location->city = ($this->fields['block_4']['location']['city']) ? : null;
			$this->block4->location->state = ($this->fields['block_4']['location']['state']) ? : null;
			$this->block4->location->zip = ($this->fields['block_4']['location']['zip']) ? : null;
			$this->block4->location->description = ($this->fields['block_4']['location']['description']) ? : null;
			$this->block4->location->full_address = ($this->fields['block_4']['location']['street_address']) ?
				$this->fields['block_4']['location']['street_address'] . ' ' .
				$this->fields['block_4']['location']['city'] . ' ' .
				$this->fields['block_4']['location']['state'] . ' ' .
				$this->fields['block_4']['location']['zip']
				: null;
		endif;

		if(isset($this->fields['block_4']['location'])):
			require_once(get_stylesheet_directory() . '/classes/LocationStatus.php');

			$LocationStatus = new \Status\LocationStatus($this->post->ID);
			$this->block4->location->status = ($LocationStatus);
		endif;

	}

}
