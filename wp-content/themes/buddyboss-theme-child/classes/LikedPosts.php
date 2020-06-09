<?php

class LikedPosts {

	private $thePosts;
	private $paged;
	private $postPerPage;
	private $postOffset;

	public function __construct() { }

	public function setPosts( $postPerPage = 10, $paged = 1, $postOffset = 0 ) {
		$this->postPerPage = $postPerPage;
		$this->paged       = $paged;
		$this->postOffset  = $postOffset;

		$query_args = [
			'post_type'      => 'post',
			'post_status'    => [ 'publish' ],
			'posts_per_page' => $this->postPerPage,
			'paged'          => $this->paged,
			'offset'         => $this->postOffset,
			'meta_key'       => 'Likes minus dislikes',

			'orderby'        => [
				'meta_value' => 'DESC',
				'date'       => 'DESC',
			],

			'meta_query' => [
				'relation' => 'OR',

				[
					'key'     => 'Likes minus dislikes',
					'compare' => 'NOT EXISTS',
					'type'    => 'numeric',
				],

				[
					'key'     => 'Likes minus dislikes',
					'compare' => 'EXISTS',
					'type'    => 'numeric',
				],
			],
		];

		$this->thePosts = new WP_Query( $query_args );
	}

	public function getPosts() {
		return $this->thePosts;
	}

}
