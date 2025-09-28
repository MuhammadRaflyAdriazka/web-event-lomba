<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminDinasController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KepalaDinasController;
use App\Http\Controllers\RegistrationController; // <-- TAMBAHKAN INI
use App\Models\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN UMUM (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

// Halaman Welcome - Menampilkan event terbaru
Route::get('/', function () {
    $events = Event::where('status', 'active')->latest()->get();
    return view('welcome', compact('events'));
})->name('welcome');

// Halaman Detail Event
Route::get('/detail/{id}', function ($id) {
    $event = Event::findOrFail($id);
    return view('detail', compact('event'));
})->name('detail');


// =========================================================================
//  ROUTE PENDAFTARAN LAMA SUDAH DIGANTI DENGAN BLOK DI BAWAH INI
// =========================================================================
// Route untuk MENAMPILKAN form pendaftaran (method GET)
Route::get('/pendaftaran/{id}', [RegistrationController::class, 'show'])->name('pendaftaran');
// Route untuk MEMPROSES data pendaftaran (method POST)
Route::post('/pendaftaran/{id}', [RegistrationController::class, 'store'])->name('pendaftaran.store');
// =========================================================================


// Halaman Semua Acara
Route::get('/acara', function () {
    $events = Event::where('status', 'active')->latest()->get();
    return view('acara', compact('events'));
})->name('acara');

/*
|--------------------------------------------------------------------------
| DASHBOARD UTAMA (PERLU LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $events = Event::where('status', 'active')->latest()->get();
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ROUTES UNTUK ADMIN DINAS, PANITIA, KEPALA DINAS, PESERTA
|--------------------------------------------------------------------------
*/
// ... (SEMUA BLOK ROUTE LAINNYA DI BAWAH INI TETAP SAMA, TIDAK ADA PERUBAHAN)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDinasController::class, 'dashboard'])->name('dashboard');
    Route::get('/kelola', [AdminDinasController::class, 'index'])->name('kelola');
    Route::get('/create', [AdminDinasController::class, 'create'])->name('create');
    Route::post('/store', [AdminDinasController::class, 'store'])->name('store');
    Route::delete('/event/{id}', [AdminDinasController::class, 'destroy'])->name('event.destroy');
    Route::get('/panitia', function () { return view('admin.panitia'); })->name('panitia');
    Route::get('/laporan', function () { return view('admin.laporan'); })->name('laporan');
});

Route::prefix('panitia')->name('panitia.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/peserta', function () { return view('panitia.peserta'); })->name('peserta');
    Route::get('/absensi', function () { return view('panitia.absensi'); })->name('absensi');
    Route::get('/laporan', function () { return view('panitia.laporan'); })->name('laporan');
});

Route::prefix('kepala')->name('kepala.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KepalaDinasController::class, 'dashboard'])->name('dashboard');
    Route::get('/approve', function () { return view('kepala.approve'); })->name('approve');
    Route::get('/laporan', function () { return view('kepala.laporan'); })->name('laporan');
    Route::get('/monitoring', function () { return view('kepala.monitoring'); })->name('monitoring');
});

Route::prefix('peserta')->name('peserta.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PesertaController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-events', function () { return view('peserta.my-events'); })->name('my-events');
    Route::get('/profile', function () { return view('peserta.profile'); })->name('profile');
    Route::get('/sertifikat', function () { return view('peserta.sertifikat'); })->name('sertifikat');
});

/*
|--------------------------------------------------------------------------
| PROFILE MANAGEMENT & API ROUTES
|--------------------------------------------------------------------------
*/
// ... (SEMUA BLOK ROUTE LAINNYA DI BAWAH INI TETAP SAMA, TIDAK ADA PERUBAHAN)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('api')->name('api.')->group(function () {
    Route::get('/events', function () { return response()->json(Event::where('status', 'active')->latest()->get()); })->name('events');
    Route::get('/event/{id}', function ($id) { return response()->json(Event::findOrFail($id)); })->name('event.detail');
});

require __DIR__.'/auth.php';