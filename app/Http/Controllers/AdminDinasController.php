<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventFormField; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;   // <-- TAMBAHKAN INI

class AdminDinasController extends Controller
{
    // Dashboard Admin - Menampilkan semua event
    public function dashboard()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }

    // Halaman Create Event
    public function create()
    {
        return view('admin.create');
    }

    // Halaman Kelola Event
    public function index()
    {
        $events = Event::latest()->get(); // Ambil semua event dari database
        return view('admin.kelola', compact('events')); // Return ke view kelola.blade.php
    }

    // Simpan Event Baru (METHOD INI YANG KITA SEMPURNAKAN)
    public function store(Request $request)
    {
        // 1. VALIDASI DATA (DITAMBAH VALIDASI UNTUK FORM FIELDS)
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'fee' => 'required|string|max:100',
            'category' => 'required|in:Event,Lomba',
            'registration_system' => 'required|in:Seleksi,Tanpa Seleksi',
            'quota' => 'required|integer|min:1',
            'event_category' => 'required|string|max:255',
            'requirements' => 'required|string',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
            'prizes' => 'required|string',
            'about' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=400,min_height=250,max_width=1920,max_height=1080',
            // Validasi untuk form fields dari Step 2
            'form_fields' => 'required|array|min:4', // Minimal ada 4 field default
            'form_fields.*.field_name' => 'required|string',
            'form_fields.*.field_label' => 'required|string',
            'form_fields.*.field_type' => 'required|string',
        ], [
            // Pesan validasi lama Anda
            'title.required' => 'Nama event wajib diisi',
            'event_date.required' => 'Tanggal pelaksanaan wajib diisi',
            'location.required' => 'Lokasi wajib diisi',
            'fee.required' => 'Biaya pendaftaran wajib diisi',
            'category.required' => 'Kategori Event/Lomba wajib dipilih',
            'category.in' => 'Kategori harus Event atau Lomba',
            'registration_system.required' => 'Sistem pendaftaran wajib dipilih',
            'registration_system.in' => 'Sistem pendaftaran harus Seleksi atau Tanpa Seleksi',
            'quota.required' => 'Kuota peserta wajib diisi',
            'quota.integer' => 'Kuota peserta harus berupa angka',
            'quota.min' => 'Kuota peserta minimal 1 orang',
            'event_category.required' => 'Kategori acara wajib dipilih',
            'requirements.required' => 'Syarat pendaftaran wajib diisi',
            'registration_start.required' => 'Tanggal mulai registrasi wajib diisi',
            'registration_end.required' => 'Tanggal tutup registrasi wajib diisi',
            'registration_end.after_or_equal' => 'Tanggal tutup registrasi tidak boleh lebih awal dari tanggal mulai',
            'prizes.required' => 'Hadiah wajib diisi',
            'about.required' => 'Tentang acara wajib diisi',
            'image.required' => 'Gambar event wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'image.dimensions' => 'Ukuran gambar minimal 400x250 pixel dan maksimal 1920x1080 pixel untuk tampilan yang optimal',
             // Pesan validasi baru
            'form_fields.required' => 'Terjadi kesalahan, form pendaftaran tidak boleh kosong.',
            'form_fields.min' => 'Field wajib (Nama, No HP, Email, Alamat) harus ada.',
        ]);

        // 2. GUNAKAN TRANSAKSI DATABASE (LOGIKA BARU)
        // Ini memastikan semua data (event & form fields) berhasil disimpan atau tidak sama sekali.
        try {
            DB::beginTransaction();

            // 3. UPLOAD GAMBAR (Logika lama Anda, sekarang di dalam 'try')
            if (!File::exists(public_path('images/events'))) {
                File::makeDirectory(public_path('images/events'), 0755, true);
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/events'), $imageName);

            // 4. SIMPAN EVENT UTAMA (Logika lama Anda, sekarang di dalam 'try')
            $event = Event::create([
                'title' => $request->title,
                'event_date' => $request->event_date,
                'location' => $request->location,
                'fee' => $request->fee,
                'category' => $request->category,
                'registration_system' => $request->registration_system,
                'quota' => $request->quota,
                'event_category' => $request->event_category,
                'requirements' => $request->requirements,
                'registration_start' => $request->registration_start,
                'registration_end' => $request->registration_end,
                'prizes' => $request->prizes,
                'about' => $request->about,
                'image' => $imageName,
                'status' => 'active'
            ]);

            // 5. SIMPAN FORM FIELDS (LOGIKA BARU)
            foreach ($request->form_fields as $fieldData) {
                EventFormField::create([
                    'event_id' => $event->id, // Hubungkan dengan ID event yang baru dibuat
                    'field_name' => $fieldData['field_name'],
                    'field_label' => $fieldData['field_label'],
                    'field_type' => $fieldData['field_type'],
                    'is_required' => $fieldData['is_required'] == '1',
                    'placeholder' => $fieldData['placeholder'] ?? null,
                    'field_order' => $fieldData['field_order']
                ]);
            }

            // Jika semua berhasil, konfirmasi transaksi
            DB::commit();

            return redirect()->route('admin.dashboard')
                             ->with('success', 'Event berhasil dibuat dan sudah tampil di halaman peserta!');

        } catch (\Exception $e) {
            // Jika ada error, batalkan semua yang sudah disimpan
            DB::rollBack();

            // Hapus gambar yang mungkin sudah terupload
            if (isset($imageName) && File::exists(public_path('images/events/' . $imageName))) {
                File::delete(public_path('images/events/' . $imageName));
            }

            // Kembali ke halaman create dengan pesan error
            return back()->withInput()->withErrors(['error' => 'Gagal membuat event. Silakan coba lagi. Error: ' . $e->getMessage()]);
        }
    }

    // Hapus Event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus gambar dari storage
        if (File::exists(public_path('images/events/' . $event->image))) {
            File::delete(public_path('images/events/' . $event->image));
        }
        
        // Menghapus event akan otomatis menghapus semua form fields yang terhubung
        // karena kita sudah mengatur 'onDelete('cascade')' pada file migrasi.
        $event->delete(); 
        
        return redirect()->route('admin.dashboard')
                         ->with('success', 'Event berhasil dihapus!');
    }
}