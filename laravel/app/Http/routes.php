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

use App\Http\Controllers;

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/dvds','DvdControllerwEloquent@create');
Route::get('/dvds/search','DvdControllerwEloquent@searchGenres');
Route::get('/genres/{genre_name}/dvds','DvdControllerwEloquent@dvdsPerGenre');
Route::get('/dvds/create','DvdControllerwEloquent@createPage');

Route::get('rottentomatoes','RottenTomatoesController@index');
Route::get('rottentomatoes/{search}/details','RottenTomatoesController@search');
