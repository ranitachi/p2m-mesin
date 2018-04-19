<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masterquesioner extends Model
{
    use SoftDeletes;
    private $table = 'master_quisioner';
    private $protected = 'deleted_at';
    private $fillable = ['question','flag','created_at','updated_at'];

}

