<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterkategoripelatihan extends Model
{
    use SoftDeletes;
    private $table = 'master_kategori_pelatihan';
    private $protected = 'deleted_at';
    private $fillable = ['kategori','desc','flag','created_at','updated_at'];
}

