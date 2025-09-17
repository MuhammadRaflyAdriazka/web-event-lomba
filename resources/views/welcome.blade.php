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
                <div class="row">

                <!-- Event 1 -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg overflow-hidden h-100">
                        <div class="event-image-wrapper">
                            <img src="{{ asset('templatepeserta/img/mukbang-ayam.jpg') }}" 
                                 alt="Event Image" 
                                 class="event-image">
                        </div>
                        <div class="card-body p-4">
                            <h1 class="card-title mb-3">Lomba Mukbang Ayam</h1>
                            <p><i class="fa fa-calendar"></i> 19 September 2025</p>
                            <p><i class="fa fa-map-marker-alt"></i> Lokasi: Pemerintah Kota Banjarmasin</p>
                            
                            <h5 class="mt-4">Biaya Pendaftaran</h5>
                            <p><i class="fa fa-money-bill-wave"></i> Gratis</p>
                            
                            <h5 class="mt-4">Syarat Pendaftaran</h5>
                            <p>
                                - Peserta merupakan anggota resmi BPK/PMK se-Kota Banjarmasin<br>
                                - Membawa surat rekomendasi dari instansi<br>
                                - Membawa peralatan pribadi sesuai ketentuan<br>
                                - Mengisi formulir pendaftaran
                            </p>
                            
                            <h5 class="mt-4">Periode Registrasi</h5>
                            <p>25 Agustus – 15 September 2025</p>

                            <a href="#" class="btn btn-primary mt-3">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg overflow-hidden h-100">
                        <div class="event-image-wrapper">
                            <img src="{{ asset('image/pasar-wadai.jpg') }}" 
                                 alt="Event Image" 
                                 class="event-image">
                        </div>
                        <div class="card-body p-4">
                            <h1 class="card-title mb-3">Event Pasar Wadai</h1>
                            <p><i class="fa fa-calendar"></i> 20 September 2025</p>
                            <p><i class="fa fa-map-marker-alt"></i> Lokasi: Lapangan Pemko Banjarmasin</p>
                            
                            <h5 class="mt-4">Biaya Pendaftaran</h5>
                            <p><i class="fa fa-money-bill-wave"></i> Gratis</p>
                            
                            <h5 class="mt-4">Syarat Pendaftaran</h5>
                            <p>
                                - Peserta minimal usia 10 tahun<br>
                                - Membawa KTP/Kartu Pelajar<br>
                                - Menggunakan karung sesuai ukuran panitia<br>
                                - Mengisi formulir pendaftaran
                            </p>
                            
                            <h5 class="mt-4">Periode Registrasi</h5>
                            <p>26 Agustus – 17 September 2025</p>

                            <a href="/detail" class="btn btn-primary mt-3">Lihat Detail</a>
                        </div>
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
            }

            .event-image {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
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
</body>

</html>