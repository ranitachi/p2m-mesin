<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batchpelatihan extends Model
{
    use SoftDeletes;
    protected $table = 'batch_pelatihan';
    protected $protected = 'deleted_at';
    protected $fillable = ['kode','nama_batch','pelatihan_id','angkatan','start_date','end_date','lokasi','pic','flag','biaya_pelatihan','desc','created_at','updated_at'];

    public function pelatihan()
    {
        return $this->belongsTo('App\Model\Masterpelatihan', 'pelatihan_id');
    }

}

