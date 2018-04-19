<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    private $table = 'kelurahan';
    private $fillable = ['kecamatan_id','name','created_at','updated_at'];
    public function kecamatan()
    {
        return $this->belongsTo('App\Model\Kecamatan', 'kecamatan_id');
    }
}
