<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminDinasController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KepalaDinasController;
use App\Http\Controllers\RegistrationController; // <-- TAMBAHKAN 
use App\Http\Controllers\EventController;
use App\Models\Event;
use App\Models\Registration;
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
    
    // Cek status pendaftaran user (jika sudah login)
    $hasRegistered = false;
    if (auth()->check()) {
        $hasRegistered = Registration::where('event_id', $event->id)
                                   ->where('user_id', auth()->id())
                                   ->exists();
    }
    
    // Cek status periode registrasi
    $now = now()->toDateString();
    $registrationNotStarted = $now < $event->registration_start;
    $registrationClosed = $now > $event->registration_end;
    $registrationOpen = ($now >= $event->registration_start && $now <= $event->registration_end);
    
    return view('detail', compact('event', 'hasRegistered', 'registrationOpen', 'registrationNotStarted', 'registrationClosed'));
})->name('detail');


// =========================================================================
//  ROUTE PENDAFTARAN LAMA SUDAH DIGANTI DENGAN BLOK DI BAWAH INI
// =========================================================================
// Route untuk MENAMPILKAN form pendaftaran (method GET) - HARUS LOGIN
Route::get('/pendaftaran/{id}', [RegistrationController::class, 'show'])->middleware('auth')->name('pendaftaran');
// Route untuk MEMPROSES data pendaftaran (method POST) - HARUS LOGIN
Route::post('/pendaftaran/{id}', [RegistrationController::class, 'store'])->middleware('auth')->name('pendaftaran.store');
// =========================================================================


// Halaman Semua Acara
Route::get('/acara', function () {
    // Jika user login, tampilkan riwayat pendaftaran
    if (auth()->check()) {
        $userRegistrations = Registration::with('event')
                                       ->where('user_id', auth()->id())
                                       ->latest()
                                       ->get();
        return view('acara', compact('userRegistrations'));
    } else {
        // Jika belum login, tampilkan semua event
        $events = Event::where('status', 'active')->latest()->get();
        return view('acara', compact('events'));
    }
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

    //crud
    Route::get('/kelola', [EventController::class, 'index'])->name('kelola');
    Route::get('/create', [EventController::class, 'create'])->name('create');
    Route::post('/store', [EventController::class, 'store'])->name('store');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/panitia', function () { return view('admin.panitia'); })->name('panitia');
    Route::get('/laporan', function () { return view('admin.laporan'); })->name('laporan');
    Route::get('/event', function () { return view('admin.event'); })->name('event');
});

Route::prefix('panitia')->name('panitia.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    Route::get('/peserta', function () { return view('panitia.peserta'); })->name('peserta');
    Route::get('/absensi', function () { return view('panitia.absensi'); })->name('absensi');
    Route::get('/laporan', function () { return view('panitia.laporan'); })->name('laporan');
    Route::get('/kelola ', function () { return view('panitia.kelola'); })->name('kelola');
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