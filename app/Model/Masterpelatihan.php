<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpelatihan extends Model
{
    use SoftDeletes;
    private $table = 'master_pelatihan';
    private $protected = 'deleted_at';
    private $fillable = ['kode','nama','kategori_id','flag','biaya_pelatihan','desc','created_at','updated_at'];

    public function kategori()
    {
        return $this->belongsTo('App\Model\Masterkategoripelatihan', 'kategori_id');
    }
}

