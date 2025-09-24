<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;

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

    // Simpan Event Baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'fee' => 'required|string|max:100',
            // Validasi field baru
            'category' => 'required|in:Event,Lomba',
            'registration_system' => 'required|in:Seleksi,Tanpa Seleksi',
            'quota' => 'required|integer|min:1',
            'event_category' => 'required|string|max:255',
            'requirements' => 'required|string',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
            'prizes' => 'required|string',
            'about' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'title.required' => 'Nama event wajib diisi',
            'event_date.required' => 'Tanggal pelaksanaan wajib diisi',
            'location.required' => 'Lokasi wajib diisi',
            'fee.required' => 'Biaya pendaftaran wajib diisi',
            // Pesan validasi field baru
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
        ]);

        // Buat folder jika belum ada
        if (!File::exists(public_path('images/events'))) {
            File::makeDirectory(public_path('images/events'), 0755, true);
        }

        // Upload gambar
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/events'), $imageName);

        // Simpan ke database
        Event::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'location' => $request->location,
            'fee' => $request->fee,
            // Field baru yang ditambahkan
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

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Event berhasil dibuat dan sudah tampil di halaman peserta!');
    }

    // Hapus Event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus gambar dari storage
        if (File::exists(public_path('images/events/' . $event->image))) {
            File::delete(public_path('images/events/' . $event->image));
        }
        
        $event->delete();
        
        return redirect()->route('admin.dashboard')
                         ->with('success', 'Event berhasil dihapus!');
    }
}