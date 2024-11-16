<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OrderOnServiceController;
use App\Http\Controllers\Auth\OrdersController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\RoomsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Bronirovanie;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->isPersonal()) {
            return redirect()->route('orderService.index');
        }
    }
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('chekUser');

Route::get('/registration', [RegistrationController::class, 'index'])->middleware('guest')->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

Route::resource('/room', RoomsController::class)->middleware('chekRole');
Route::resource('/service', ServiceController::class)->middleware('auth');
Route::resource('/order', OrdersController::class)->middleware('auth');
Route::resource('/orderService', OrderOnServiceController::class)->middleware('auth');
