<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilaites extends Model
{
    use SoftDeletes;
    protected $table='nilaites';
    protected $fillable = ['peserta_id','pelatihan_id','jenis_tes','batch_id','nilai','created_at','updated_at'];

    public function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta', 'peserta_id');
    }
    public function pelatihan()
    {
        return $this->belongsTo('App\Model\Masterpelatihan', 'pelatihan_id');
    }
    public function batch()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_id');
    }
}
