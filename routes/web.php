<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



// //bikin baru test
// //ini hardcode tanpa controller
// Route::get('/profil', function(){
//   return view('profil');
// });
Route::group(['namespace' => 'userController'], function()
{
  Route::get('/', 'HomeController@index');
  Route::get('/stationStatus/{nameStation}', 'HomeController@stationStatus');
  Route::get('/berita', 'BeritaController@index');
  Route::get('/berita/{Headline}', 'BeritaController@berita');
  Route::get('/about', 'AboutController@index');
});


// Route::get('/', 'HomeController@index');
// Route::get('/stationStatus/{nameStation}', 'userController/HomeController@stationStatus');
// Route::get('/berita', 'userController/BeritaController@index');
// Route::get('/berita/{Headline}', 'userController/BeritaController@berita');
// Route::get('/about', 'userController/AboutController@index');

//artisan = CLI atau aplikasi buat laravel
