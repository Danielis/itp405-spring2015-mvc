<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DvdQuery;

class DvdsController extends Controller{

	public function search(){
		// Query for choices
		$genres = (new DvdQuery())->getGenres();
		$ratings = (new DvdQuery())->getRatings();
		
		// Show view
		return view('search',[
			'genres' => $genres,
			'ratings' => $ratings
		]);
	}

	public function results(Request $request){
		// Must place a search term
		
		// Query the DB
		$dvds = (new DvdQuery())->search($request->input('dvd_title'),$request->input('Selgenre'),$request->input('Selrating'));
		// dd($dvds);
		// Return the view and results
		return view('results', [
			'dvd_title' => $request->input('dvd_title'),
			'dvds' => $dvds
		]);
	}
}