<?php

/**
 * FileName: .php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/1/2019
 */


class User
{

	private $state;
	private $city;
	protected $geoPlugin;

	public function __construct(){

		require_once(get_stylesheet_directory() . '/classes/geoplugin.class.php');
		$this->geoPlugin= new geoPlugin();

		if(isset($_GET['IP_INFO'])){
			\ErrorHandler::get($_SERVER);
		}
		if(isset($_GET['dev'])){

			$this->geoPlugin->locate('96.69.119.93');
		}else{
			$this->geoPlugin->locate();
		}

		$this->state = $this->geoPlugin->region;
		$this->city = $this->geoPlugin->city;


	}
	public function getState()
	{
		return $this->state;
	}

	function getCity()
	{
		return $this->city;
	}

}
