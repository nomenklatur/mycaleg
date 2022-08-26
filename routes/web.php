<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalegController;
use App\Models\Dapil;
use App\Models\Caleg;
use App\Models\Party;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});

Route::get('/masuk', function(){
    return view('login_form', [
        'title' => 'Masuk'
    ]);
});

Route::get('/caleg/{dapil:id}', [CalegController::class, 'caleg_show']);
