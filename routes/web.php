<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminDinasController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KepalaDinasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/pendaftaran', function () {
    return view('pendaftaran');
});

// Dashboard Peserta (dashboard yang sudah ada)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes untuk setiap role
Route::get('/peserta/dashboard', [PesertaController::class, 'dashboard'])->middleware('auth');
Route::get('/admin/dashboard', [AdminDinasController::class, 'dashboard'])->middleware('auth');
Route::get('/panitia/dashboard', [PanitiaController::class, 'dashboard'])->middleware('auth');
Route::get('/kepala/dashboard', [KepalaDinasController::class, 'dashboard'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';