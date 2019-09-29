<?php

/**
 * FileName: ErrorHandler.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 9/28/2019
 */

class ErrorHandler
{
	public static function  get($arr){
		$retStr = '<ul>';
		if (is_array($arr)){
			foreach ($arr as $key=>$val){
				if (is_array($val)){
					$retStr .= '<li>' . $key . ' => ' . self::get($val) . '</li>';
				}else{
					$retStr .= '<li>' . $key . ' => ' . $val . '</li>';
				}
			}
		}
		$retStr .= '</ul>';
		echo $retStr;
		return null;
	}
}
