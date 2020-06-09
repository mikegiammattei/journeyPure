<?php



/**

 * FileName: PressPage.php

 * Description:

 *

 * Created by: Digital Team.

 * Author: Michael Giammattei

 * Date: 9/29/2019

 */



namespace Pages;





class PressPage

{



	public $ratings;

	public $bios;

	public $bioCEO;

	public $mediaIcons;



	public function __construct(){

		global $post;

		$this->post = $post;

		$this->setRatings();

		$this->setBios();

		$this->setBioCEO();

		$this->setMediaIcons();



	}

	private function setRatings(){

		require_once(get_stylesheet_directory() . '/classes/Ratings.php');

		$Ratings = new \Ratings\Ratings();



		$Ratings->setPostByCategoryId(10);



		$this->ratings = $Ratings->ratings;

	}

	private function setBios(){



		require_once(get_stylesheet_directory() . '/classes/Bios.php');

		$Bios = new \Bios\Bios();



		// Send the bio id to the the bio class to set the bios array object

		$Bios->setPostByCategoryId(30);



		$this->bios = $Bios->bios;



		$this->bios = (object) array(

			'bios' => $this->bios

		);



	}

	private function setBioCEO(){



		require_once(get_stylesheet_directory() . '/classes/Bios.php');

		$Bios = new \Bios\Bios();



		$this->bioCEO = $Bios->setPostByCategoryIdAndTag(10,'CEO');



	}

	private function setMediaIcons(){

		$this->mediaIcons = get_fields();

		$this->mediaIcons = $this->mediaIcons['media'];

	}



}

