<?php namespace App\Models;

use DB;

Class DvdQuery{
	// Get all Genres in genres table
	public function getGenres(){
		return DB::table('genres')->get();
	}
	// Get all Ratings in ratings table
	public function getRatings(){
		return DB::table('ratings')->get();
	}

	public function search($term,$genre,$rating){
		$query =  DB::table('dvds')
			// ->select('title','genre_name','rating_name','sound_name','format_name','label_name',DATE_FORMAT(date('release_date'),'%m/%d/%Y'))
			->join('genres','genres.id','=','dvds.genre_id')
			->join('ratings','ratings.id','=','dvds.rating_id')
			->join('labels','labels.id','=','dvds.label_id')
			->join('sounds','sounds.id','=','dvds.sound_id')
			->join('formats','formats.id','=','dvds.format_id');
		if($genre){
			$query->where('genre_id','=',$genre);
		}
		if($rating){
			$query->where('rating_id','=',$rating);	
		}
		if($term && $term != "" && $term!= "Search Here"){
			$query->where('title','LIKE','%'. $term .'%');
		}

		$query->orderBy('title','asc');

		return $query->get();
	}
}