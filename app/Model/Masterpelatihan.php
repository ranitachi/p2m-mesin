<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpelatihan extends Model
{
    use SoftDeletes;
    protected $table = 'master_pelatihan';
    protected $protected = 'deleted_at';
    protected $fillable = ['kode','nama','judul_inggris','kategori_id','flag','biaya_pelatihan','desc','created_at','updated_at'];

    public function kategori()
    {
        return $this->belongsTo('App\Model\Masterkategoripelatihan', 'kategori_id');
    }
}

