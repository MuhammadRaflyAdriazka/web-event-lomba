<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Menampilkan halaman form pendaftaran dinamis.
     * Method ini dipanggil oleh route GET.
     */
    public function show($id)
    {
        // Ambil data event beserta relasi formFields-nya
        // findOrFail akan otomatis menampilkan halaman 404 jika event tidak ditemukan.
        $event = Event::with('formFields')->findOrFail($id);
        
        // Tampilkan view pendaftaran dan kirim data event ke sana
        return view('pendaftaran', compact('event'));
    }

    /**
     * Menyimpan data pendaftaran dari form dinamis.
     * Method ini dipanggil oleh route POST.
     */
    public function store(Request $request, $id)
    {
        $event = Event::with('formFields')->findOrFail($id);
        
        $validationRules = [];
        $validationMessages = [];

        // Membuat aturan validasi secara dinamis berdasarkan form builder
        foreach ($event->formFields as $field) {
            $rules = [];
            if ($field->is_required) {
                $rules[] = 'required';
            } else {
                // 'sometimes' berarti validasi hanya jika field ada di request
                $rules[] = 'sometimes'; 
                $rules[] = 'nullable';
            }

            if ($field->field_type === 'email') {
                $rules[] = 'email';
            }

            if ($field->field_type === 'file') {
                $rules[] = 'file';
                $rules[] = 'mimes:jpg,jpeg,png,pdf';
                $rules[] = 'max:2048'; // 2MB
            }
            
            $validationRules[$field->field_name] = implode('|', $rules);
            $validationMessages[$field->field_name . '.required'] = "Field '{$field->field_label}' wajib diisi.";
            $validationMessages[$field->field_name . '.mimes'] = "Field '{$field->field_label}' harus berformat JPG, PNG, atau PDF.";
            $validationMessages[$field->field_name . '.max'] = "Ukuran file '{$field->field_label}' maksimal 2MB.";
        }

        // Jalankan validasi
        $validatedData = $request->validate($validationRules, $validationMessages);

        // --- LOGIKA PENYIMPANAN DATA PENDAFTARAN SEHARUSNYA DI SINI ---
        // Anda perlu membuat tabel 'registrations' dan 'registration_data' untuk ini.
        // Sebagai contoh, kita akan fokus pada validasi dan pesan sukses.
        
        // Contoh mengelola file upload jika ada:
        // foreach ($validatedData as $key => $value) {
        //     if ($request->hasFile($key)) {
        //         $fileName = time() . '_' . $request->file($key)->getClientOriginalName();
        //         // Simpan file ke storage/app/public/registrations/{eventId}/{fileName}
        //         $path = $request->file($key)->storeAs('registrations/' . $event->id, $fileName, 'public');
        //         // Simpan path file ($path) ke database Anda
        //     }
        // }

        return redirect()->route('pendaftaran', $event->id)
                         ->with('success', 'Anda berhasil mendaftar di event "' . $event->title . '"! Informasi selanjutnya akan dikabarkan oleh panitia.');
    }
}