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

Route::get('/', 'Homecontroller@index');

Auth::routes();

Route::get('admin', 'Eventcontroller@index');
Route::get('admin/event', 'EventController@index');
//Route::get('admin/event/{id}', 'EventController@show');
Route::get('admin/event/create', 'EventController@create');
Route::get('admin/event/book/{id}', 'EventController@bookevent');
Route::get('admin/event/dpevent/{id}', 'EventController@dpevent');
Route::get('admin/event/edit/{id}', 'EventController@edit');
Route::post('admin/event/update/{id}', 'EventController@update');
Route::get('admin/event/delete/{id}', 'EventController@destroy');
Route::post('admin/event/store', 'EventController@store');


Route::get('admin/gedung', 'gedungController@index');
//Route::get('admin/gedung/{id}', 'gedungController@show');
Route::get('admin/gedung/create', 'gedungController@create');
Route::get('admin/gedung/book/{id}', 'gedungController@bookgedung');
Route::get('admin/gedung/dpgedung/{id}', 'gedungController@dpgedung');
Route::get('admin/gedung/edit/{id}', 'gedungController@edit');
Route::post('admin/gedung/update/{id}', 'gedungController@update');
Route::get('admin/gedung/delete/{id}', 'gedungController@destroy');
Route::post('admin/gedung/store', 'gedungController@store');


Route::get('admin/kostum', 'KostumController@index');
//Route::get('admin/kostum/{id}', 'KostumController@show');
Route::get('admin/kostum/create', 'KostumController@create');
Route::get('admin/kostum/book/{id}', 'KostumController@bookkostum');
Route::get('admin/kostum/dpkostum/{id}', 'KostumController@dpkostum');
Route::get('admin/kostum/edit/{id}', 'KostumController@edit');
Route::post('admin/kostum/update/{id}', 'KostumController@update');
Route::get('admin/kostum/delete/{id}', 'KostumController@destroy');
Route::post('admin/kostum/store', 'KostumController@store');


Route::get('admin/paket', 'paketController@index');
//Route::get('admin/paket/{id}', 'paketController@show');
Route::get('admin/paket/create', 'paketController@create');
Route::get('admin/paket/book/{id}', 'paketController@bookpaket');
Route::get('admin/paket/dppaket/{id}', 'paketController@dppaket');
Route::get('admin/paket/edit/{id}', 'paketController@edit');
Route::post('admin/paket/update/{id}', 'paketController@update');
Route::get('admin/paket/delete/{id}', 'paketController@destroy');
Route::post('admin/paket/store', 'paketController@store');

// });

	