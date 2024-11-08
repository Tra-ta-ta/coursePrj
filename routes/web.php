<?php

use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [Login::class, 'index']);
Route::post('/login', [Login::class, 'login'])->name('login');
