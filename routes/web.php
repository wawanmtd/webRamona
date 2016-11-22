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
  Route::post('/login', 'LoginController@index');
  Route::get('/dashboard', 'AdminController@index');

  Route::get('/kelolaAdmin', 'KelolaAdminController@index');
  Route::post('/kelolaAdmin/tambahAdmin', 'KelolaAdminController@tambah');
  Route::get('/kelolaAdmin/ubahAdmin', 'KelolaAdminController@ubah');
  Route::Post('/kelolaAdmin/hapusAdmin', 'KelolaAdminController@hapus');

  Route::get('/kelolaArea', 'KelolaAreaController@index');
  Route::post('/kelolaArea/tambahArea', 'KelolaAreaController@tambah');
  Route::get('/kelolaArea/ubahArea', 'KelolaAreaController@ubah');
  Route::get('/kelolaArea/hapus', 'KelolaAreaController@hapus');

  Route::get('/kelolaStation', 'KelolaStationController@index');
  Route::post('/kelolaStation/tambahStation', 'KelolaStationController@tambah');
  Route::get('/kelolaStation/ubahStation', 'KelolaStationController@ubah');
  Route::get('/kelolaStation/hapusStation', 'KelolaStationController@hapus');

  Route::get('/kelolaSensor', 'KelolaSensorController@index');
  Route::get('/kelolaSensor/tambahSensor', 'KelolaSensorController@tambah');
  Route::get('/kelolaSensor/ubahSensor', 'KelolaSensorController@ubah');
  Route::get('/kelolaSensor/hapusSensor', 'KelolaSensorController@hapus');

  Route::get('/kelolaDevice', 'KelolaDeviceController@index');
  Route::get('/kelolaDevice/tambahDevice', 'KelolaDeviceController@tambah');
  Route::get('/kelolaDevice/ubahDevice', 'KelolaDeviceController@ubah');
  Route::get('/kelolaDevice/hapusDevice', 'KelolaDeviceController@hapus');

  Route::get('/kelolaBerita', 'KelolaBeritaController@index');
  Route::get('/kelolaBerita/tambahBerita', 'KelolaBeritaController@tambah');
  Route::get('/kelolaBerita/ubahBerita', 'KelolaBeritaController@ubah');
  Route::get('/kelolaBerita/hapusBerita', 'KelolaBeritaController@hapus');
  Route::get('/kelolaBerita/approveBerita', 'KelolaBeritaController@approve');

  Route::get('/maintenance', 'MaintenanceController@index');

  Route::get('/backupView', 'BackupRestoreController@backupView');
  Route::get('/backupData', 'BackupRestoreController@backupData');
  Route::get('/restoreView', 'BackupRestoreController@restoreView');
  Route::get('/restoreData', 'BackupRestoreController@restoreData');

  Route::get('/logout', 'LoginController@logout');
});

// Route::group(['namespace'=>'areaController'], function(){
//    Route::get('/kelolaArea', 'AreaController@index');
// });

//artisan = CLI atau aplikasi buat laravel
