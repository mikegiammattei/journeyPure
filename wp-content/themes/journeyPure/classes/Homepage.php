<?php

/**
 * FileName: Homepage.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/11/2019
 */

namespace Homepage;


class Homepage
{

	public $ratings;

	public function __construct(){
		$this->setRatings();

	}
	private function setRatings(){
		require_once(get_stylesheet_directory() . '/classes/Ratings.php');
		$Ratings = new \Ratings\Ratings();

		$Ratings->setPostByCategoryId(5);

		$this->ratings = $Ratings->ratings;
	}

}
