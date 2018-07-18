<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NomorSertifikat extends Model
{
    protected $table='nomor_sertifikat';
    protected $fillable=['batch_id','nomor_sertitikat','direktur_id','peserta_id','created_at','updated_at','deleted_at'];

    function batch()
    {
        return $this->belongsTo('App\Model\Batchpelatihan','batch_id');
    }
    function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta','peserta_id');
    }
    function direktur()
    {
        return $this->belongsTo('App\Model\Direktur','direktur_id');
    }
}
