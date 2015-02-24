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
	public function review(Request $request){
		// Must place a search term
		// dd($request);
		// Query the DB
		$dvdId = $request->segment(2);
		$path = $request->path();

		$dvdQuery = new DvdQuery();
		$dvd = $dvdQuery->getDVD($dvdId);
		// dd($dvd);
		// Return the view and results

		if($request->all()){
			$validator = $dvdQuery->validate($request->all());

			if ($validator->passes()) {
				// DB::table('songs')->insert($input);
				$dvdQuery->create([
					'rating' => $request->input('rating'),
					'title' => $request->input('title'),
					'dvd_id' => $request->input('dvd_id'),
					'description' => $request->input('description')
				]);
				$reviews = $dvdQuery->getReviews($request->input('dvd_id'));
	
				return redirect($path)->with([
					'reviews'=>$reviews,
					'success' => 'Review successfully added.'
				]);
			}

			return redirect($path)->withErrors($validator)->withInput();
		}
		else{
			return view('review', [
				'dvds' => $dvd,
				'id' => $dvdId
			]);
		}
	}
}