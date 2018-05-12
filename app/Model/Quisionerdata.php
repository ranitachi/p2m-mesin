<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quisionerdata extends Model
{
    protected $table='quisionerdatas';
    protected $fillable=['peserta_id','batch_id','pelatihan_id','instruktur_id','quisioner_id','nilai','usulan','flag','created_at','updated_at'];
}
