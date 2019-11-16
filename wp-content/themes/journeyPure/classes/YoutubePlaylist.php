<?php

/**
 * FileName: YoutubePlaylist.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 11/12/2019
 */

namespace Video;

/** Dependencies */
require_once(get_stylesheet_directory() . '/classes/Youtube.php');

class YoutubePlaylist extends Youtube
{

	public function __construct($apiKey)
	{
		parent::__construct($apiKey);
	}

	public function setPlaylist(){

		$options = array(
			"part" => 'snippet',
			"key" =>  $this->getAPI_KEY(),
			"maxResults" => 20,
			"playlistId" => $this->getPlaylistID()
		);

		$channel_URL = $this->getApiUrl() . http_build_query($options);
		$json_details = json_decode(file_get_contents($channel_URL),true);

	}


}
