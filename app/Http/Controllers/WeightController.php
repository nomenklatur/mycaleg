<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    public function index(){
        return view('bobot', [
            'title' => 'Bobot',
            'bobot' => Weight::all()
        ]);

    }
}
