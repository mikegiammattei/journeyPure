<?php
class UserQuestions{

	public  static function add_user_questions() {
		add_submenu_page(
			'edit.php?post_type=faq',
			'User Questions', 'User Questions',
			'manage_options',
			'edit.php?post_type=user-questions'
		);
	}
}
