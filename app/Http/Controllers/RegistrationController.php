<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Models\RegistrationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Pastikan ini ada

class RegistrationController extends Controller
{
    /**
     * Menampilkan halaman form pendaftaran dinamis.
     */
    public function show($id)
    {
        $event = Event::with('formFields')->findOrFail($id);
        
        // Cek apakah periode registrasi masih aktif
        $now = now()->toDateString();
        $registrationOpen = ($now >= $event->registration_start && $now <= $event->registration_end);
        
        if(!$registrationOpen) {
            return redirect()->route('detail', $id)->with('error', 'Periode pendaftaran sudah berakhir pada ' . \Carbon\Carbon::parse($event->registration_end)->format('d F Y'));
        }
        
        // Cek apakah user sudah pernah daftar di event ini
        $hasRegistered = Registration::where('event_id', $event->id)
                                   ->where('user_id', auth()->id())
                                   ->exists();
                                   
        if($hasRegistered) {
            return redirect()->route('detail', $id)->with('warning', 'Anda sudah terdaftar pada event ini!');
        }
        
        return view('pendaftaran', compact('event'));
    }

    /**
     * Menyimpan data pendaftaran dari form dinamis.
     */
    public function store(Request $request, $id)
    {
        $event = Event::with('formFields')->findOrFail($id);
        
        // Cek apakah periode registrasi masih aktif (double protection)
        $now = now()->toDateString();
        $registrationOpen = ($now >= $event->registration_start && $now <= $event->registration_end);
        
        if(!$registrationOpen) {
            return redirect()->route('detail', $id)->with('error', 'Periode pendaftaran sudah berakhir pada ' . \Carbon\Carbon::parse($event->registration_end)->format('d F Y'));
        }
        
        // Cek lagi apakah user sudah pernah daftar (double protection)
        $hasRegistered = Registration::where('event_id', $event->id)
                                   ->where('user_id', auth()->id())
                                   ->exists();
                                   
        if($hasRegistered) {
            return redirect()->route('detail', $id)->with('warning', 'Anda sudah terdaftar pada event ini!');
        }
        
        // ... (Logika validasi dinamis tetap sama)
        $validationRules = [];
        $validationMessages = [];
        foreach ($event->formFields as $field) {
            $rules = [];
            if ($field->is_required) {
                $rules[] = 'required';
            } else {
                $rules[] = 'sometimes';
                $rules[] = 'nullable';
            }
            if ($field->field_type === 'email') $rules[] = 'email';
            if ($field->field_type === 'file') {
                $rules[] = 'file';
                $rules[] = 'mimes:jpg,jpeg,png,pdf';
                $rules[] = 'max:2048';
            }
            $validationRules[$field->field_name] = implode('|', $rules);
            $validationMessages[$field->field_name . '.required'] = "Field '{$field->field_label}' wajib diisi.";
        }
        $validatedData = $request->validate($validationRules, $validationMessages);

        // =======================================================
        //           LOGIKA PENYIMPANAN DATA DIMULAI DI SINI
        // =======================================================
        try {
            DB::beginTransaction();

            // 1. Buat record utama di tabel 'registrations'
            $registration = Registration::create([
                'event_id' => $event->id,
                'user_id' => auth()->id(),
                'status' => 'pending', // Status awal
            ]);

            // 2. Loop melalui data yang sudah divalidasi dan simpan
            foreach ($validatedData as $fieldName => $fieldValue) {
                
                $finalValue = $fieldValue;

                // Jika ada file, upload dan simpan path-nya
                if ($request->hasFile($fieldName)) {
                    // Pastikan Anda sudah menjalankan "php artisan storage:link"
                    $file = $request->file($fieldName);
                    $path = $file->store('registrations/' . $registration->id, 'public');
                    $finalValue = $path;
                }

                // Buat record di 'registration_data'
                RegistrationData::create([
                    'registration_id' => $registration->id,
                    'field_name' => $fieldName,
                    'field_value' => $finalValue,
                ]);
            }
            
            DB::commit(); // Semua berhasil, simpan permanen

        } catch (\Exception $e) {
            DB::rollBack(); // Ada error, batalkan semua
            
            // Kembali dengan pesan error
            return back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat pendaftaran. Silakan coba lagi.']);
        }

        return redirect()->route('acara')
                         ->with('success', 'Anda berhasil mendaftar di event "' . $event->title . '"! Informasi selanjutnya akan dikabarkan oleh panitia.');
    }
}