<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatchIntruktur extends Model
{
    use SoftDeletes;
    protected $table = 'batch_intruktur';
    protected $protected = 'deleted_at';
    protected $fillable = ['batch_pelatihan_id','instruktur_id','flag','desc','created_at','updated_at'];

    public function batch_pelatihan()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_pelatihan_id');
    }
    public function instruktur()
    {
        return $this->belongsTo('App\Model\Masterinstruktur', 'instruktur_id');
    }
}
