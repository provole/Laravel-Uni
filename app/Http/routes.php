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

use App\Task;
use Illuminate\Http\Request;


    /**
     * Show Task Dashboard
     */
    Route::get('/tasks', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/tasks');
    });







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



Route::get('create', ['middleware' => 'auth', function(){
	
		echo 'Welcome ' . Auth::user()->email . '.';
	
}]);


