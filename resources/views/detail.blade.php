<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\detail.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Event - Lomba Ketangkasan BPK/PMK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Event Lomba Banjarmasin" name="keywords">
    <meta content="Detail Event Lomba Ketangkasan BPK/PMK" name="description">

    <!-- Favicon -->
    <link href="{{ asset('templatepeserta/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('templatepeserta/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('templatepeserta/css/style.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Content wrapper -->
    <div class="flex-grow-1">
        <!-- Hero Image Section -->
        <div class="jumbotron jumbotron-fluid position-relative" 
             style="margin-bottom: 90px; 
                    background: url('{{ asset('image/pasar-wadai.jpg') }}') center center / cover no-repeat; 
                    height: 700px;">
            <div class="container text-center my-5 py-5">
            </div>
        </div>

        <!-- Button Section -->
        <div class="container-fluid" style="margin-top: -50px;">
            <div class="container">
                <div class="text-center mb-4">
                    <button class="btn btn-primary px-4 py-2" style="font-size: 16px; font-weight: bold; text-transform: uppercase;">
                        DESKRIPSI
                    </button>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-5">
                                <h1 class="text-primary text-uppercase mb-4 text-center" style="font-size: 18px; font-weight: bold; letter-spacing: 0.5px;">
                                    EVENT PASAR WADAI
                                </h1>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">BIAYA PENDAFTARAN</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• Gratis</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">SYARAT PENDAFTARAN</h5>
                                <p style="font-size: 14px; color: #333;">
                                    • Usia Minimal 17 Tahun<br>
                                    • Mempunyai KTP
                                </p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tanggal Pendaftaran</h5>
                                <p style="font-size: 14px; color: #333;">25 Agustus - 15 September</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tanggal Pelaksanaan</h5>
                                <p style="font-size: 14px; color: #333;">18 September 2025</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Lokasi</h5>
                                <p style="font-size: 14px; color: #333;">Pemerintah Kota Banjarmasin</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Hadiah</h5>
                                <p style="font-size: 14px; color: #333;">
                                    • Juara 1 : Motor<br>
                                    • Juara 2 : Sepeda Listrik<br>
                                    • Juara 3 : Sepeda Gunung
                                </p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tentang Acara</h5>
                                <p style="font-size: 14px; color: #333;">
                                    Acara ini di selenggarakan oleh dinas pariwiasata untuk memperingati hari jadi kota banjarmasin
                                </p>

                                <div class="text-center mt-4">
                                    <a href="/pendaftaran" class="btn btn-primary btn-lg">Daftar Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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