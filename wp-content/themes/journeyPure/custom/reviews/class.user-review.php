<?php
class UserReviews{

	public  static function add_user_reviews() {
		add_submenu_page(
			'edit.php?post_type=reviews',
			'User Reviews', 'User Reviews',
			'manage_options',
			'edit.php?post_type=user-reviews'
		);
	}
}
