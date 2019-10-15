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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
/* Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about'); */

/* Route::get('/members','Members\MembersController@show');
Route::post('/members','Members\MembersController@store');
Route::patch('/members/{member}','Members\MembersController@update');
Route::delete('/members/{member}', 'Members\MembersController@destroy'); */


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
