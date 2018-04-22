<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterquesioner extends Model
{
    use SoftDeletes;
    protected $table = 'master_quesioner';
    protected $protected = 'deleted_at';
    protected $fillable = ['question','flag','kategori','created_at','updated_at'];

}

