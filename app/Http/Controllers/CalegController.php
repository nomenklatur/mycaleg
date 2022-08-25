<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapil;

class CalegController extends Controller
{
    public function dapil_show(Dapil $dapil){
        return view('dapil',[
            'title' => 'Dapil',
            'caleg' => $dapil->caleg->load('party', 'dapil'),
        ]);
    }
}
