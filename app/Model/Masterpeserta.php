<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpeserta extends Model
{
    use SoftDeletes;
    protected $table = 'master_peserta';
    protected $protected = 'deleted_at';
    protected $fillable = ['nama_lengkap','nama_sertifikat','agama','alamat','provinsi','kabupaten_kota','kecamatan','kelurahan','kode_pos','telp','hp','jabatan','email','foto','flag','perusahaan_id','created_at','updated_at'];

    public function perusahaan()
    {
        return $this->belongsTo('App\Model\Masterperusahaan', 'perusahaan_id');
    }
}

