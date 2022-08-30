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
Route::post('/masuk', [Authorization::class, 'register']);
Route::get('/dashboard', [Authorization::class, 'dashboard']);

