<?php

use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('sign.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/pakan', function () {
    return view('pakan.index');
});

Route::get('/fpakan', function () {
    return view('pakan.form');
});

Route::get('/kandang', function () {
    return view('kandang.index');
});

Route::get('/fkandang', function () {
    return view('kandang.form');
});
// Route::get('/', [SignController::class, 'index'])->name('login');
// Route::get('/logout', [SignController::class, 'logout'])->name('logout');
// Route::post('/auth', [SignController::class, 'auth'])->name('auth');