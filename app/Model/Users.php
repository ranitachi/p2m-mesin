<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;
    protected $table='users';
    protected $fillable=['name','email','password','level','pegawai_id','flag','hakakses','direktur_id','instruktur_id','created_at','updated_at','deleted_at'];
    
    public function pegawai()
    {
        return $this->belongsTo('App\Model\Masterpegawai', 'pegawai_id');
    }
    public function instruktur()
    {
        return $this->belongsTo('App\Model\Masterinstruktur', 'instruktur_id');
    }
    public function direktur()
    {
        return $this->belongsTo('App\Model\Direktur', 'direktur_id');
    }
}
