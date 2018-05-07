<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterinstruktur extends Model
{
    use SoftDeletes;
    protected $table = 'master_instruktur';
    protected $protected = 'deleted_at';
    protected $fillable = ['nama','nip','agama','gelar_s1','gelar_s2','gelar_s3','gelar_lain','afiliasi','bidang_keahlian','alamat','tempat_lahir','tanggal_lahir','email','gender','hp','created_at','updated_at'];
}

