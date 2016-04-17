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

/* These are the Reading-list routes */
    /**
     * Show Book Dashboard
     */
    Route::get('/tasks', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Book
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
     * Delete Book
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/tasks');
    });

/* END OF READING LIST */


 

/* PAGES CONTROLLER*/
Route::get('/', [
    'as' => '/',
    'uses' => 'PagesController@getIndex'
]);



Route::get('about', [   /* route for about page*/
    'as' => 'about',
    'uses' => 'PagesController@getAbout'
]);

Route::get('contact', [ /* route for contact page*/
    'as' => 'contact',
    'uses' => 'PagesController@getContact'
]);
Route::get('home', [   /* route for home page*/
    'as' => 'home',
    'uses' => 'PagesController@getHome'
]);

Route::get('/home', 'PagesController@home');
/* END OF PAGES CONTROLLER*/





Route::resource('product', 'ProductController');
Route::resource('produkt', 'ProduktController');



Route::get('create', [     /* route for create*/
    'as' => 'create',
    'uses' => 'ProductController@getProducts'
]);



Route::get('create', ['middleware' => 'auth', function(){
	
		echo 'Welcome ' . Auth::user()->email . '.';
	
}]);


