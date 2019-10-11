<?php

/**
 * FileName: LocationStatus.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/6/2019
 */

namespace Status;

class LocationStatus
{
	private $db;
	private $postID;
	public $facility;
	public $facilityData = false;
	public $baseRoomsLeft = 3;
	public $updateActiveVisitorInterval = 2; // Value of minutes
	public $updateBaseRoomsLeftInterval = 30; // Value of minutes
	public $baseViewingVisitors = 14;
	public $activeVisitorCount;
	public $availableRoomCount;


	public function __construct($post_id){
		$this->postID = $post_id;
		global $wpdb;
		$this->db =$wpdb;

		$this->activeVisitorCount = rand(4,$this->baseViewingVisitors );

		$this->isLocationSet();
	}
	private function processStatus(){
		/** Get the facility Data */
		$this->facilityData = $this->getFacilityStatus();

		/** Set the date if it's not set for the proved facility */
		$this->setFacilityStatus();
	}
	private function addFacility(){
		$table = $this->db->prefix.'facility_status';
		$data = array('locationPageId' => $this->postID, 'activePageViewers' => rand(4,$this->baseViewingVisitors ), 'setDate' => time(), 'roomsAvailable' => rand(1,$this->baseRoomsLeft));
		$format = array('%d','%d','%d','%d');
		$this->db->insert($table,$data,$format);

	}
	private function isLocationSet(){
		$facilityStatus = $this->db->get_results("SELECT * FROM wp_facility_status WHERE locationPageId =".$this->postID);

		if(!empty($facilityStatus)){
			$this->processStatus();
		}else{
			$this->addFacility();
		}
	}
	private function getFacilityStatus(){
		$facilityStatus = $this->db->get_results("SELECT * FROM wp_facility_status WHERE locationPageId =".$this->postID);
		return (array)$facilityStatus[0];

	}
	private function UpdateVisitors(){

		$timeDifference = (time() - $this->facilityData['setDate']) / 60;

		if($timeDifference > $this->updateActiveVisitorInterval){
			$activeUserUpdated = rand(4,$this->baseViewingVisitors );

			$table = $this->db->prefix.'facility_status';
			$data = array('locationPageId' => $this->postID, 'activePageViewers' => $activeUserUpdated, 'setDate' => time());
			$format = array('%d','%d','%d');
			$this->db->insert($table,$data,$format);

			/** Update class variable for total active users. */
			$this->facilityData['activePageViewers'] = $activeUserUpdated;
			$this->activeVisitorCount = $activeUserUpdated;
		}else{
			/** Update class variable for total active users. */
			$this->activeVisitorCount = $this->facilityData['activePageViewers'];;
		}


	}
	private function UpdateAvailableRooms(){

		$timeDifference = round((time() - $this->facilityData['setDate']) / 60);

		if($timeDifference < $this->updateBaseRoomsLeftInterval){

			$baseRoomUpdated = rand(1,$this->baseRoomsLeft);

			$table = $this->db->prefix.'facility_status';
			$data = array('locationPageId' => $this->postID, 'roomsAvailable' => $baseRoomUpdated, 'setDate' => time());
			$format = array('%d','%d','%d');
			$this->db->insert($table,$data,$format);

			/** Update class variable for total active users. */
			$this->facilityData['roomsAvailable'] = $baseRoomUpdated;
			$this->availableRoomCount = $baseRoomUpdated;
		}else{
			/** Update class variable for total active users. */
			$this->availableRoomCount = $this->facilityData['roomsAvailable'];;
		}

	}
	private function setFacilityStatus(){

		/** Updated active viewing visitors  */
		$this->UpdateVisitors();

		/** Update Available Rooms */
		$this->UpdateAvailableRooms();

	}
}
