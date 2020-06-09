<?php

namespace Handlers;

class LogoHandler
{
	public $defaultFileURL;
	private $returnImgURL;
	private $utmParam = false;
	private $defaultAltValue = "JourneyPure - Addiction Treatment Centers";

	function __construct($defaultFileURL = 'https://journeypure.com/wp-content/themes/journeyPure/assets/img/loc-logos/logo.png'){
		$this->defaultFileURL = $defaultFileURL;
		$this->process();
	}
	private function process(){
		if(isset($_GET['utm_campaign'])){
				$this->utmParam = $_GET['utm_campaign'];

				$this->umlTrackingHandler();
		}else if(get_field('location_header_logo')){

			$logoId = get_field('location_header_logo');
			$logoUrl = wp_get_attachment_image_src($logoId, 'medium');
			$this->returnImgURL = $logoUrl[0];
			$this->defaultAltValue = get_post_meta($logoId, '_wp_attachment_image_alt', TRUE);

		}else{
			$this->returnImgURL = $this->defaultFileURL;
		}
	}
	public function output(){
		return "<img class='utm-logo-img' src='".$this->returnImgURL."' alt='".$this->defaultAltValue."'>";
	}
	private function umlTrackingHandler(){
		global $wpdb;
		$table_name = $wpdb->prefix.'uml_handler';

		// Check if utm_campaign exists
		$uml_records = $wpdb->get_results( "SELECT * FROM $table_name WHERE `utm_campaign` = '{$this->utmParam}'");

		if(!empty($uml_records)){

			$this->returnImgURL =  $uml_records[0]->utm_logo_path;
			$this->defaultAltValue =  $uml_records[0]->utm_logo_alt;

		}else{
			$this->returnImgURL = $this->defaultFileURL;
		}
	}
}
