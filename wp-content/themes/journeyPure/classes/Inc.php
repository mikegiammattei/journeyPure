<?php

/**
 * FileName: Inc.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 10/5/2019
 */

namespace Includes;

class Inc
{
	private $get;

	public function __construct(){
		$this->get = (object) array(
			'insurance_banner' => $this->set_insurance_banner()
		);
	}

	private  function set_insurance_banner(){
		ob_start();
		include(get_stylesheet_directory() . '/assets/src/includes/insurance-banner.php');
		return ob_get_clean();
	}
	public  function get_insurance_banner(){
		echo $this->get->insurance_banner;
	}
}
