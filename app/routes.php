<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/','HomeController@index');

Route::group(['before'=>'auth'], function() {
	
	Route::resource('sports','SportsController');
	Route::post('epreuvesPourSport', 'EpreuvesController@epreuvesPourSport');//pour l'appel AJAX
	Route::post('epreuvesPourSportDropdown', 'EpreuvesController@epreuvesPourSportDropdown');//pour l'appel AJAX
	Route::post('participantsDropdown', 'ParticipantsController@participantsDropdown');//pour l'appel AJAX
	Route::resource('epreuves','EpreuvesController');
	Route::resource('participants','ParticipantsController');
	Route::resource('competitions','CompetitionsController');
	
	
});
//

// Confide routes

Route::get('users/create', 'UsersController@create'); // cette route devrait etre protégé, mais si je la protège, je ne peux créer le premier usager. 
	
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
