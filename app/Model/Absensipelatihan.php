<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensipelatihan extends Model
{
    use SoftDeletes;
    protected $table = 'absensi_pelatihan';
    protected $protected = 'deleted_at';
    protected $fillable = ['batch_id','skedul_id','date','desc','created_at','updated_at'];

    public function batch()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_id');
    }
    public function skedul()
    {
        return $this->belongsTo('App\Model\Skedulpelatihan', 'skedul_id');
    }
}