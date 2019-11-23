<?php

/**
 * FileName: UploaderLocations.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/17/2019
 */

namespace Uploader;


class Locations
{

	private $category;

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
	public function process(){

		$locationArr = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/DataFiles/all-locations.csv'));


		/** Turn on to add locations from csv file */
		$go = false;
		if($go){
			foreach ($locationArr as $index => $item):

				$this->setCategory($item[2]);

				unset($postArgs);

				$postArgs = array(
					'post_title'    => $item[0],
					'post_type' => 'outpatient-locations',
					'post_status'   => 'publish',
					'post_category' => array($this->getCategory())
				);

				/** Create new review post and return the new post ID */
				$new_post_id = wp_insert_post($postArgs);

				/** Facility Name - acf */
				update_field('field_5dd011510ff92', $item[0], $new_post_id);

				/** Address - acf */
				update_field('field_5dd012330ff96', $item[1], $new_post_id);

				$values = array(

					'number_rating'	=>	$item[3],
					'stars'	=>	$item[4],
					'count'	=>	$item[5],

				);
				/** Rating Object - acf */
				update_field('field_5dd01f4ffc0c7', $values, $new_post_id);



			endforeach;
		}

	}
}
