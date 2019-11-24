<?php

/**
 * FileName: Likes.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/23/2019
 */

class Likes
{

	private $objIdentifier;
	private $totalLikes;
	private static $initialLikesStart;
	private $userIP;
	private $wpbd;

	public function __construct(){
		global $wpdb;
		$this->userIP = $_SERVER['REMOTE_ADDR'];
		$this->wpbd = $wpdb;
	}

	public static function getInitialLikesStart()
	{
		return self::$initialLikesStart;
	}

	public static function setInitialLikesStart($min, $max)
	{
		self::$initialLikesStart = rand($min,$max);
	}
	public function getObjIdentifier()
	{
		return $this->objIdentifier;
	}

	public function setObjIdentifier($objIdentifier)
	{
		$this->objIdentifier =  $this->clean($objIdentifier);
	}

	public function getTotalLikes()
	{
		return $this->totalLikes;
	}


	public function setTotalLikes()
	{
		$table = $this->wpbd->prefix.'jp_likes';
		$row = $this->wpbd->get_results( "SELECT * FROM {$table} WHERE object_identifier = '{$this->objIdentifier}'" );

		$this->totalLikes = $row[0]->count;
	}

	public function isLiked($objIdentifier){
		$table = $this->wpbd->prefix.'jp_likes';
		$row = $this->wpbd->get_results( "SELECT * FROM {$table} WHERE object_identifier = '{$objIdentifier}'" );

		if($row){
			return true;
		}
	}
	public function isLikedByIP($objIdentifier){
		$table = $this->wpbd->prefix.'jp_likes';
		$row = $this->wpbd->get_results( "SELECT * FROM {$table} WHERE object_identifier = '{$objIdentifier}' AND ip = '{$this->userIP}'" );

		if($row){
			return true;
		}
	}
	public function isLikedBySession($objIdentifier){
		$objIdentifier = $this->clean($objIdentifier);
		if(isset($_COOKIE["likePostId-" . $objIdentifier])) {
			return true;
		}else{
			return false;
		}
	}
	public function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	public function setLike($objIdentifier){
		/** Must clean the objectIdentifier before processing */
		$this->setObjIdentifier($objIdentifier);

		$this->setTotalLikes($this->objIdentifier);
		$table = $this->wpbd->prefix.'jp_likes';

		if(!$this->isLiked($this->objIdentifier)){
			$data = array('object_identifier' => $this->objIdentifier, 'count' => self::getInitialLikesStart());
			$format = array('%s','%d');
			$this->wpbd->insert($table,$data,$format);
		}

		return $this->totalLikes;
	}
	public function updateLikeObject($objIdentifier){
		/** Must clean the objectIdentifier before processing */
		$this->setObjIdentifier($objIdentifier);

		if(!isset($_COOKIE["likePostId-" . $this->objIdentifier])){
			$table = $this->wpbd->prefix.'jp_likes';
			$this->setTotalLikes();
			$updatedCount = $this->getTotalLikes() + 1;
			$this->wpbd->update($table, array('count' => $updatedCount),array('object_identifier' => $this->getObjIdentifier()));
			setcookie("likePostId-" . $this->objIdentifier,true, time() + (86400 * 360), "/"); // 86400 = 1 day

			return $updatedCount;
		}else{
			return false;
		}

	}
}
