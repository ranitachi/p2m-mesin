<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BatchParticipant extends Model
{
    use SoftDeletes;

    protected $table = 'batch_participant'; 
    protected $fillable =  ['id','batch_id','participant_id','active','deleted_at','created_at','updated_at'];

    public function pelatihan()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_id');
    }
    public function peserta()
    {
        return $this->belongsTo('App\Model\Masterpeserta', 'participant_id');
    }
}
