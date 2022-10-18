<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;
use App\Models\Weight;

class DSSController extends Controller
{
    public function index(){
        return view('pilih_dapil', [
            'title' => 'Pilih Dapil',
        ]);
    }

    public function saw(){
        $caleg = Caleg::all();
        $dapil_1 = $caleg->where('dapil_id', 1);
        $dapil_2 = $caleg->where('dapil_id', 2);
        $dapil_3 = $caleg->where('dapil_id', 3);
        $max_pendidikan = $caleg->max('kekayaan');
    
    }
}
