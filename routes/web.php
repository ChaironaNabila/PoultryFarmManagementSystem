<?php

use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Sign.in');
});

// Route::get('/', [SignController::class, 'index'])->name('login');
Route::get('/logout', [SignController::class, 'logout'])->name('logout');
Route::post('/auth', [SignController::class, 'auth'])->name('auth');