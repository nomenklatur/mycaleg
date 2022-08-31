<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Authorization;

//Homepage route
Route::get('/', [Homepage::class, 'index']);
Route::get('/dapil/{dapil:id}', [Homepage::class, 'show_dapil']);
Route::get('/caleg', [Homepage::class, 'show_caleg']);

// Authorization route
Route::get('/masuk', [Authorization::class, 'index']);
Route::post('/register', [Authorization::class, 'register']);
Route::post('/login', [Authorization::class, 'authenticate']);

// User exclusive route
Route::get('/dashboard', function(){
  return view('dashboard', [
    'title' => 'Dashboard',
  ]);
});

