@extends('layouts.panitia.app')

{{-- Mengatur judul halaman yang akan tampil di top bar --}}
@section('title', 'Kelola Event')

{{-- Memulai bagian konten utama --}}
@section('content')

<h1 class="h3 mb-4 text-gray-800">Kelola Event dan Lomba</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lihat Peserta yang Daftar</h6>
    </div>
    <div class="card-body">
        <p>Untuk melihat daftar peserta yang daftar, klik tombol di bawah ini:</p>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Lihat</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lihat Daftar Peserta yang Diterima</h6>
    </div>
    <div class="card-body">
        <p>Untuk melihat daftar peserta yang diterima, klik tombol di bawah ini:</p>
        {{-- Anda mungkin perlu mengubah route ini ke halaman daftar event, misalnya 'admin.event.list' --}}
        <a href="{{ route('admin.event') }}" class="btn btn-primary">Lihat</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Buat Pengumuman Baru</h6>
    </div>
    <div class="card-body">
        <p>Untuk membuat atau memperbarui pengumuman, klik tombol di bawah ini:</p>
        {{-- Anda mungkin perlu mengubah route ini ke halaman daftar event, misalnya 'admin.event.list' --}}
        <a href="{{ route('admin.event') }}" class="btn btn-primary">Lihat</a>
    </div>
</div>

@endsection
{{-- Mengakhiri bagian konten utama --}}