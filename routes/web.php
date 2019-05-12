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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/objects','HomeController@objects')->name('objects');

Route::get('/createimage','ImageController@create');
Route::post('/createimage','ImageController@imageUpload');

Route::get('/createobject','VrObjectController@create');
Route::post('/createobject','VrObjectController@objectUpload');
Route::get('/createSFB','VrObjectController@createSfb');
Route::post('/createSFB','VrObjectController@sfbUpload');
Route::get('/lookObj','VrObjectController@viewCollection');
// Route::get('/addSlider/{id}','VrObjectController@addSlider')->name('addSlider');
Route::get('/uploadSlider','SlidersController@create');
Route::post('/uploadSlider','SlidersController@uploadSlider');

Route::post('/addLogo','HomeController@addLogo')->name('addLogo');


