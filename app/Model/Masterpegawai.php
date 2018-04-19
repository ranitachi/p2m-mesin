<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpegawai extends Model
{
    use SoftDeletes;
    private $table = 'master_pegawai';
    private $protected = 'deleted_at';
    private $fillable = ['kode','nama','agama','alamat','tempat_lahir','tanggal_lahir','email','gender','hp','flag','created_at','updated_at'];
}
