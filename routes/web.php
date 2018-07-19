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

// Route::get('/', 'HomeController@utama')->name('home');
Route::get('/',function(){
    return view('auth.login');
});
Auth::routes();
Route::post('/logout','Usercontroller@performLogout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/utama', 'HomeController@utama')->name('home');

/* Karyawan */
Route::resource('karyawan', 'MasteregawaiController');
Route::get('karyawan-hapus/{id}', 'MasteregawaiController@destroy');

/* Direktur */
Route::resource('user', 'Usercontroller');
Route::get('user-hapus/{id}', 'Usercontroller@destroy');
Route::get('reset-password/{id}', 'Usercontroller@resetpassword');
Route::get('edit-profil/{id}', 'Usercontroller@editprofil');
/* Direktur */
Route::resource('direktur', 'DirekturController');
Route::get('direktur-hapus/{id}', 'DirekturController@destroy');

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
Route::get('foto/{id}', 'MasterpesertaController@foto');
Route::post('foto-simpan', 'MasterpesertaController@fotosimpan');

/* Quisioner */
Route::resource('quisioner', 'MasterquesionerController');
Route::get('quisioner-hapus/{id}', 'MasterquesionerController@destroy');

/* Kategori Pelatihan */
Route::resource('kategori-pelatihan', 'MasterkategoripelatihanController');
Route::get('kategori-pelatihan-hapus/{id}', 'MasterkategoripelatihanController@destroy');
Route::get('kategori-pelatihan-data', 'MasterkategoripelatihanController@data');
Route::get('pelatihan-detail/{id}', 'MasterkategoripelatihanController@detail');

/* Pelatihan */
Route::resource('pelatihan', 'MasterpelatihanController');
Route::get('pelatihan-hapus/{id}', 'MasterpelatihanController@destroy');
Route::get('pelatihan-data/{idkat}', 'MasterpelatihanController@data');
Route::get('pelatihan-form/{idkat}/{id}', 'MasterpelatihanController@show');

/* Pelatihan */
Route::resource('materi', 'MateriController');
Route::get('materi-hapus/{id}', 'MateriController@destroy');
Route::get('materi-data/{idpel}', 'MateriController@data');
Route::get('materi-form/{idpel}/{id}', 'MateriController@show');
Route::get('materi-detail/{idpel}', 'MateriController@detail');
/* Provinsi */
Route::resource('provinsi', 'ProvinsiController');
Route::get('provinsi-hapus/{id}', 'ProvinsiController@destroy');
Route::get('provinsi-data', 'ProvinsiController@data');

/* Batch Pelatihan/Jadwal */
Route::resource('jadwal-pelatihan', 'BatchpelatihanController');
Route::get('jadwal-pelatihan-hapus/{id}', 'BatchpelatihanController@destroy');
Route::get('jadwal-pelatihan-data', 'BatchpelatihanController@data');

Route::get('batch-detail/{id}/{jenis}', 'BatchpelatihanController@detail');
Route::post('peserta-add/{idbatch}', 'BatchpelatihanController@peserta_add');
Route::get('peserta-hapus/{id}/{idbatch}', 'BatchpelatihanController@peserta_hapus');

Route::post('jadwal-add-batch/{idbatch}/{id}', 'BatchpelatihanController@jadwal_add_batch');
Route::post('jadwal-add/{idbatch}/{id}', 'BatchpelatihanController@jadwal_add');
Route::get('jadwal-hapus/{id}/{idbatch}', 'BatchpelatihanController@jadwal_hapus');

Route::post('absensi-add/{idbatch}/{id}', 'BatchpelatihanController@absensi_add');
Route::get('absensi-detail/{idabsensi}','BatchpelatihanController@absensi_detail');
Route::get('absensi-hapus/{id}/{idbatch}', 'BatchpelatihanController@absensi_hapus');

Route::get('getmateri/{id}','MateriController@getmateri');

/* Bekas Batch Pelatihan */
Route::get('absensi-instruktur/{id}','BatchpelatihanController@absensi_instrktur');
Route::get('buku-peserta/{id}','BatchpelatihanController@buku_peserta');
Route::get('absensi-peserta/{id}','BatchpelatihanController@absensi_peserta');
Route::get('name-tag/{id}','BatchpelatihanController@name_tag');
Route::get('nama-meja/{id}','BatchpelatihanController@nama_meja');
Route::get('cetak-sertifikat/{id}/{idbatch}','BatchpelatihanController@cetak_sertifikat');
Route::get('cetak-sertifikat-materi/{id}/{idbatch}','BatchpelatihanController@cetak_sertifikat_materi');
Route::get('cetak-ucapan/{id}/{idbatch}','BatchpelatihanController@cetak_ucapan');
Route::get('cetak-jadwal/{idbatch}','BatchpelatihanController@cetak_jadwal');
Route::get('form-quisioner/{id}','BatchpelatihanController@form_quisioner');
Route::post('simpan-quisioner/{iduser}/{idbatch}/{date}/{instruktur_id}','BatchpelatihanController@simpan_quisioner');
Route::get('hasil-quisioner/{instruktur_id}/{idbatch}','BatchpelatihanController@hasil_quisioner');
Route::post('simpan-nilai/{iduser}/{idbatch}','BatchpelatihanController@simpan_nilai_test');
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

Route::post('simpan-nomor-sertifikat','BatchpelatihanController@simpan_nomor_sertifikat');