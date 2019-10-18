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
}
