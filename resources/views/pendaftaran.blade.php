<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\pendaftaran.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pendaftaran Event - Pemkot Banjarmasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Event Lomba Banjarmasin" name="keywords">
    <meta content="Pendaftaran Event Lomba" name="description">

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

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                        PENDAFTARAN
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
                                    FORM PENDAFTARAN EVENT PASAR WADAI
                                </h1>
                                
                                <form id="pendaftaranForm" action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">NAMA LENGKAP</h5>
                                    <input type="text" name="nama_lengkap" class="form-control" style="font-size: 14px;" placeholder="Masukkan nama lengkap Anda" required>

                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">NO HP AKTIF</h5>
                                    <input type="tel" name="no_hp" class="form-control" style="font-size: 14px;" placeholder="Contoh: 081234567890" required>

                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">EMAIL AKTIF</h5>
                                    <input type="email" name="email" class="form-control" style="font-size: 14px;" placeholder="contoh@email.com" required>

                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">ALAMAT</h5>
                                    <textarea name="alamat" class="form-control" rows="3" style="font-size: 14px;" placeholder="Masukkan alamat lengkap Anda" required></textarea>

                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">FOTO KTP</h5>
                                    <input type="file" name="foto_ktp" class="form-control" style="font-size: 14px;" accept=".jpg,.jpeg,.png,.pdf" required>
                                    <p style="font-size: 12px; color: #666; margin-top: 5px;">• Format: JPG, PNG, PDF (Max: 2MB)</p>

                                    <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">FOTO SERTIFIKAT</h5>
                                    <input type="file" name="foto_sertifikat" class="form-control" style="font-size: 14px;" accept=".jpg,.jpeg,.png,.pdf">
                                    <p style="font-size: 12px; color: #666; margin-top: 5px;">• Format: JPG, PNG, PDF (Max: 2MB) - Opsional</p>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            Daftar Sekarang
                                        </button>
                                    </div>
                                </form>
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Simple Form Submission -->
    <script>
        document.getElementById('pendaftaranForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple validation
            const requiredFields = ['nama_lengkap', 'no_hp', 'email', 'alamat', 'foto_ktp'];
            let isValid = true;

            requiredFields.forEach(field => {
                const input = document.querySelector(`[name="${field}"]`);
                if (!input.value.trim()) {
                    isValid = false;
                }
            });

            if (!isValid) {
                alert('Mohon lengkapi semua field yang wajib diisi!');
                return;
            }

            // Show simple success notification
            Swal.fire({
                icon: 'success',
                title: 'Pendaftaran Berhasil!',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                // Reset form and redirect
                document.getElementById('pendaftaranForm').reset();
                window.location.href = '/dashboard';
            });
        });
    </script>
</body>

</html>