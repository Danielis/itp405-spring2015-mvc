<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Models\Dvd;
use App\Models\Genre;
use App\Models\Rating;
use App\Models\Label;
use App\Models\Format;
use App\Models\Sound;
use Illuminate\Http\Request;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('/dvds',function(Request $request){
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
});

Route::get('/dvds/search', function(){
	$genres = Genre::all();
	return view('search',[
		'genres'=>$genres
	]);
});

Route::get('/genres/{genre_name}/dvds', function($genre_name){
	$genres = Genre::All();

	$genre = Genre::where('genre_name','=', $genre_name)->first();

	$dvds = Dvd::with('genre','label','rating')
		->whereHas('genre',function($query) use($genre_name){
			$query->where('genre_name','=', $genre_name);
		})
		->get();
	// return $dvds;
	// $dvds = Dvd::with('genre','rating','label')->get();
	
	return view('search',[
		'dvds'=>$dvds,
		'genres'=>$genres
	]);
});

Route::get('/dvds/create', function(){
	// dd(Dvd::all());
	// dd(Genre::find(3)); // Select * from genres where id = 3
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
});