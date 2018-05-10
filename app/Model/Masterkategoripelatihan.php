<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterkategoripelatihan extends Model
{
    use SoftDeletes;
    protected $table = 'master_kategori_pelatihan';
    protected $protected = 'deleted_at';
    protected $fillable = ['kode','kategori','desc','flag','created_at','updated_at'];
}

