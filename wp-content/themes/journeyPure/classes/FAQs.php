<?php

/**
 * FileName: FAQs.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/5/2019
 */

namespace FAQs;


class FAQs
{
	public $faqs;
	private $post;
	private $fields = array();

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->fields = get_fields($post->ID);
	}
	public function setFAQs($faqsCategoryIDs){

		if(is_array($this->fields['photo_gallery'])):
			foreach ($faqsCategoryIDs as $faqPostsId){
				$faq = get_fields($faqPostsId);

				$this->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer' => $faq['answer']
				);
			}
		endif;
	}
	public function setFAQsByCatName($name){

		/** Get bios if there are any associated with the post bio category */
		if($name){
			// Get bio post by the categories ID
			$args=array(
				'posts_per_page' => 50,
				'post_type' => 'faq',
				'category_name' => $name
			);
			$wp_query = new \WP_Query( $args );

			// Get just Post IDs
			$postIds = wp_list_pluck( $wp_query->posts, 'ID' );

			foreach ($postIds as $faqPostsId){
				$faq = get_fields($faqPostsId);

				$this->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer' => $faq['answer']
				);
			}
		}

	}
}
