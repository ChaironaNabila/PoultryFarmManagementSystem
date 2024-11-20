<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KandangController;
use App\Http\Controllers\PakanController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanHarianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Middleware\RoleMiddleware;


Route::post('/check-email', [AuthController::class, 'checkEmail'])->name('checkEmail');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('api.logout');
Route::post('/registerAdmin', [AuthController::class, 'registerAdmin'])->name('api.register.admin');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('api.penyakit.index');
    Route::get('/penyakit/{id}', [PenyakitController::class, 'show'])->name('api.penyakit.show');
    Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])->name('api.penyakit.edit');
    Route::post('/penyakit', [PenyakitController::class, 'create'])->name('api.penyakit.create');
    Route::delete('/penyakit/{id}', [PenyakitController::class, 'delete'])->name('api.penyakit.delete');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/pakan', [PakanController::class, 'index'])->name('api.pakan.index');
    Route::get('/pakan/{id}', [PakanController::class, 'show'])->name('api.pakan.show');
    Route::put('/pakan/{id}', [PakanController::class, 'update'])->name('api.pakan.edit');
    Route::post('/pakan', [PakanController::class, 'create'])->name('api.pakan.create');
    Route::delete('/pakan/{id}', [PakanController::class, 'destroy'])->name('api.pakan.delete');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/kandang', [KandangController::class, 'index'])->name('api.kandang.index');
    Route::get('/kandang/{id}', [KandangController::class, 'show'])->name('api.kandang.show');
    Route::put('/kandang/{id}', [KandangController::class, 'update'])->name('api.kandang.edit');
    Route::post('/kandang', [KandangController::class, 'create'])->name('api.kandang.create');
    Route::delete('/kandang/{id}', [KandangController::class, 'delete'])->name('api.kandang.delete');
});

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/laporan-harian', [LaporanHarianController::class, 'store']);
    Route::get('/laporan-harian/create/{id_kandang}', [LaporanHarianController::class, 'create']);
    Route::post('/laporan-harian/{id_kandang}', [LaporanHarianController::class, 'store']);
    Route::get('/laporan-harian', [LaporanHarianController::class, 'index'])->name('api.laporan.index');
});

Route::middleware('auth:sanctum', 'role:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('api.dashboard');
});