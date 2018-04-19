<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpesertadata extends Model
{
    use SoftDeletes;
    private $table = 'master_peserta_data';
    private $protected = 'deleted_at';
    private $fillable = ['peserta_id','pendidikan_terakhir','gelar_pendidikan','created_at','updated_at'];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta', 'peserta_id');
    }
}

