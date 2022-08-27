<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;

//Homepage route
Route::get('/', [Homepage::class, 'index']);
Route::get('/dapil/{dapil:id}', [Homepage::class, 'show_dapil']);
Route::get('/caleg', [Homepage::class, 'show_caleg']);

Route::get('/masuk', function(){
    return view('login_form', [
        'title' => 'Masuk'
    ]);
});

