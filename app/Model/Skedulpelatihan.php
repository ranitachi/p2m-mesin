<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skedulpelatihan extends Model
{
    use SoftDeletes;
    protected $table = 'skedul_pelatihan';
    protected $protected = 'deleted_at';
    protected $fillable = ['batch_id','weekday','date','created_at','updated_at'];

    public function batch()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_id');
    }
}