<?php namespace App\Services;

class RottenTomatoes{
	public function search($dvd_title){
		if(\Cache::has("rottenTomatoe-$dvd_title")){
			$jsonStrings = \Cache::get("rottenTomatoe-$dvd_title");
		} else{
			$url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?q=".urlencode($dvd_title)."&page_limit=40&page=1&apikey=9wrrqc2dsdpmmafqwq6x2gpv";
			$jsonStrings = file_get_contents($url);
			\Cache::put("rottenTomatoe-$dvd_title", $jsonStrings, 60);
		}
		$data = json_decode($jsonStrings);

		$foundMovie = $data->movies[0];
		foreach($data->movies as $movie){
			if($movie->title == $dvd_title){
				$foundMovie = $movie;
			}
		}
		return $foundMovie;
	}
}