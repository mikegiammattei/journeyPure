<?php

/**
 * FileName: Schema.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 12/20/2019
 */

class Schema
{

	private $markup;
	private $post;

	public function __construct(){
		global $post;
		$this->post = $post;
		$this->setMarkup();
	}

	public function setMarkup(){
		$postFieldMarkup = get_field('markup');
		if($postFieldMarkup){
			$this->markup = $postFieldMarkup;
		}

	}
	public function getMarkup(){
		if(!empty($this->markup)){
			echo '<script type="application/ld+json">{' . PHP_EOL ;
			echo $this->markup;
			echo '}</script>';
		}

	}
}
