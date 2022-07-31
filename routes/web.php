<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/masuk', function(){
    return view('login_form', [
        'title' => 'Masuk'
    ]);
});
