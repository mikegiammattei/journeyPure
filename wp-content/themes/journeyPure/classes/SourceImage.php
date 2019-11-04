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

class SourceImage{
	private $attachment_id;
	private $imgPathArr =  array();

	public function __construct(){
		$this->imgPathArr['yelp'] = "/wp-content/uploads/2019/10/verified-yelp.png";
		$this->imgPathArr['rehabs'] = "/wp-content/uploads/2019/10/verified-rehabs.png";
		$this->imgPathArr['google'] = "/wp-content/uploads/2019/10/verified-google.png";
		$this->imgPathArr['verified'] = "/wp-content/uploads/2019/10/verified.png";
	}

	public function setSourceImageId($name){
		$name = strtolower($name);

		$attPostId = attachment_url_to_postid( get_site_url() . $this->imgPathArr[$name] );
		return $this->attachment_id = $attPostId;
	}
}
