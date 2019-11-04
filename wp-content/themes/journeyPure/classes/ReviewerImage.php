<?php

/**
 * FileName: SourceImage.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/29/2019
 */

namespace Image;

class Reviewer{
	private $attachment_id;
	private $imgBasePath;

	public function __construct(){
		$this->imgBasePath = get_site_url() . "/wp-content/uploads/reviews";
	}

	public function setImgId($name){

		if(empty($name)){
			$name = "generic-profile-1.png";
		}

		$attPostId = attachment_url_to_postid( $this->imgBasePath . '/' . $name);

		\ErrorHandler::get($name . " loaded.");
		return $this->attachment_id = $attPostId;
	}
}
