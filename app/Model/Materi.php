<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materi extends Model
{
    use SoftDeletes;
    protected $table = 'materi';
    protected $protected = 'deleted_at';
    protected $fillable = ['pelatihan_id','materi','materi_en','kode','flag','created_at','updated_at'];

    public function pelatihan()
    {
        return $this->belongsTo('App\Model\Masterpelatihan', 'pelatihan_id');
    }
}