<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterpesertadata extends Model
{
    use SoftDeletes;
    protected $table = 'master_peserta_data';
    protected $protected = 'deleted_at';
    protected $fillable = ['peserta_id','pendidikan_terakhir','gelar_pendidikan','created_at','updated_at'];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta', 'peserta_id');
    }
}

