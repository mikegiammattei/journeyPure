<?php

/**
 * FileName: Bios.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/2/2019
 */

namespace Bios;


class Bios
{

	public $bios;
	private $post;
	private $fields = array();
	private $bioPostsIds;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields($post->ID);
	}
	private function setBios(){

		foreach ($this->bioPostsIds as $index => $bioPostsId){
			$bio = get_fields($bioPostsId);

			$this->bios[] = (object) array(
				'photo' => array(
					'image' => $bio['photo']['sizes']['medium'],
					'alt' => $bio['photo']['alt']
				),
				'identifier' => $bio['photo']['id'],
				'name' => $bio['name'],
				'credentials' => $bio['credentials'],
				'title' => $bio['title'],
				'education' => $bio['education'],
				'specialty' => $bio['specialty'],
				'years' => $bio['years'],
				'recovery_status' => $bio['recovery_status'],
				'sober_since' => ($bio['sober_since']) ? : null,
			);

			if(isset($bio['additional_info'])){
				$this->bios[$index]->additional_info  = $bio['additional_info'];
				$this->bios[$index]->qualifications  = $bio['qualifications'];
				$this->bios[$index]->location  = $bio['location'];
				$this->bios[$index]->news_mentions  = $bio['news_mentions'];
			}

		}

	}
	public function setPostByCategoryId($categoryIDs){

		/** Get bios if there are any associated with the post bio category */
		if($categoryIDs){
			// Get bio post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'bios',
				'cat' => $categoryIDs,
				'orderby' => 'publish_date',
				'order' => 'ASC',
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$this->bioPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

			$this->setBios();
		}

	}
	public function setPostByCategoryName($name){

		/** Get bios if there are any associated with the post bio category */
		if($name){
			// Get bio post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'bios',
				'category_name' => 'homepage'
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$this->bioPostsIds = wp_list_pluck( $wp_query->posts, 'ID' );

			$this->setBios();
		}

	}
	public function setPostByCategoryIdAndTag($categoryIDs,$tagName){

		/** Get bios if there are any associated with the post bio category */
		if($categoryIDs){
			// Get bio post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'bios',
				'cat' => $categoryIDs,
				'orderby' => 'publish_date',
				'order' => 'ASC',
				'tax_query' => array(
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'name',
						'terms'    => $tagName,
					),
				),
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$postId = wp_list_pluck( $wp_query->posts, 'ID' );

			$bio = get_fields($postId[0]);

			$theBio = (object) array(
				'photo' => array(
					'image' => $bio['photo']['sizes']['medium'],
					'alt' => $bio['photo']['alt']
				),
				'name' => $bio['name'],
				'credentials' => $bio['credentials'],
				'title' => $bio['title'],
				'education' => $bio['education'],
				'specialty' => $bio['specialty'],
				'years' => $bio['years'],
				'recovery_status' => $bio['recovery_status'],
				'sober_since' => ($bio['sober_since']) ? : null,
			);

			if(isset($bio['additional_info'])){
				$theBio->additional_info  = $bio['additional_info'];
				$theBio->qualifications  = $bio['qualifications'];
				$theBio->location  = $bio['location'];
				$theBio->news_mentions  = $bio['news_mentions'];
			}
			return $theBio;

		}

	}
}
