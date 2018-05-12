<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absensipelatihandetail extends Model
{
    use SoftDeletes;
    protected $table = 'absensi_pelatihan_detail';
    protected $protected = 'deleted_at';
    protected $fillable = ['peserta_id','absensi_id','skedul_id','status','created_at','updated_at'];

    public function absensi()
    {
        return $this->belongsTo('App\Model\Absensipelatihan', 'absensi_id');
    }
    public function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta', 'peserta_id');
    }
    public function skedul()
    {
        return $this->belongsTo('App\Model\Skedulpelatihan', 'skedul_id');
    }
}