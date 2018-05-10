<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterperusahaan extends Model
{
    use SoftDeletes;
    protected $table = 'master_perusahaan';
    protected $protected = 'deleted_at';
    protected $fillable = ['nama_perusahaan','kode','pimpinan','alamat','alamat2','provinsi','kabupaten_kota','kecamatan','kelurahan','kode_pos','telp','email','fax','cp','no_cp','email_cp','bagian_cp','jenis_usaha','desc','created_at','updated_at'];
    
    public function provinsi()
    {
        return $this->belongsTo('App\Model\Provinsi', 'provinsi');
    }
    public function kabupatenkota()
    {
        return $this->belongsTo('App\Model\Kabupatenkota', 'kabupaten_kota');
    }
    public function kecamatan()
    {
        return $this->belongsTo('App\Model\Kecamatan', 'kecamatan');
    }
    public function kelurahan()
    {
        return $this->belongsTo('App\Model\Kelurahan', 'kelurahan');
    }
}

