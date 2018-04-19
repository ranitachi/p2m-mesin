<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterinstruktur extends Model
{
    use SoftDeletes;
    private $table = 'master_instruktur';
    private $protected = 'deleted_at';
    private $fillable = ['nama','nip','agama','gelar_s1','gelar_s2','gelar_s3','alamat','tempat_lahir','tanggal_lahir','email','gender','hp','created_at','updated_at'];
}

