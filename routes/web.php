<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminDinasController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\KepalaDinasController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HALAMAN UMUM (TIDAK PERLU LOGIN)
|--------------------------------------------------------------------------
*/

// Halaman Welcome - Menampilkan event terbaru
Route::get('/', function () {
    $events = Event::where('status', 'active')
                   ->latest()
                   ->get();
    return view('welcome', compact('events'));
})->name('welcome');

// Halaman Detail Event
Route::get('/detail/{id?}', function ($id = null) {
    if ($id) {
        $event = Event::findOrFail($id);
        return view('detail', compact('event'));
    }
    return view('detail');
})->name('detail');

// Halaman Pendaftaran Event
Route::get('/pendaftaran/{id?}', function ($id = null) {
    if ($id) {
        $event = Event::findOrFail($id);
        return view('pendaftaran', compact('event'));
    }
    return view('pendaftaran');
})->name('pendaftaran');

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

// Dashboard Peserta (dashboard yang sudah ada)
Route::get('/dashboard', function () {
    $events = Event::where('status', 'active')->latest()->get();
    return view('dashboard', compact('events'));
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| ROUTES UNTUK ADMIN DINAS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [AdminDinasController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Event
    Route::get('/kelola', [AdminDinasController::class, 'index'])->name('kelola');
    Route::get('/create', [AdminDinasController::class, 'create'])->name('create');
    Route::post('/store', [AdminDinasController::class, 'store'])->name('store');
    Route::delete('/event/{id}', [AdminDinasController::class, 'destroy'])->name('event.destroy');
    
    // Kelola Panitia (jika ada)
    Route::get('/panitia', function () {
        return view('admin.panitia');
    })->name('panitia');
    
    // Laporan (jika ada)
    Route::get('/laporan', function () {
        return view('admin.laporan');
    })->name('laporan');
});

/*
|--------------------------------------------------------------------------
| ROUTES UNTUK PANITIA
|--------------------------------------------------------------------------
*/

Route::prefix('panitia')->name('panitia.')->middleware('auth')->group(function () {
    // Dashboard Panitia
    Route::get('/dashboard', [PanitiaController::class, 'dashboard'])->name('dashboard');
    
    // Kelola Peserta Event (jika ada)
    Route::get('/peserta', function () {
        return view('panitia.peserta');
    })->name('peserta');
    
    // Kelola Absensi (jika ada)
    Route::get('/absensi', function () {
        return view('panitia.absensi');
    })->name('absensi');
    
    // Laporan Panitia (jika ada)
    Route::get('/laporan', function () {
        return view('panitia.laporan');
    })->name('laporan');
});

/*
|--------------------------------------------------------------------------
| ROUTES UNTUK KEPALA DINAS
|--------------------------------------------------------------------------
*/

Route::prefix('kepala')->name('kepala.')->middleware('auth')->group(function () {
    // Dashboard Kepala Dinas
    Route::get('/dashboard', [KepalaDinasController::class, 'dashboard'])->name('dashboard');
    
    // Approve Event (jika ada)
    Route::get('/approve', function () {
        return view('kepala.approve');
    })->name('approve');
    
    // Laporan Lengkap
    Route::get('/laporan', function () {
        return view('kepala.laporan');
    })->name('laporan');
    
    // Monitoring Event
    Route::get('/monitoring', function () {
        return view('kepala.monitoring');
    })->name('monitoring');
});

/*
|--------------------------------------------------------------------------
| ROUTES UNTUK PESERTA
|--------------------------------------------------------------------------
*/

Route::prefix('peserta')->name('peserta.')->middleware('auth')->group(function () {
    // Dashboard Peserta
    Route::get('/dashboard', [PesertaController::class, 'dashboard'])->name('dashboard');
    
    // Event yang Diikuti
    Route::get('/my-events', function () {
        return view('peserta.my-events');
    })->name('my-events');
    
    // Profil Peserta
    Route::get('/profile', function () {
        return view('peserta.profile');
    })->name('profile');
    
    // Sertifikat (jika ada)
    Route::get('/sertifikat', function () {
        return view('peserta.sertifikat');
    })->name('sertifikat');
});

/*
|--------------------------------------------------------------------------
| PROFILE MANAGEMENT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| API ROUTES (UNTUK AJAX JIKA DIPERLUKAN)
|--------------------------------------------------------------------------
*/

Route::prefix('api')->name('api.')->group(function () {
    // Get Events JSON
    Route::get('/events', function () {
        return response()->json(Event::where('status', 'active')->latest()->get());
    })->name('events');
    
    // Get Event Detail JSON
    Route::get('/event/{id}', function ($id) {
        return response()->json(Event::findOrFail($id));
    })->name('event.detail');
});

require __DIR__.'/auth.php';