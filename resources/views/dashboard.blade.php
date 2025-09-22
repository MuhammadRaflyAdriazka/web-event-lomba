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
        .event-card { position: relative; }
        .event-image-wrapper { width: 100%; height: 250px; overflow: hidden; }
        .event-image { width: 100%; height: 100%; object-fit: cover; object-position: center; }
        </style>

        <div id="event-section" class="container-fluid py-5">   
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Event & Lomba Tersedia</h5>
                    <h1>Daftar Event & Lomba</h1>
                </div>

                <div class="row" id="event-container">
                    @if(isset($events) && $events->count() > 0)
                        @foreach($events as $event)
                        <div class="col-lg-6 mb-4 event-item">
                            <div class="card shadow-lg border-0 rounded-lg overflow-hidden h-100 event-card">
                                <div class="event-image-wrapper">
                                    <img src="{{ asset('images/events/' . $event->image) }}" 
                                         alt="{{ $event->title }}" 
                                         class="event-image"
                                         onerror="this.src='{{ asset('templatepeserta/img/eror.jpeg') }}'">
                                </div>
                                <div class="card-body p-4">
                                    <h1 class="card-title mb-3">{{ $event->title }}</h1>
                                    <p><i class="fa fa-calendar"></i> {{ $event->event_date->format('d F Y') }}</p>
                                    <p><i class="fa fa-map-marker-alt"></i> Lokasi: {{ $event->location }}</p>
                                    
                                    <h5 class="mt-4">Biaya Pendaftaran</h5>
                                    <p><i class="fa fa-money-bill-wave"></i> {{ $event->fee }}</p>
                                    
                                    <h5 class="mt-4">Syarat Pendaftaran</h5>
                                    <p>{{ Str::limit($event->requirements, 120, '...') }}</p>
                                    
                                    <h5 class="mt-4">Periode Registrasi</h5>
                                    <p>{{ $event->registration_start->format('d F') }} – {{ $event->registration_end->format('d F Y') }}</p>
                                    
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

</body>
</html>