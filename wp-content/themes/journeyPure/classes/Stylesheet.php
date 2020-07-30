<?php

/**
 * FileName: Stylesheet.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 1/11/2020
 */

class Stylesheet
{

	private static $mainPath;

	public function __construct()
	{

	}
	/**
	 * @return string
	 */
	public static function getMainPath()
	{
		return self::$mainPath;
	}

	/**
	 * @param string $filename
	 */
	public static function setMainPath($filename)
	{
		$path = THEME_DIR . '/style.css';

		if($filename != 'style'){
			$path = THEME_DIR . '/css/' . $filename .'.min.css';
		}

		$returnValue = '<link rel="stylesheet" type="text/css" href="'.$path.'?v=20200730">';
		echo $returnValue;

	}







}
