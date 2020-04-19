<?php

/**
 * FileName: .php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/1/2019
 */

error_reporting(0);
class User
{

	private $state;
	private $city;
	protected $geoPlugin;

	public function __construct(){

		require_once(WP_CONTENT_DIR . '/themes/journeyPure/classes/geoplugin.class.php');
		$this->geoPlugin= new geoPlugin();

		if(isset($_GET['IP_INFO'])){
			\ErrorHandler::get($_SERVER);
		}
		$this->geoPlugin->locate();


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
