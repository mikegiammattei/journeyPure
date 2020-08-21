<?php
/**
 * FileName: FAQs.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/5/2019
 */

namespace FAQs;

class FAQs {

	public $faqs;
	private $post;
	private $fields = array();

	public function __construct() {
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
	}

	public function setFAQs($faqsCategoryIDs) {
		if(is_array($this->fields['photo_gallery'])):
			foreach ($faqsCategoryIDs as $faqPostsId){
				// Cache the fields.

				$cache_key = 'class-fields-' . $faqPostsId;
				$faq       = get_transient( $cache_key );

				if ( false === $faq ) {
					$faq = get_fields( $faqPostsId );

					if ( ! is_wp_error( $faq ) && ! empty( $faq ) ) {
						set_transient( $cache_key, $faq, HOUR_IN_SECONDS );
					}
				}

				// END Cache the fields.

				$this->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer' => $faq['answer']
				);
			}
		endif;
	}

	public function setFAQsByCatName($name) {
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
				// Cache the fields.

				$cache_key = 'class-fields-' . $faqPostsId;
				$faq       = get_transient( $cache_key );

				if ( false === $faq ) {
					$faq = get_fields( $faqPostsId );

					if ( ! is_wp_error( $faq ) && ! empty( $faq ) ) {
						set_transient( $cache_key, $faq, HOUR_IN_SECONDS );
					}
				}

				// END Cache the fields.

				$this->faqs[] = (object) array(
					'question' => $faq['question'],
					'answer' => $faq['answer']
				);
			}
		}
	}

}
