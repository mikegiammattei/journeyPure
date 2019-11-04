<?php

/**
 * FileName: HeaderContactInfo.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/3/2019
 */

namespace Header;


class HeaderContactInfo
{
	private $hide = false;
	private $postTypeArr = array();

	public function addHidePostType($postType){
		$this->postTypeArr[] = $postType;

		$this->hide = true;
		error_reporting(3);

	}
	public function getHideMenu(){
		return $this->hide;
	}
	public function getHiddenPostTypes(){

		\ErrorHandler::get($this->postTypeArr);
		return $this->postTypeArr;
	}
}
