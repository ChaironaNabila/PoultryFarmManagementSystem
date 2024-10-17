<?php

use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SignController::class, 'index'])->name('login');
Route::get('/logout', [SignController::class, 'logout'])->name('logout');
Route::post('/auth', [SignController::class, 'auth'])->name('auth');