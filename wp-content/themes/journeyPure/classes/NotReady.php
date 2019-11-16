<?php

/**
 * FileName: NotReady.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/11/2019
 */

namespace Modal;


class NotReady
{

	public $faqs;

	public function __construct(){
		$this->setFAQs();
	}

	private function setFAQs(){
		require_once(get_stylesheet_directory() . '/classes/FAQs.php');
		$Faqs = new \FAQs\FAQs();

		$Faqs->setFAQsByCatName('not-ready');
		$this->faqs = $Faqs->faqs;
	}
}
