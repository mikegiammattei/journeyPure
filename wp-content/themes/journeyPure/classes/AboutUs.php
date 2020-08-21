<?php

/**
 * FileName: Location.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 9/29/2019
 */

namespace Pages;


class AboutUs
{

	public $ratings;
	public $bios;
	public $bioCEO;
	public $mediaIcons;

	public function __construct(){
		global $post;
		$this->post = $post;

		// Cache the fields.

		$cache_key    = 'class-fields-' . $this->post->ID;
		$this->fields = get_transient( $cache_key );

		if ( false === $this->fields ) {
			$this->fields = get_fields();

			if ( ! is_wp_error( $this->fields ) && ! empty( $this->fields ) ) {
				set_transient( $cache_key, $this->fields, HOUR_IN_SECONDS );
			}
		}

		// END Cache the fields.

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
		$Bios->setPostByCategoryId(10);

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
		$this->mediaIcons = $this->fields['media'];
	}

}
