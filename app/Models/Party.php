<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function caleg(){
        return $this->hasMany(Caleg::class);
    }

    public function getRouteKeyName(){
        return 'uri';
    }
}
