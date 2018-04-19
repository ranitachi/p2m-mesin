<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batchpelatihan extends Model
{
    use SoftDeletes;
    private $table = 'batch_pelatihan';
    private $protected = 'deleted_at';
    private $fillable = ['kode','nama_batch','pelatihan_id','start_date','end_date','lokasi','pic','flag','biaya_pelatihan','instruktur_id','desc','created_at','updated_at'];

    public function pelatihan()
    {
        return $this->belongsTo('App\Model\Masterpelatihan', 'pelatihan_id');
    }
    public function instruktur()
    {
        return $this->belongsTo('App\Model\Masterinstruktur', 'pelatihan_id');
    }
}

