<?php

/**
 * FileName: Likes.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/23/2019
 */

class InsuranceForm
{

	private $objIdentifier;
	private $userIP;
	private $wpbd;

	public function __construct(){
		global $wpdb;
		$this->userIP = $_SERVER['REMOTE_ADDR'];
		$this->wpbd = $wpdb;
	}
	public function submitForm($dataIn){
		$table = $this->wpbd->prefix.'insurance_form';

			$data = array('content' => $dataIn['content'], 'ip' => $_SERVER['REMOTE_ADDR']);
			$format = array('%s','%s');

			if($this->wpbd->insert($table,$data,$format)){
				echo "Success";
			}else{
				echo "Failed";
			}


	}

}
