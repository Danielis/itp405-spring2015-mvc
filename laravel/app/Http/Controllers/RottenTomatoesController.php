<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dvd;
use App\Services\RottenTomatoes;

class RottenTomatoesController extends Controller{

	public function index(){
		$dvds = Dvd::all();
		// return ($dvds);
		return view('rottentomatoes',[
			'dvds'=>$dvds
		]);
	}

	public function search($dvd_title){
		$dvds = Dvd::all();

		$foundMovie = (new RottenTomatoes)->search($dvd_title);
		
		return view('rottentomatoes',[
			'dvdTomatoes' => $foundMovie,
			'dvds'=>$dvds
		]);
	}
}