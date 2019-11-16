<?php

/**
 * FileName: YoutubeVideos.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/12/2019
 */

namespace Video;


class Youtube
{

	private $API_KEY;
	private $playlistID;
	private $api_url;

	public function __construct($apiKey){
		$this->setAPI_KEY($apiKey);
	}

	public function getAPI_KEY()
	{
		return $this->API_KEY;
	}

	public function setAPI_KEY($API_KEY)
	{
		$this->API_KEY = $API_KEY;
		return $this;
	}

	public function getPlaylistID()
	{
		return $this->playlistID;
	}

	public function setPlaylistID($playlistID)
	{
		$this->playlistID = $playlistID;
		return $this;
	}

	public function getApiUrl()
	{
		return $this->api_url;
	}

	public function setApiUrl($api_url)
	{
		$this->api_url = $api_url;
		return $this;
	}

}
