<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\acara.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Acara Saya - Pemkot Banjarmasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Acara Saya" name="keywords">
    <meta content="Acara Saya" name="description">

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
    <!-- Topbar Start -->
    @include('layouts.peserta.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('layouts.peserta.navbar')
    <!-- Navbar End -->

    <!-- Content wrapper -->
    <div class="flex-grow-1">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h1>Daftar Acara yang Anda Ikuti</h1>
                </div>

                <div class="row">
                    <!-- Event 1 -->
                    <div class="col-lg-12 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('image/pasar-wadai.jpg') }}" alt="Event Image" class="event-image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Event Pasar Wadai</h5>
                                        <p><i class="fa fa-calendar"></i> Tanggal Pelaksanaan: 20 September 2025</p>
                                        <p><i class="fa fa-map-marker-alt"></i> Lokasi: Lapangan Pemko Banjarmasin</p>
                                        <p><i class="fa fa-money-bill-wave"></i> Biaya: Gratis</p>
                                        <p><i class="fa fa-clock"></i> Status Pendaftaran: <span class="badge bg-primary text-white">Pending</span></p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event 2 -->
                    <div class="col-lg-12 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('image/pasar-wadai.jpg') }}" alt="Event Image" class="event-image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Event Pasar Wadai</h5>
                                        <p><i class="fa fa-calendar"></i> Tanggal Pelaksanaan: 20 September 2025</p>
                                        <p><i class="fa fa-map-marker-alt"></i> Lokasi: Lapangan Pemko Banjarmasin</p>
                                        <p><i class="fa fa-money-bill-wave"></i> Biaya: Gratis</p>
                                        <p><i class="fa fa-clock"></i> Status Pendaftaran: <span class="badge bg-success text-white">Diterima</span></p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event 3 -->
                    <div class="col-lg-12 mb-4">
                        <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('image/pasar-wadai.jpg') }}" alt="Event Image" class="event-image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Event Pasar Wadai</h5>
                                        <p><i class="fa fa-calendar"></i> Tanggal Pelaksanaan: 20 September 2025</p>
                                        <p><i class="fa fa-map-marker-alt"></i> Lokasi: Lapangan Pemko Banjarmasin</p>
                                        <p><i class="fa fa-money-bill-wave"></i> Biaya: Gratis</p>
                                        <p><i class="fa fa-clock"></i> Status Pendaftaran: <span class="badge bg-danger text-white">Ditolak</span></p>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                                        </div>
                                    </div>
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