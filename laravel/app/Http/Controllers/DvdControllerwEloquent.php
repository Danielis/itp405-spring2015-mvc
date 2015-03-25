<?php namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;
use App\Models\Label;
use App\Models\Format;
use App\Models\Sound;
use Illuminate\Http\Request;

class DvdControllerwEloquent extends Controller{

	public function create(Request $request){

		$dvd = new Dvd();
		$dvd->title = $request->input('title');
		$dvd->label_id = $request->input('label');
		$dvd->genre_id = $request->input('genre');
		$dvd->sound_id = $request->input('sound');
		$dvd->rating_id = $request->input('rating');
		$dvd->format_id = $request->input('format');

		// dd($dvd);
		$dvd->save();
		return redirect('/dvds/create')->with('success', 'Succesfully Added a new DVD.');
	}

	public function searchGenres(){
		$genres = Genre::all();
		return view('search',[
			'genres'=>$genres
		]);
	}
	public function dvdsPerGenre($genre_name){
		$genres = Genre::All();

		$genre = Genre::where('genre_name','=', $genre_name)->first();

		$dvds = Dvd::with('genre','label','rating')
			->whereHas('genre',function($query) use($genre_name){
				$query->where('genre_name','=', $genre_name);
			})
			->get();
	
		return view('search',[
			'dvds'=>$dvds,
			'genres'=>$genres
		]);
	}
	public function createPage(){
		$genres = Genre::all();
		$labels = Label::all();
		$sounds = Sound::all();
		$ratings = Rating::all();
		$formats = Format::all();
		// dd($labels[0]);
		return view('dvd',[
			'genres'=> $genres,
			'labels'=> $labels,
			'sounds'=> $sounds,
			'formats'=> $formats,
			'ratings'=> $ratings
		]);
	}	
}