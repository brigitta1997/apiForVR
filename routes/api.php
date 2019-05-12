<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/search/{word}/{company}','SearchController@search');
// Route::get('/search/company/{company}','SearchController@showByCompany');
// Route::get('/search/furni/{word}','SearchController@showByFurniture');
Route::get('/furni/{id}','VrObjectController@view');
Route::post('/search', 'SearchController@filter');

Route::get('/savedObj/{id}','SavedObjectController@showSavedObj');
Route::post('/savedObj/save', 'SavedObjectController@savedObj');
Route::get('/savedObj/delete/{user_id}/{obj_id}','SavedObjectController@delete');
Route::get('/savedObj/exist/{user_id}/{obj_id}','SavedObjectController@is_saved');

Route::post('/userCred','UserController@autheniticateUserAPI');
Route::get('/sfb/{id}','VrObjectController@getSfbLink');

Route::get('/company/logo','CompaniesController@getAllLogo');
Route::get('/company/{name}','CompaniesController@getItemFromCompany');

Route::get('/furniType/{type}','VrObjectController@getFurniByType');
Route::post('/register','UserController@registerFromPhone');

Route::get('profile/{id}','UserController@viewProfile');

Route::get('slider/{objId}','SlidersController@getImgSlider');