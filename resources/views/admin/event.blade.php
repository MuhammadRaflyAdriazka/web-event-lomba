@extends('layouts.admin.app')

{{-- Mengatur judul halaman yang akan tampil di top bar --}}
@section('title', 'Kelola Event')

{{-- Menyisipkan CSS khusus untuk halaman ini --}}
@push('styles')
<style>
    .event-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .event-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .event-content {
        padding: 20px;
    }
    .event-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    .event-meta {
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
    }
    .event-meta i {
        width: 15px;
        margin-right: 8px;
        color: #007bff;
    }
    .btn-edit {
        background: linear-gradient(45deg, #ffd700, #ffed4e);
        border: none;
        color: #333;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        margin-right: 10px;
        transition: all 0.3s ease;
    }
    .btn-edit:hover {
        background: linear-gradient(45deg, #ffed4e, #ffd700);
        transform: translateY(-1px);
        color: #333;
    }
    .btn-delete {
        background: linear-gradient(45deg, #ff4757, #ff6b7a);
        border: none;
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-delete:hover {
        background: linear-gradient(45deg, #ff6b7a, #ff4757);
        transform: translateY(-1px);
        color: white;
    }
</style>
@endpush

{{-- Memulai bagian konten utama --}}
@section('content')

<h1 class="h3 mb-4 text-gray-800">Event yang Sudah Dibuat   </h1>

<div class="card shadow">
    <div class="card-header py-0 d-flex justify-content-between align-items-center">
        </a>
    </div>
    <div class="card-body">
        
        {{-- Nanti ganti bagian statis ini dengan loop dari database --}}

        <div class="event-card">
            <div class="row no-gutters align-items-center">
                {{-- Kolom gambar sudah dihapus --}}
                
                {{-- Kolom konten diperlebar menjadi col-md-9 --}}
                <div class="col-md-9">
                    <div class="event-content">
                        <h5 class="event-title">EVENT PASAR WADAI</h5>
                        <div class="event-meta"><i class="fas fa-calendar"></i>20 September 2025</div>
                        <div class="event-meta"><i class="fas fa-map-marker-alt"></i>Lapangan Pemko Banjarmasin</div>
                        <div class="event-meta"><i class="fas fa-users"></i>Kuota: 100 peserta</div>
                        <div class="event-meta"><i class="fas fa-tag"></i>Kuliner</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 text-center">
                        <a href="#" class="btn btn-edit btn-sm mb-2 d-block"><i class="fas fa-edit mr-1"></i>Edit</a>
                        <button type="button" class="btn btn-delete btn-sm d-block w-100" onclick="confirmDelete()">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-card">
            <div class="row no-gutters align-items-center">
                <div class="col-md-9">
                    <div class="event-content">
                        <h5 class="event-title">LOMBA FOTOGRAFI</h5>
                        <div class="event-meta"><i class="fas fa-calendar"></i>25 Oktober 2025</div>
                        <div class="event-meta"><i class="fas fa-map-marker-alt"></i>Taman Siring Banjarmasin</div>
                        <div class="event-meta"><i class="fas fa-users"></i>Kuota: 50 peserta</div>
                        <div class="event-meta"><i class="fas fa-tag"></i>Seni & Budaya</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 text-center">
                        <a href="#" class="btn btn-edit btn-sm mb-2 d-block"><i class="fas fa-edit mr-1"></i>Edit</a>
                        <button type="button" class="btn btn-delete btn-sm d-block w-100" onclick="confirmDelete()">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-card">
            <div class="row no-gutters align-items-center">
                <div class="col-md-9">
                    <div class="event-content">
                        <h5 class="event-title">WORKSHOP DIGITAL MARKETING</h5>
                        <div class="event-meta"><i class="fas fa-calendar"></i>15 November 2025</div>
                        <div class="event-meta"><i class="fas fa-map-marker-alt"></i>Gedung Serbaguna Banjarmasin</div>
                        <div class="event-meta"><i class="fas fa-users"></i>Kuota: 75 peserta</div>
                        <div class="event-meta"><i class="fas fa-tag"></i>Pelatihan</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 text-center">
                        <a href="#" class="btn btn-edit btn-sm mb-2 d-block"><i class="fas fa-edit mr-1"></i>Edit</a>
                        <button type="button" class="btn btn-delete btn-sm d-block w-100" onclick="confirmDelete()">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    function confirmDelete() {
        if(confirm('Yakin ingin menghapus event ini?')) {
            alert('Event berhasil dihapus!');
            // Logika penghapusan sebenarnya akan ditambahkan di sini
        }
    }
</script>
@endpush