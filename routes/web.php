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
Route::get('/pic','PhotoController@index');


Route::post('/imageUpload','PhotoController@imageUpload');
Route::get('/imageRemove/{data}','PhotoController@imageRemove');
Route::get('/imageAllRemove','PhotoController@imageAllRemove');
Route::post('/imageDelete','PhotoController@imageDelete');
