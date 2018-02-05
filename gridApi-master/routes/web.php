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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/test', 'AuthController@test');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Authentication*/
Route::resource('/profile', 'ProfileController');
Route::post('/loginUser', 'AuthController@loginuser');
/*end of Authentication*/

/*interest*/
Route::get('/interest/', 'InterestController@index');
Route::post('/interest', 'InterestController@store');
Route::post('/interest/{id}', 'InterestController@update');
Route::delete('/interest/{id}', 'InterestController@destroy');
/*end of interest*/

/*languages*/
Route::get('/languages/', 'LanguagesController@index');
Route::post('/languages', 'LanguagesController@store');
Route::post('/languages/{id}', 'LanguagesController@update');
Route::delete('/languages/{id}', 'LanguagesController@destroy');
/*end of languages*/

/*location*/
Route::get('/location', 'LocationController@index');
Route::post('/location', 'LocationController@store');
Route::post('/location/{id}', 'LocationController@update');
Route::delete('/location/{id}', 'LocationController@destroy');
/*end of location*/

/*events*/
Route::get('/event', 'EventController@index');
Route::post('/event', 'EventController@store');
Route::post('/event/{id}', 'EventController@update');
Route::delete('/event/{id}', 'EventController@destroy');
/*end of event*/

/*post*/
Route::post('/post', 'PostController@store');
Route::get('/post', 'PostController@index');
Route::post('/post/{id}', 'PostController@update');
Route::delete('/post/{id}', 'PostController@destroy');
/*end of posts*/

/*like*/
Route::get('/like', 'LikeController@index');
Route::post('/like', 'LikeController@store');
Route::post('/like/{id}', 'LikeController@update');
Route::delete('/like/{id}', 'LikeController@destroy');
/*end of like*/

/*comments*/
Route::get('/comment', 'CommentController@index');
Route::post('/comment', 'CommentController@store');
Route::post('/comment/{id}', 'CommentController@update');
Route::delete('/comment/{id}', 'CommentController@destroy');
/*end of comments*/

/*share*/
Route::get('/share', 'ShareController@index');
Route::post('/share', 'ShareController@store');
Route::post('/share/{id}', 'ShareController@update');
Route::delete('/share/{id}', 'ShareController@destroy');
/*end of share*/

/*message*/
Route::get('/message', 'MessageController@index');
Route::post('/message', 'MessageController@store');
Route::post('/message/{id}', 'MessageController@update');
Route::delete('/message/{id}', 'MessageController@destroy');
/*end of message*/