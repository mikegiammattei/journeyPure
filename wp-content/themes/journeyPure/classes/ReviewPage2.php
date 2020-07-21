<?php
/**
 * Template Reviews 2
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

namespace Pages;

/**
 * Template Reviews 2 model class
 */
class ReviewPage2 {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		global $post;
		$this->post = $post;

		$this->fields = get_fields();

		$this->set_ratings();
		$this->set_videos();
		$this->set_reviews();
	}

	/**
	 * Set ratings
	 *
	 * @return void
	 */
	private function set_ratings() {
		require_once get_stylesheet_directory() . '/classes/Ratings.php';
		$ratings             = new \Ratings\Ratings();
		$ratings_category_id = get_category_by_slug( 'reviews' );

		$ratings->setPostByCategoryId( $ratings_category_id->term_id );

		$this->ratings = $ratings->ratings;
	}

	/**
	 * Set videos
	 *
	 * @return void
	 */
	private function set_videos() {
		if ( ! empty( $this->fields['videos'] ) ) {
			$this->videos = (object) $this->fields['videos'];
		}
	}

	/**
	 * Set reviews
	 *
	 * @param int    $page Page.
	 * @param string $orderby Order by.
	 *
	 * @return void
	 */
	private function set_reviews( $page = 1, $sort = 'n' ) {
		require_once get_stylesheet_directory() . '/classes/Reviews.php';
		$reviews = new \Reviews\Reviews();

		switch ( $sort ) {
			// case 'ml':
			// 	$orderby = 'likes';
			// 	$order   = 'DESC';
			// 	break;

			case 'lr':
				$orderby = 'star_rating';
				$order   = 'ASC';
				break;

			case 'hr':
				$orderby = 'star_rating';
				$order   = 'DESC';
				break;

			case 'o':
				$orderby = 'date';
				$order   = 'ASC';
				break;

			// case 'n':
			default:
				$orderby = 'date';
				$order   = 'DESC';
				break;
		}

		// 16 = not-ready.
		$reviews->set_post_by_category_id_exclude( array( 16 ), $page, $orderby, $order );

		$this->reviews      = $reviews->reviews;
		$this->review_avg   = $reviews->getAvgRating();
		$this->review_total = $reviews->getTotalReviews();

		foreach ( $this->reviews as $i => $review ) {
			$this->set_initial_likes_start( 54, 300 );
			$like_identifier                  = $review->identifier;
			$this->reviews[ $i ]->total_likes = $this->set_likes( $like_identifier );
		}
	}

	/**
	 * Get reviews (ajax)
	 *
	 * @return void
	 */
	public function ajax_get_reviews() {
		if ( ! empty( $_REQUEST['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'get_reviews' ) ) {
			die( 'No naughty business please' );
		}

		// Get parameters and process reviews.

		$page   = 1;
		$sortby = 'n';

		if ( ! empty( $_REQUEST['page'] ) ) {
			$page = sanitize_text_field( wp_unslash( $_REQUEST['page'] ) );
		}

		if ( ! empty( $_REQUEST['sort'] ) ) {
			$sort = sanitize_text_field( wp_unslash( $_REQUEST['sort'] ) );
		}

		$this->set_reviews( $page, $sort );

		// HTML output.

		global $_reviews;
		$_reviews = $this;
		require get_stylesheet_directory() . '/assets/src/includes/components/review-items.php';

		// End.

		die();
	}

	/**
	 * Set likes
	 *
	 * @param string $obj_identifier Object identifier.
	 *
	 * @return int likes counter
	 */
	public function set_likes( $obj_identifier ) {
		require_once get_stylesheet_directory() . '/classes/Likes.php';
		$likes = new \Likes();
		return $likes->setLike( $obj_identifier );
	}

	/**
	 * Set initial likes
	 *
	 * @param int $min Minimum.
	 * @param int $max Maximum.
	 *
	 * @return void
	 */
	public function set_initial_likes_start( $min, $max ) {
		require_once get_stylesheet_directory() . '/classes/Likes.php';
		$likes = new \Likes();
		$likes::setInitialLikesStart( $min, $max );
	}

	/**
	 * If the current session already liked this object
	 *
	 * @param string $obj_identifier Object identifier.
	 *
	 * @return boolean If the current session already liked this object
	 */
	public function is_liked_by_session( $obj_identifier ) {
		require_once get_stylesheet_directory() . '/classes/Likes.php';
		$likes = new \Likes();
		return $likes->isLikedBySession( $obj_identifier );
	}

}
