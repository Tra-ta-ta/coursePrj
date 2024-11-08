<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Bronirovanie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [Login::class, 'index']);
Route::post('/login', [Login::class, 'login'])->name('login');

Route::get('/bron', [Bronirovanie::class, 'index'])->name('bron');
Route::post('/bron', [Bronirovanie::class, 'createBron'])->name('createBron');
