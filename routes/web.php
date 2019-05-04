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

Route::group(['prefix' => 'guru'], function(){
	Route::get('', 'GuruController@index');
	Route::get('/daftar_siswa', 'GuruController@daftarSiswa');
	Route::get('/absensi', 'GuruController@absensiSiswa');
	Route::get('/form_laporan', 'GuruController@formLaporan');
	Route::get('/daftar_laporan', 'GuruController@daftarLaporan');
});

Route::get('/test', 'TestController@getAllOrtu');

