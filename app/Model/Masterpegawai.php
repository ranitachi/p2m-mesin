<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpegawai extends Model
{
    use SoftDeletes;
    protected $table = 'master_pegawai';
    protected $protected = 'deleted_at';
    protected $fillable = ['kode','nama','agama','alamat','tempat_lahir','tanggal_lahir','email','gender','hp','flag','created_at','updated_at'];
}
