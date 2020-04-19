<?php

/**
 * FileName: Outpatient.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/16/2019
 */

namespace Locations;


class Outpatient
{
	private $locations;


	public function getLocations()
	{
		return $this->locations;
	}


	public function setLocations()
	{
		// Get rating post by the categories ID
		$args=array(
			'posts_per_page' => 50,
			'post_type' => 'outpatient-locations',
		);
		$wp_query = new \WP_Query( $args );

		// Get just Post IDs
		$postIds = wp_list_pluck( $wp_query->posts, 'ID' );

		foreach ($postIds as $postId) {
			$postData = get_fields($postId);
			$this->locations[] = (object)array(
				'facility_name' => $postData['facility_name'],
				'location_image' => ($postData['location_image']['sizes']['medium']) ? : null,
				'ratings' => (object) array(
					'number' => $postData['ratings']['number_rating'],
					'stars' => $postData['ratings']['stars'],
					'count' => $postData['ratings']['count'],
				),
				'address' => $postData['address'],

			);
		}

		   if(isset($_GET['dev'])){

			\ErrorHandler::get($this->locations);
			}
	}
}
