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

Route::get('admin', 'EventController@index');
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
Route::get('admin/gedung/getAlamat/{id}', 'gedungController@getAlamat');
Route::get('admin/gedung/create', 'gedungController@create');
Route::get('admin/gedung/edit/{id}', 'gedungController@edit');
Route::post('admin/gedung/update/{id}', 'gedungController@update');
Route::get('admin/gedung/delete/{id}', 'gedungController@destroy');
Route::post('admin/gedung/store', 'gedungController@store');


Route::get('admin/kostum', 'KostumController@index');
//Route::get('admin/kostum/{id}', 'KostumController@show');
Route::get('admin/kostum/create', 'KostumController@create');
Route::get('admin/kostum/edit/{id}', 'KostumController@edit');
Route::post('admin/kostum/update/{id}', 'KostumController@update');
Route::get('admin/kostum/delete/{id}', 'KostumController@destroy');
Route::post('admin/kostum/store', 'KostumController@store');


Route::get('admin/paket', 'paketController@index');
//Route::get('admin/paket/{id}', 'paketController@show');
Route::get('admin/paket/create', 'paketController@create');
Route::get('admin/paket/edit/{id}', 'paketController@edit');
Route::post('admin/paket/update/{id}', 'paketController@update');
Route::get('admin/paket/delete/{id}', 'paketController@destroy');
Route::post('admin/paket/store', 'paketController@store');



Route::get('admin/user', 'UserController@index');
//Route::get('admin/user/{id}', 'userController@show');
Route::get('admin/user/create', 'UserController@create');
Route::get('admin/user/edit/{id}', 'UserController@edit');
Route::post('admin/user/update/{id}', 'UserController@update');
Route::get('admin/user/delete/{id}', 'UerController@destroy');
Route::post('admin/user/store', 'UserController@store');




Route::post('event/mail/send/bookevent', 
'MailController@sendBook'
// function(){
//     return new App\Mail\bookEventMail;
// }
);

Route::get('event/mail/read/bookevent', 
'MailController@index'
);


Route::get('admin/youtube', 'YoutubeController@index');
Route::get('admin/youtube/create', 'YoutubeController@create');
Route::get('admin/youtube/edit/{id}', 'YoutubeController@edit');
Route::post('admin/youtube/update/{id}', 'YoutubeController@update');
Route::get('admin/youtube/delete/{id}', 'YoutubeController@destroy');
Route::post('admin/youtube/store', 'YoutubeController@store');



Route::get('admin/event/{id}/add/photo', 'EventController@addPhoto');
Route::post('admin/event/{id}/store/photo', 'EventController@storePhoto');

Route::get('terima/{id}', 'EventController@terima');
Route::get('tolak/{id}', 'EventController@tolak');
Route::get('dpevent/{id}', 'EventController@dp');
Route::get('complete/{id}', 'EventController@complete');
Route::get('event/book', 'EventController@create');
Route::get('gedung', 'gedungController@index');
Route::get('kostum', 'KostumController@index');
Route::get('paket', 'paketController@index');



Route::get('admin/comment/create/{id}', 'RatingController@create');
Route::post('admin/comment/store/{id}', 'RatingController@store');