<?php

/**
 * FileName: Nav.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/3/2019
 */

namespace Navigation;


class LocationSubMenu
{

	private $hideMenu = false;
	private $postTypeArr = array();

	public function addHidePostType($postType){
		$this->postTypeArr[] = $postType;

		$this->hideMenu = true;
	}
	public function getHideMenu(){
		return $this->hideMenu;
	}
	public function getHiddenPostTypes(){
		return $this->postTypeArr;
	}
}
