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
// });asd
Route::group(['namespace' => 'userController'], function()
{
  Route::get('/', 'HomeController@index');
  // Route::get('/stationStatus/index', 'HomeController@stationStatusIndex');
  // Route::get('/stationStatus/{nameStation}', 'HomeController@stationStatus');
  Route::get('/berita', 'BeritaController@index');
  Route::get('/berita/{Headline}', 'BeritaController@berita');
  Route::get('/about', 'AboutController@index');

  Route::get('stationlastvalue/{id}','StationLastValueController@index' );
  Route::get('/test', 'HomeController@test');
  Route::get('/test2', 'HomeController@test2');
});

Route::group(['namespace' => 'adminController'], function()
{
  Route::post('/login', 'LoginController@index');
  Route::get('/dashboard', 'AdminController@index');

  Route::get('/kelolaAdmin', 'KelolaAdminController@index');
  Route::post('/kelolaAdmin/tambahAdmin', 'KelolaAdminController@tambah');
  Route::get('/kelolaAdmin/ubahAdmin', 'KelolaAdminController@ubah');
  Route::Post('/kelolaAdmin/hapusAdmin', 'KelolaAdminController@hapus');
  Route::get('/kelolaAdmin/editmodal/{id}', 'KelolaAdminController@editmodal_data');
  Route::put('/kelolaAdmin/ubah/{id}', 'KelolaAdminController@ubah');
  Route::get('/kelolaAdmin/hapusmodal/{id}', 'KelolaAdminController@hapusmodal_data');
  Route::get('/kelolaAdmin/hapus/{id}', 'KelolaAdminController@hapus');

  Route::get('/kelolaArea', 'KelolaAreaController@index');
  Route::post('/kelolaArea/tambahArea', 'KelolaAreaController@tambah');
  Route::get('/kelolaArea/ubahArea', 'KelolaAreaController@ubah');
  Route::get('/kelolaArea/editmodal/{id}', 'KelolaAreaController@editmodal_data');
  //kalau pakai caranya wawan
  // Route::get('/kelolaArea/areaeditmodal', 'KelolaAreaController@areaeditmodal_data');
  //Route::get('/kelolaArea/hapus', 'KelolaAreaController@hapus');
  Route::put('/kelolaArea/ubah/{id}', 'KelolaAreaController@ubah');
  Route::get('/kelolaArea/hapusmodal/{id}', 'KelolaAreaController@hapusmodal_data');
  Route::get('/kelolaArea/hapus/{id}', 'KelolaAreaController@hapus');
  Route::get('/kelolaArea/detail/{id}','KelolaAreaController@detail');

  Route::get('/kelolaStation', 'KelolaStationController@index');
  Route::post('/kelolaStation/tambahStation', 'KelolaStationController@tambah');
  // Route::get('/kelolaStation/ubahStation', 'KelolaStationController@ubah');
  // Route::get('/kelolaStation/hapusStation', 'KelolaStationController@hapus');
  Route::get('/kelolaStation/editmodal/{id}','KelolaStationController@editmodal_data');
  Route::put('/kelolaStation/ubah/{id}','KelolaStationController@ubah');
  Route::get('/kelolaStation/hapusmodal/{id}','KelolaStationController@hapusmodal_data');
  Route::get('/kelolaStation/hapus/{id}','KelolaStationController@hapus');

  Route::get('/kelolaSensor', 'KelolaSensorController@index');
  Route::post('/kelolaSensor/tambahSensor', 'KelolaSensorController@tambah');
  // Route::get('/kelolaSensor/ubahSensor', 'KelolaSensorController@ubah');
  // Route::get('/kelolaSensor/hapusSensor', 'KelolaSensorController@hapus');
  Route::get('/kelolaSensor/editmodal/{id}','KelolaSensorController@editmodal_data');
  Route::put('/kelolaSensor/ubah/{id}','KelolaSensorController@ubah');
  Route::get('/kelolaSensor/hapusmodal/{id}','KelolaSensorController@hapusmodal_data');
  Route::get('/kelolaSensor/hapus/{id}','KelolaSensorController@hapus');

  Route::get('/kelolaDevice', 'KelolaDeviceController@index');
  Route::post('/kelolaDevice/tambahDevice', 'KelolaDeviceController@tambah');
  // Route::get('/kelolaDevice/ubahDevice', 'KelolaDeviceController@ubah');
  // Route::get('/kelolaDevice/hapusDevice', 'KelolaDeviceController@hapus');
  Route::get('/kelolaDevice/editmodal/{id}', 'KelolaDeviceController@editmodal_data');
  Route::put('/kelolaDevice/ubah/{id}', 'KelolaDeviceController@ubah');
  Route::get('/kelolaDevice/hapusmodal/{id}','KelolaDeviceController@hapusmodal_data');
  Route::get('/kelolaDevice/hapus/{id}','KelolaDeviceController@hapus');

  Route::get('/kelolaDeviceList', 'KelolaDeviceListController@index');
  Route::post('/kelolaDeviceList/tambahDeviceList', 'KelolaDeviceListController@tambah');
  // Route::get('/kelolaDevice/ubahDevice', 'KelolaDeviceController@ubah');
  // Route::get('/kelolaDevice/hapusDevice', 'KelolaDeviceController@hapus');
  Route::get('/kelolaDeviceList/editmodal/{id}', 'KelolaDeviceListController@editmodal_data');
  Route::put('/kelolaDeviceList/ubah/{id}', 'KelolaDeviceListController@ubah');
  Route::get('/kelolaDeviceList/hapusmodal/{id}','KelolaDeviceListController@hapusmodal_data');
  Route::get('/kelolaDeviceList/hapus/{id}','KelolaDeviceListController@hapus');

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

	Route::get('/tambah','TambahData@Tambah');


//artisan = CLI atau aplikasi buat laravel
