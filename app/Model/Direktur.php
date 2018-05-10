<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Direktur extends Model
{
    use SoftDeletes;
    protected $table='direkturs';
    protected $fillable=['nip','nama','tempat_lahir','tanggal_lahir','flag','gelar_s1','gelar_s2','gelar_s3','alamat','email','hp','gender','agama','created_at','updated_at','deleted_at'];
}
