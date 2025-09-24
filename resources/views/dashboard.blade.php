<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Pendaftar - Pemkot Banjarmasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('templatepeserta/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('templatepeserta/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('templatepeserta/css/style.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Topbar Start -->
    @include('layouts.peserta.topbar')
    <!-- Topbar End -->

    <!-- Content wrapper -->
    <div class="flex-grow-1">
        <!-- Navbar Start -->
        @include('layouts.peserta.navbar')
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" 
             style="margin-bottom: 90px; background: url('{{ asset('templatepeserta/img/foto-walikota.jpg') }}') center top 16% / cover no-repeat; height: 700px;">
        </div>
        <!-- Header End -->

        <!-- Event Start -->
        <style>
        html { scroll-behavior: smooth; }
        .event-card { position: relative; transition: all 0.3s ease; }
        .event-card.hidden { display: none !important; }
        .event-image-wrapper { width: 100%; height: 250px; overflow: hidden; position: relative; }
        .event-image { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .badge-lg { font-size: 0.8rem; padding: 0.5rem 0.75rem; }
        </style>

        <div id="event-section" class="container-fluid py-5">   
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Event & Lomba Tersedia</h5>
                    <h1>Daftar Event & Lomba</h1>
                </div>

                <!-- Filter Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><i class="fas fa-filter mr-2"></i>Filter Event & Lomba</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <label class="font-weight-bold">Jenis:</label>
                                        <select class="form-control" id="categoryFilter">
                                            <option value="">Semua</option>
                                            <option value="Event">Event</option>
                                            <option value="Lomba">Lomba</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="font-weight-bold">Kategori:</label>
                                        <select class="form-control" id="eventCategoryFilter">
                                            <option value="">Semua Kategori</option>
                                            <option value="Olahraga">Olahraga</option>
                                            <option value="Kesenian & Budaya">Kesenian & Budaya</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Kuliner">Kuliner</option>
                                            <option value="Teknologi">Teknologi</option>
                                            <option value="Kesehatan">Kesehatan</option>
                                            <option value="Lingkungan">Lingkungan</option>
                                            <option value="Sosial">Sosial</option>
                                            <option value="Ekonomi">Ekonomi</option>
                                            <option value="Pariwisata">Pariwisata</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="font-weight-bold">Sistem Pendaftaran:</label>
                                        <select class="form-control" id="registrationSystemFilter">
                                            <option value="">Semua Sistem</option>
                                            <option value="Seleksi">Seleksi</option>
                                            <option value="Tanpa Seleksi">Tanpa Seleksi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="event-container">
                    @php
                        // Ambil langsung dari database jika $events tidak ada atau kosong
                        $displayEvents = isset($events) && $events->count() > 0 ? $events : \App\Models\Event::where('status', 'active')->latest()->get();
                    @endphp
                    
                    @if($displayEvents->count() > 0)
                        @foreach($displayEvents as $event)
                        <div class="col-lg-6 mb-4 event-item event-card" 
                             data-category="{{ $event->category }}" 
                             data-event-category="{{ $event->event_category }}"
                             data-registration-system="{{ $event->registration_system }}">
                            <div class="card shadow-lg border-0 rounded-lg overflow-hidden h-100">
                                <div class="event-image-wrapper">
                                    <img src="{{ asset('images/events/' . $event->image) }}" 
                                         alt="{{ $event->title }}" 
                                         class="event-image"
                                         onerror="this.src='{{ asset('templatepeserta/img/eror.jpeg') }}'">
                                    <!-- Badge untuk kategori -->
                                    <div class="position-absolute" style="top: 10px; left: 10px;">
                                        @if($event->category == 'Event')
                                            <span class="badge badge-primary badge-lg">{{ $event->category }}</span>
                                        @else
                                            <span class="badge badge-success badge-lg">{{ $event->category }}</span>
                                        @endif
                                    </div>
                                    <div class="position-absolute" style="top: 10px; right: 10px;">
                                        <span class="badge badge-info badge-lg">{{ $event->event_category }}</span>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h1 class="card-title mb-3">{{ $event->title }}</h1>
                                    <p><i class="fa fa-calendar"></i> {{ $event->event_date ? $event->event_date->format('d F Y') : 'Tanggal tidak tersedia' }}</p>
                                    <p><i class="fa fa-map-marker-alt"></i> Lokasi: {{ $event->location }}</p>
                                    
                                    <!-- Field baru yang ditambahkan -->
                                    <h5 class="mt-4">Sistem Pendaftaran</h5>
                                    <p>
                                        @if($event->registration_system == 'Seleksi')
                                            <span class="badge badge-warning">{{ $event->registration_system }}</span>
                                        @else
                                            <span class="badge badge-info">{{ $event->registration_system }}</span>
                                        @endif
                                        <small class="text-muted ml-2">- Kuota: {{ number_format($event->quota) }} peserta</small>
                                    </p>
                                    
                                    <h5 class="mt-4">Biaya Pendaftaran</h5>
                                    <p><i class="fa fa-money-bill-wave"></i> {{ $event->fee }}</p>
                                    
                                    <h5 class="mt-4">Syarat Pendaftaran</h5>
                                    <p>{{ Str::limit($event->requirements, 120, '...') }}</p>
                                    
                                    <h5 class="mt-4">Periode Registrasi</h5>
                                    <p>{{ $event->registration_start ? $event->registration_start->format('d F') : 'TBA' }} – {{ $event->registration_end ? $event->registration_end->format('d F Y') : 'TBA' }}</p>
                                    
                                    <h5 class="mt-4">Hadiah</h5>
                                    <p>{{ Str::limit($event->prizes, 100, '...') }}</p>
                                    
                                    <div class="mt-3">
                                        <a href="/detail/{{ $event->id }}" class="btn btn-outline-primary">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <!-- Jika belum ada event dari database -->
                    <div class="col-12">
                        <div class="text-center">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-body p-5">
                                    <i class="fas fa-calendar-times fa-5x text-muted mb-4"></i>
                                    <h3 class="text-muted">Belum Ada Event Tersedia</h3>
                                    <p class="text-muted">Event dan lomba akan segera hadir. Pantau terus halaman ini untuk update terbaru!</p>
                                    <a href="/" class="btn btn-primary mt-3">Kembali ke Beranda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- No Results Message (Hidden by default) -->
                <div class="row" id="noResultsMessage" style="display: none;">
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <h4><i class="fas fa-search mr-2"></i>Tidak Ada Hasil</h4>
                            <p>Tidak ada event yang sesuai dengan filter yang dipilih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event End -->
    </div>

    <!-- Footer Start -->
    @include('layouts.peserta.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templatepeserta/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('templatepeserta/js/main.js')}}"></script>

    <!-- Filter JavaScript -->
    <script>
        $(document).ready(function() {
            // Filter function
            function filterEvents() {
                const categoryFilter = $('#categoryFilter').val();
                const eventCategoryFilter = $('#eventCategoryFilter').val();
                const registrationSystemFilter = $('#registrationSystemFilter').val();
                
                let visibleCount = 0;
                
                $('.event-card').each(function() {
                    const card = $(this);
                    const cardCategory = card.data('category');
                    const cardEventCategory = card.data('event-category');
                    const cardRegistrationSystem = card.data('registration-system');
                    
                    let showCard = true;
                    
                    // Filter by category (Event/Lomba)
                    if (categoryFilter && cardCategory !== categoryFilter) {
                        showCard = false;
                    }
                    
                    // Filter by event category (Olahraga, Budaya, etc.)
                    if (eventCategoryFilter && cardEventCategory !== eventCategoryFilter) {
                        showCard = false;
                    }
                    
                    // Filter by registration system
                    if (registrationSystemFilter && cardRegistrationSystem !== registrationSystemFilter) {
                        showCard = false;
                    }
                    
                    if (showCard) {
                        card.removeClass('hidden').show();
                        visibleCount++;
                    } else {
                        card.addClass('hidden').hide();
                    }
                });
                
                // Show/hide no results message
                if (visibleCount === 0) {
                    $('#noResultsMessage').show();
                } else {
                    $('#noResultsMessage').hide();
                }
            }
            
            // Attach filter events
            $('#categoryFilter, #eventCategoryFilter, #registrationSystemFilter').on('change', filterEvents);
        });
    </script>

</body>
</html>