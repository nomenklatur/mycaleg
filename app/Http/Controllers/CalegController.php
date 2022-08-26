<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;

class CalegController extends Controller
{
    public function caleg_show(Dapil $dapil){
        return view('dapil', [
            'title' => 'Dapil',
            'party' => Party::all(),
            'dapil' => $dapil->caleg->load('party','dapil'),
        ]);
    }
}
