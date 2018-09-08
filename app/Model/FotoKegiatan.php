<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoKegiatan extends Model
{
    use SoftDeletes;
    protected $table='foto_kegiatan';
    protected $fillable=['file_path','title','batch_id','created_at','updated_at','deleted_at'];
}
