<?php

/**
 * FileName: Reviews.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/4/2019
 */

namespace Reviews;

class Utility
{

	public function setTagPerReviewSource(){
		$args=array(
			'posts_per_page' => 500,
			'post_type' => 'reviews',
		);
		$wp_query = new \WP_Query( $args );

		// Get just Post IDs
		$allPostIds = wp_list_pluck( $wp_query->posts, 'ID' );


		foreach ($allPostIds as $index => $postID){
			$field = get_fields($postID);

			$postSourceImgPath = $field['source_image']['filename'];

			if(!empty($postSourceImgPath)){

				switch ($postSourceImgPath):
					case 'verified-rehabs.png' :
						wp_set_post_tags($postID,'rehab');
						break;
					case 'verified-google.png' :
						wp_set_post_tags($postID,'google');
						break;
					case 'verified.png' :
						wp_set_post_tags($postID,'verified');
						break;
					case 'verified-yelp.png' :
						wp_set_post_tags($postID,'yelp');
						break;
				endswitch;
			}
		}




	}
}
