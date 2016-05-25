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
    $employee = App\Employee::find(1);
    return view('welcome', compact('employee'));
});

//PERSON
/*
Route::get('/person/create', function () {
    return view('addPerson');
});
*/
Route::get('/person/create', 'PersonController@showFormGet');
Route::post('/person/create', 'PersonController@store');
Route::get('/person/{id}', 'PersonController@show');

//ENTERPRISE
Route::get('/enterprise/create', 'EnterpriseController@create');
Route::post('/enterprise/create', 'EnterpriseController@store');
Route::get('/enterprise/{id}', 'EnterpriseController@show');
