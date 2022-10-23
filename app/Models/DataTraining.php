<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTraining extends Model
{
    use HasFactory;
    protected $table = 'data_training';
    protected $guarded = ['nama'];
    protected $with = ['dapil', 'party'];

    public function dapil(){
        return $this->belongsTo(Dapil::class, 'iddapil');
    }

    public function party(){
        return $this->belongsTo(Party::class, 'partai');
    }
}
