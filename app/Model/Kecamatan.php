<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = ['kabupatenkota_id','name','created_at','updated_at'];
    
    public function kabupatenkota()
    {
        return $this->belongsTo('App\Model\Kabupatenkota', 'kabupatenkota_id');
    }
}
