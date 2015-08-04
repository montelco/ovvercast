<?php

	class Tag{
		const API_KEY = '59bc6236659817cf29fd8083418d5299';
		const API_URL = 'http://ws.audioscrobbler.com/2.0/?';
		const LAST_RADIO = 'http://www.last.fm/listen/globaltags/';
		const GTALB = 'tag.getTopAlbums';

		//Dormant method. Can be activated to recommend a single album to listen to.
		public static function getTopAlbums($tag, $format, $limit){
			$json = self::API_URL . 'method=' . self::GTALB . '&tag=' . $tag . '&api_key=' . self::API_KEY . '&limit=' . $limit . '&format=' . $format;
			$json = @file_get_contents($json);			
			if(!$json) {
				return;
			}
			$json = json_decode($json, true);
			$json = $json['topalbums']['album'];
			foreach ($json as $album) {
				
			}
			return $json;
		}
		//Used in this instance.
		public static function startRadio($tag){
			$radio = self::LAST_RADIO . $tag;
			return $radio;
		}
	}