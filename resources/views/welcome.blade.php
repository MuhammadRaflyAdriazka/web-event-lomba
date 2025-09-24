<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>pemkot</title>
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
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+62 812 3456 7890</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>pemkotbanjarmasin@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Content wrapper -->
    <div class="flex-grow-1">
        <!-- Navbar Start -->
        <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ url('/') }}" class="navbar-brand ml-lg-3">
            <img src="{{ asset('templatepeserta/img/logo-pemkot.png') }}" alt="Logo Pemkot" style="height: 100px;">
            <img src="{{ asset('templatepeserta/img/river-logo.png') }}" alt="Logo Pemkot" style="height: 100px;">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="welcome-section" class="nav-item nav-link active">Home</a>
                    <a href="#event-section" class="nav-item nav-link">Event & Lomba</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="{{ url('/login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block" style="margin-right: 10px;">Login</a>
                <a href="{{ url('/register') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Register</a>
            </div>
        </nav>
    </div>
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="jumbotron jumbotron-fluid position-relative overlay-bottom" 
     style="margin-bottom: 90px; 
            background: url('{{ asset('templatepeserta/img/foto-walikota.jpg') }}') center top 16% / cover no-repeat; 
            height: 700px;">
    <div class="container text-center my-5 py-5">
    </div>
</div>

        <!-- Header End -->

        <!-- event Start -->
        <style>
        html {
            scroll-behavior: smooth;
        }
        </style>

        <div id="event-section" class="container-fluid py-5">   
            <div class="container py-5">
                <!-- Section Title -->
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

                <div class="row" id="eventsContainer">
                <!-- EVENT DARI DATABASE (yang dibuat admin) -->
                @if($events && $events->count() > 0)
                    @foreach($events as $event)
                    <div class="col-lg-6 mb-4 event-card" 
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
                                <p><i class="fa fa-calendar"></i> {{ $event->event_date->format('d F Y') }}</p>
                                <p><i class="fa fa-map-marker-alt"></i> Lokasi: {{ $event->location }}</p>
                                
                                <h5 class="mt-4">Biaya Pendaftaran</h5>
                                <p><i class="fa fa-money-bill-wave"></i> {{ $event->fee }}</p>
                                
                                <h5 class="mt-4">Syarat Pendaftaran</h5>
                                <div style="white-space: pre-line;">{{ $event->requirements }}</div>

                                <h5 class="mt-4">Sistem Pendaftaran</h5>
                                <p>
                                    @if($event->registration_system == 'Seleksi')
                                        <span class="badge badge-warning">{{ $event->registration_system }}</span>
                                    @else
                                        <span class="badge badge-info">{{ $event->registration_system }}</span>
                                    @endif
                                    <small class="text-muted">- Kuota: {{ number_format($event->quota) }} peserta</small>
                                </p>

                                <h5 class="mt-4">Periode Registrasi</h5>
                                <p>{{ $event->registration_start->format('d F') }} – {{ $event->registration_end->format('d F Y') }}</p>

                                <a href="/detail/{{ $event->id }}" class="btn btn-primary mt-3">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Pesan jika belum ada event -->
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <h4><i class="fas fa-info-circle mr-2"></i>Belum Ada Event Terbaru</h4>
                            <p>Saat ini belum ada event yang tersedia. Silakan cek kembali nanti untuk informasi event terbaru dari Pemerintah Kota Banjarmasin.</p>
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
        <!-- event End -->

        <!-- CSS untuk gambar -->
        <style>
            .event-image-wrapper {
                width: 100%;
                height: 250px; /* seragam */
                overflow: hidden;
                position: relative;
            }

            .event-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .badge-lg {
                font-size: 0.8rem;
                padding: 0.5rem 0.75rem;
            }

            .event-card {
                transition: all 0.3s ease;
            }

            .event-card.hidden {
                display: none !important;
            }
        </style>
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