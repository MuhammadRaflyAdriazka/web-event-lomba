<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\detail.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Event - {{ isset($event) ? $event->title : 'Event Lomba' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Event Lomba Banjarmasin" name="keywords">
    <meta content="Detail {{ isset($event) ? $event->title : 'Event Lomba' }}" name="description">

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
        @if(isset($event))
        <div class="jumbotron jumbotron-fluid position-relative" 
             style="margin-bottom: 90px; 
                    background: url('{{ asset('images/events/' . $event->image) }}') center center / cover no-repeat; 
                    height: 700px;"
             onerror="this.style.backgroundImage='url({{ asset('templatepeserta/img/eror.jpeg') }})'">
            <div class="container text-center my-5 py-5">
            </div>
        </div>
        @else
        <div class="jumbotron jumbotron-fluid position-relative" 
             style="margin-bottom: 90px; 
                    background: url('{{ asset('image/pasar-wadai.jpg') }}') center center / cover no-repeat; 
                    height: 700px;">
            <div class="container text-center my-5 py-5">
            </div>
        </div>
        @endif

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
                                
                                @if(isset($event))
                                <!-- DATA DARI DATABASE -->
                                <h1 class="text-primary text-uppercase mb-4 text-center" style="font-size: 18px; font-weight: bold; letter-spacing: 0.5px;">
                                    {{ strtoupper($event->title) }}
                                </h1>

                                <!-- Field baru yang ditambahkan -->
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">JENIS ACARA</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• {{ $event->category }}</p>

                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">KATEGORI</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• {{ $event->event_category }}</p>

                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">SISTEM PENDAFTARAN</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• {{ $event->registration_system }}</p>

                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">KUOTA PESERTA</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• {{ number_format($event->quota) }} Orang</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">BIAYA PENDAFTARAN</h5>
                                <p style="font-size: 14px; color: #333; padding-left: 15px;">• {{ $event->fee }}</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">SYARAT PENDAFTARAN</h5>
                                <div style="font-size: 14px; color: #333; white-space: pre-line;">{{ $event->requirements }}</div>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tanggal Pendaftaran</h5>
                                <p style="font-size: 14px; color: #333;">{{ $event->registration_start->format('d F') }} - {{ $event->registration_end->format('d F Y') }}</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tanggal Pelaksanaan</h5>
                                <p style="font-size: 14px; color: #333;">{{ $event->event_date->format('d F Y') }}</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Lokasi</h5>
                                <p style="font-size: 14px; color: #333;">{{ $event->location }}</p>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Hadiah</h5>
                                <div style="font-size: 14px; color: #333; white-space: pre-line;">{{ $event->prizes }}</div>
                                
                                <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">Tentang Acara</h5>
                                <p style="font-size: 14px; color: #333;">{{ $event->about }}</p>

                                <div class="text-center mt-4">
                                    @if(!$registrationOpen)
                                        <!-- Periode registrasi sudah tutup -->
                                        <div class="alert alert-danger mb-4">
                                            <h5><i class="fas fa-times-circle mr-2"></i>Pendaftaran Ditutup!</h5>
                                            <p class="mb-0">
                                                Periode pendaftaran sudah berakhir pada {{ \Carbon\Carbon::parse($event->registration_end)->format('d F Y') }}
                                            </p>
                                        </div>
                                        <button class="btn btn-secondary btn-lg" disabled>
                                            <i class="fas fa-lock mr-2"></i>Pendaftaran Ditutup
                                        </button>
                                    @else
                                        @auth
                                            <!-- User sudah login -->
                                            @if($hasRegistered)
                                                <!-- User sudah terdaftar -->
                                                <div class="alert alert-success mb-4">
                                                    <h5><i class="fas fa-check-circle mr-2"></i>Anda Sudah Terdaftar!</h5>
                                                    <p class="mb-0">Anda sudah terdaftar pada event ini. Terima kasih atas partisipasinya!</p>
                                                </div>
                                                <button class="btn btn-success btn-lg" disabled>
                                                    <i class="fas fa-check mr-2"></i>Sudah Terdaftar
                                                </button>
                                            @else
                                                <!-- User belum terdaftar -->
                                                <a href="/pendaftaran/{{ $event->id }}" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                                                </a>
                                            @endif
                                        @else
                                            <!-- User belum punya akun -->
                                            <div class="alert alert-info mb-4">
                                                <h5><i class="fas fa-info-circle mr-2"></i>Ingin Ikut Event Ini?</h5>
                                                <p class="mb-0">Buat akun terlebih dahulu untuk bisa mendaftar pada event ini</p>
                                            </div>
                                            <a href="{{ route('register') }}" class="btn btn-success btn-lg mr-3">
                                                <i class="fas fa-user-plus mr-2"></i>Buat Akun Sekarang
                                            </a>
                                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
                                                <i class="fas fa-sign-in-alt mr-2"></i>Sudah Punya Akun? Masuk
                                            </a>
                                        @endauth
                                    @endif
                                </div>
                                
                                @else
                                <!-- Pesan jika event tidak ditemukan -->
                                <div class="text-center">
                                    <div class="alert alert-warning">
                                        <h4><i class="fas fa-exclamation-triangle mr-2"></i>Event Tidak Ditemukan</h4>
                                        <p>Event yang Anda cari tidak tersedia atau sudah tidak aktif.</p>
                                        <a href="/" class="btn btn-primary">Kembali ke Beranda</a>
                                    </div>
                                </div>
                                @endif
                                
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