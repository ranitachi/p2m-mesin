<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skedulpelatihandetail extends Model
{
    use SoftDeletes;
    protected $table = 'skedul_pelatihan_detail';
    protected $protected = 'deleted_at';
    protected $fillable = ['batch_id','skedul_id','materi_id','materi','staf_id','instruktur_id','start_time','end_time','created_at','updated_at'];

    public function batch()
    {
        return $this->belongsTo('App\Model\Batchpelatihan', 'batch_id');
    }
    public function skedul()
    {
        return $this->belongsTo('App\Model\Skedulpelatihan', 'skedul_id');
    }
    public function materi()
    {
        return $this->belongsTo('App\Model\Materi', 'materi_id');
    }
    public function mmateri()
    {
        return $this->belongsTo('App\Model\Materi', 'materi_id');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\Model\Masterpegawai', 'staf_id');
    }
    public function instruktur()
    {
        return $this->belongsTo('App\Model\Masterinstruktur', 'instruktur_id');
    }
}