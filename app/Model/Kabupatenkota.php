<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kabupatenkota extends Model
{
    private $table = 'kabupatenkota';
    private $fillable = ['provinsi_id','name','created_at','updated_at'];
    
    public function provinsi()
    {
        return $this->belongsTo('App\Model\Provinsi', 'provinsi_id');
    }
}

