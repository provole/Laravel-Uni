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
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');







Route::get('/', [
    'as' => '/',
    'uses' => 'PagesController@getIndex'
]);



Route::get('about', [
    'as' => 'about',
    'uses' => 'PagesController@getAbout'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'PagesController@getContact'
]);

Route::resource('product', 'ProductController');



Route::get('/home', 'PagesController@home');



Route::get('home', [
    'as' => 'home',
    'uses' => 'PagesController@getHome'
]);
// Route::get('home', ['middleware' => 'auth', function(){

	//echo 'Welcome home ' . Auth::user()->email . '.';
	
//}]);


Route::resource('produkt', 'ProduktController');



Route::get('create', [
    'as' => 'create',
    'uses' => 'ProductController@getProducts'
]);



Route::get('create', function(){
	if(Auth::guest()){
		return Redirect::to('auth/login');
	} else{
		echo 'Welcome ' . Auth::user()->email . '.';
	}
});
	

