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

Route::resource('/profile', 'ProfileController');

Route::post('/loginUser', 'AuthController@loginuser');

Route::resource('/interest', 'InterestController');

Route::resource('/languages', 'LanguagesController');

Route::resource('/location', 'LocationController');

Route::resource('/event', 'EventController');