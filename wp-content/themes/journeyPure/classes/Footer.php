<?php

/**
 * FileName: Footer.php
 * Description:
 *
 * Created by: Digital Team.
 * Author: Michael Giammattei
 * Date: 10/9/2019
 */

namespace Footer;


class Footer
{
	private $post;
	private $fields = array();
	public $controls;

	public function __construct(){
		wp_reset_query();
		wp_reset_postdata();
		global $post;
		$this->post = $post;

		$this->fields = get_fields($post->ID);
		$this->controls = (object) array();

		$this->setFields();
	}
	public function setFields(){
		if(isset($this->fields['hide_not_ready_link'])){
			$this->controls->hide_not_ready_link = ($this->fields['hide_not_ready_link']) ? : null;
		}
	}

}
