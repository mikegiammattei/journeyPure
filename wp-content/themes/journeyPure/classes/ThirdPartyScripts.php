<?php

/**
 * FileName: ThirdPartyScripts.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/23/2019
 */

namespace Scripts;


class ThirdPartyScripts
{

	private $aboveHeadScriptArr = array();
	private $bodyNoScriptArr = array();

	private function addScriptToHeaderArr($scriptElement){
		$this->aboveHeadScriptArr[] = $scriptElement;
	}
	private function addNoScriptToBodyArr($scriptElement){
		$this->bodyNoScriptArr[] = $scriptElement;
	}
	private function setGTMHeadScript(){
		$script = "(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NKJHBM9');";
		$this->addScriptToHeaderArr($script);
	}
	private function setGTMBodyNoScript(){
		$script = '(<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKJHBM9" height="0" width="0" style="display:none;visibility:hidden"></iframe>';
		$this->addNoScriptToBodyArr($script);
	}
	public function getHeadScripts($controller){
		/** Set Google Tag Manager Script */
		$this->setGTMHeadScript();

		/** Display script from array */
		if($controller){
			$returnString = "<script>";
			foreach ($this->aboveHeadScriptArr as $script){
				$returnString .= $script ;
			}
			$returnString .=  "</script>";

			return $returnString;
		}
	}
	public function getBodyNoScripts($controller){
		/** Set Google Tag Manager Script */
		$this->setGTMBodyNoScript();

		/** Display script from array */
		if($controller){
			$returnString = '<noscript>';
			foreach ($this->bodyNoScriptArr as $script){
				$returnString .= $script ;
			}
			$returnString .=  '</noscript>';

			return $returnString;
		}
	}
}
