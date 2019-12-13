<?php

/**
 * FileName: Chat.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 11/1/2019
 */

namespace CTA;

class Chat extends \User
{

	private $locations;
	public $isLocal;
	private $geoNearBy;

	public function __construct()
	{

		parent::__construct();
		$this->locations = $this->setLocations();
		//$this->isNearBy();
		$this->geoNearBy = $this->geoPlugin->nearby(30, 100);
		$this->isLocal();
	}
	private function setLocations(){
		$path = get_stylesheet_directory() . '/locations.xml';

		// Read entire file into string
		$xmlfile = file_get_contents($path);

		// Convert xml string into an object
		$new = simplexml_load_string($xmlfile);

		// Convert into json
		$con = json_encode($new);

		// Convert into associative array
		$locations = json_decode($con, true);

		return $locations;
	}

	private function isLocal(){
		/** Loop through locations */
		foreach ($this->locations as $location):
			/** Loop through locations filters */
			foreach ($location as $item ) {

				if($this->isNearBy($item['state'],$item['city'])){

					$this->isLocal = true;
					break;
				}
			}
		endforeach;

	}
	function isNearBy($theState,$theCity){
		$isNearBy = false;

		if(is_array($this->geoNearBy)):
			foreach ($this->geoNearBy as $location):

				if($location['geoplugin_region'] == $theState && $location['geoplugin_place'] == $theCity){
					//\ErrorHandler::get($location['geoplugin_region']);
					//\ErrorHandler::get($location['geoplugin_place']);
					$isNearBy = true;
					break;
				}

			endforeach;

		endif;
		return $isNearBy;
	}
}
