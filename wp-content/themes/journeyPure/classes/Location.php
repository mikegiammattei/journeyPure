<?php

/**
 * FileName: Location.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 9/29/2019
 */

namespace Locations;


class Location
{

	public $aboveFold;
	public $block2 = array();
	private $fields = array();

	public function __construct(){
		$this->fields = get_fields();
		$this->setAboveFold();
		$this->setBlock2();


	}
	private function setAboveFold(){
		$this->aboveFold = (object) array(
			'image' => $this->fields['above_fold']['feature_image']['url'],
			'heading' => $this->fields['above_fold']['heading'],
			'subheading' => $this->fields['above_fold']['sub_heading'],
		);
	}
	private function setBlock2(){
		$this->block2 = (object) array(
			'heading' => $this->fields['block_2']['heading'],
			'list' => $this->fields['block_2']['list'],
		);
	}
}
