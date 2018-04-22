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

Route::get('/', 'HomeController@utama')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/utama', 'HomeController@utama')->name('home');

/* Karyawan */
Route::resource('karyawan', 'MasteregawaiController');
Route::get('karyawan-hapus/{id}', 'MasteregawaiController@destroy');
/* Instruktur */
Route::resource('instruktur', 'MasterinstrukturController');
Route::get('instruktur-hapus/{id}', 'MasterinstrukturController@destroy');

/* Instruktur */
Route::resource('perusahaan', 'MasterperusahaanController');
Route::get('perusahaan-hapus/{id}', 'MasterperusahaanController@destroy');

/* PESERTA */
Route::resource('peserta', 'MasterpesertaController');
Route::get('peserta-hapus/{id}', 'MasterpesertaController@destroy');
Route::get('by-perusahaan/{idperu}', 'MasterpesertaController@byperusahaan');

/* Quisioner */
Route::resource('quisioner', 'MasterquesionerController');
Route::get('quisioner-hapus/{id}', 'MasterquesionerController@destroy');

/* Kategori Pelatihan */
Route::resource('kategori-pelatihan', 'MasterkategoripelatihanController');
Route::get('kategori-pelatihan-hapus/{id}', 'MasterkategoripelatihanController@destroy');
Route::get('kategori-pelatihan-data', 'MasterkategoripelatihanController@data');

/* Pelatihan */
Route::resource('pelatihan', 'MasterpelatihanController');
Route::get('pelatihan-hapus/{id}', 'MasterpelatihanController@destroy');
Route::get('pelatihan-data/{idkat}', 'MasterpelatihanController@data');
Route::get('pelatihan-form/{idkat}/{id}', 'MasterpelatihanController@show');

/* Provinsi */
Route::resource('provinsi', 'ProvinsiController');
Route::get('provinsi-hapus/{id}', 'ProvinsiController@destroy');
Route::get('provinsi-data', 'ProvinsiController@data');

/* Batch Pelatihan/Jadwal */
Route::resource('jadwal-pelatihan', 'BatchpelatihanController');
Route::get('jadwal-pelatihan-hapus/{id}', 'BatchpelatihanController@destroy');
Route::get('jadwal-pelatihan-data', 'BatchpelatihanController@data');

Route::get('batch-detail/{id}/{jenis}', 'BatchpelatihanController@detail');


/* Kabupaten Kota */
Route::resource('kabupatenkota', 'KabupatenkotaController');
Route::get('kabupatenkota-hapus/{id}', 'KabupatenkotaController@destroy');
Route::get('kabupatenkota-data/{idprop}', 'KabupatenkotaController@data');
/* Kecamatan */
Route::resource('kecamatan', 'KecamatanController');
Route::get('kecamatan-form/{idkec}/{idprop}/{id}', 'KecamatanController@show');
Route::get('kecamatan-hapus/{id}', 'KecamatanController@destroy');
Route::get('kecamatan-data/{idkota}', 'KecamatanController@data');
/* Kelurahan */
Route::resource('kelurahan', 'KelurahanController');
Route::get('kelurahan-form/{idkel}/{idkec}/{idprop}/{id}', 'KelurahanController@show');
Route::get('kelurahan-hapus/{id}', 'KelurahanController@destroy');
Route::get('kelurahan-data/{idkec}', 'KelurahanController@data');


Route::get('by-provinsi/{idprop}', 'KabupatenkotaController@byprovinsi');
Route::get('by-kota/{idkota}', 'KecamatanController@bykota');
Route::get('by-kecamatan/{idkec}', 'KelurahanController@bykecamatan');


