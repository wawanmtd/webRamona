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

Route::group(['namespace' => 'adminController'], function()
{
  Route::get('/', 'LoginController@index');
  Route::get('/dashboard', 'AdminController@dashboard');
  Route::get('/kelolaAdmin', 'AdminController@kelolaAdmin');
  Route::get('/kelolaArea', 'AdminController@kelolaArea');
  Route::get('/kelolaStation', 'AdminController@kelolaStation');
  Route::get('/kelolaSensor', 'AdminController@kelolaSensor');
  Route::get('/kelolaBerita', 'AdminController@kelolaBerita');
});

//artisan = CLI atau aplikasi buat laravel
