<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterperusahaan extends Model
{
    use SoftDeletes;
    private $table = 'master_perusahaan';
    private $protected = 'deleted_at';
    private $fillable = ['nama_perusahaan','pimpinan','alamat','provinsi','kabupaten_kota','kecamatan','kelurahan','kode_pos','telp','email','fax','cp','bagian_cp','jenis_usaha','desc','created_at','updated_at'];

}

