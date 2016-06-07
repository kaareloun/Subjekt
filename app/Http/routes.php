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

Route::get('/', function () {
    return view('welcome');
});

//PERSON
/*
Route::get('/person/create', function () {
    return view('addPerson');
});
*/
//PERSON
Route::get('/person/create', 'PersonController@showFormGet');
Route::post('/person/create', 'PersonController@store');
Route::get('/person/update/{id}', 'PersonController@showFormUpdateGet');
Route::post('/person/update/{id}', 'PersonController@storeUpdate');
Route::get('/person/{id}', 'PersonController@show');
Route::get('/person', 'PersonController@index');


//ADDRESS
Route::post('/address/{id}/update', 'AddressController@update');
Route::post('/address/create', 'AddressController@store');

//ENTERPRISE
Route::resource('enterprise', 'EnterpriseController');

//API
Route::group(['prefix' => 'api'], function () {
    Route::post('/person/link', 'API\ApiPersonController@link');
    Route::get('/person', 'API\ApiPersonController@show');
    Route::get('/search/attributes', 'SearchController@attributes');
    Route::get('/search', 'SearchController@search');
});
