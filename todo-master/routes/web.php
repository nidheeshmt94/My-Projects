<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('task', 'TaskController');

Route::group(['middleware' => ['auth']], function() {
	//Route::get('/task/', 'TaskController@index');
    Route::get('/task/create', 'TaskController@create');
	Route::post('post', 'TaskController@store');
	Route::post('post', 'TaskController@update');
	Route::get('/task/{id}', 'TaskController@show');
});

	Route::view('/task/', 'app');
*/
Route::get('/', [
    'uses' => 'TaskController@index',
    'middleware' => 'auth'
]);

Route::get('/home', [
    'uses' => 'TaskController@index',
    'middleware' => 'auth'
]);


Auth::routes();

Route::resource('task', 'TaskController');

Route::group(['middleware' => ['auth']], function() {
	//Route::get('/task/', 'TaskController@index');
    Route::get('/task/create', 'TaskController@create');
	Route::post('post', 'TaskController@store');
	Route::post('post', 'TaskController@update');
	Route::get('/task/{id}', 'TaskController@show');
});
Route::view('/showdet/{id}', 'app');
//Route::get('/user', 'UserController@index');
