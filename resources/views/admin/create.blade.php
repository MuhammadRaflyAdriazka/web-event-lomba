<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\admin\create.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard for Event Management System">
    <meta name="author" content="Muhammad Rafly Adriazka">

    <title>Buat Event Baru - Admin Dinas</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('templateadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('templateadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Page Title in Topbar -->
                    <div class="d-flex align-items-center">
                        <h1 class="h4 mb-0 text-gray-800 mr-4">Buat Event Baru</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Topbar Divider -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Muhammad Rafly</span>
                                <img class="img-profile rounded-circle" src="{{ asset('templateadmin/img/undraw_profile.svg') }}" alt="User Profile">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Form Buat Event & Lomba</h1>
                        <p class="text-muted">Data akan tampil di halaman peserta setelah disimpan</p>
                    </div>

                    <!-- Alert Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-check-circle mr-1"></i>Berhasil!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-exclamation-triangle mr-1"></i>Oops!</strong> Ada beberapa kesalahan:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <!-- Form Section -->
                        <div class="col-lg-10">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-calendar-plus mr-2"></i>
                                        Informasi Event
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form id="createEventForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <!-- NAMA EVENT -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Nama Event / Lomba</label>
                                            <input type="text" name="title" id="title" 
                                                   class="form-control @error('title') is-invalid @enderror" 
                                                   placeholder="Contoh: Event Pasar Wadai" 
                                                   value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- TANGGAL PELAKSANAAN -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Tanggal Pelaksanaan</label>
                                            <input type="date" name="event_date" id="event_date" 
                                                   class="form-control @error('event_date') is-invalid @enderror" 
                                                   value="{{ old('event_date') }}" required>
                                            @error('event_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- LOKASI -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Lokasi</label>
                                            <input type="text" name="location" id="location" 
                                                   class="form-control @error('location') is-invalid @enderror" 
                                                   placeholder="Contoh: Lapangan Pemko Banjarmasin" 
                                                   value="{{ old('location') }}" required>
                                            @error('location')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- BIAYA PENDAFTARAN -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Biaya Pendaftaran</label>
                                            <input type="text" name="fee" id="fee" 
                                                   class="form-control @error('fee') is-invalid @enderror" 
                                                   placeholder="Contoh: Gratis" 
                                                   value="{{ old('fee') }}" required>
                                            @error('fee')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- SYARAT PENDAFTARAN -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Syarat Pendaftaran</label>
                                            <textarea name="requirements" id="requirements" 
                                                      class="form-control @error('requirements') is-invalid @enderror" 
                                                      rows="4" placeholder="Contoh:&#10;- Peserta minimal usia 10 tahun&#10;- Membawa KTP/Kartu Pelajar&#10;- Menggunakan karung sesuai ukuran panitia&#10;- Mengisi formulir pendaftaran" required>{{ old('requirements') }}</textarea>
                                            @error('requirements')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- PERIODE REGISTRASI -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-primary">Mulai Registrasi</label>
                                                    <input type="date" name="registration_start" id="registration_start" 
                                                           class="form-control @error('registration_start') is-invalid @enderror" 
                                                           value="{{ old('registration_start') }}" required>
                                                    @error('registration_start')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold text-primary">Tutup Registrasi</label>
                                                    <input type="date" name="registration_end" id="registration_end" 
                                                           class="form-control @error('registration_end') is-invalid @enderror" 
                                                           value="{{ old('registration_end') }}" required>
                                                    @error('registration_end')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- HADIAH -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Hadiah</label>
                                            <textarea name="prizes" id="prizes" 
                                                      class="form-control @error('prizes') is-invalid @enderror" 
                                                      rows="3" placeholder="Contoh:&#10;• Juara 1 : Motor&#10;• Juara 2 : Sepeda Listrik&#10;• Juara 3 : Sepeda Gunung" required>{{ old('prizes') }}</textarea>
                                            @error('prizes')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>.

                                        <!-- TENTANG ACARA -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Tentang Acara</label>
                                            <textarea name="about" id="about" 
                                                      class="form-control @error('about') is-invalid @enderror" 
                                                      rows="3" placeholder="Contoh: Acara ini di selenggarakan oleh dinas pariwisata untuk memperingati hari jadi kota banjarmasin" required>{{ old('about') }}</textarea>
                                            @error('about')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- GAMBAR EVENT -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Gambar Event</label>
                                            <input type="file" name="image" id="image" 
                                                   class="form-control-file @error('image') is-invalid @enderror" 
                                                   accept=".jpg,.jpeg,.png" required>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
                                        </div>

                                        <!-- BUTTONS -->
                                        <hr>
                                        <div class="form-group text-center">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg mr-3">
                                                <i class="fas fa-times mr-2"></i>Batal
                                            </a>
                                            <button type="submit" class="btn btn-success btn-lg" id="submitBtn">
                                                <i class="fas fa-save mr-2"></i>Buat Event Sekarang
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('templateadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('templateadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('templateadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('templateadmin/js/sb-admin-2.min.js') }}"></script>

    <script>
        // Notifikasi berhasil dari session
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil! 🎉',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#ffffff',
                color: '#333',
                customClass: {
                    popup: 'animate__animated animate__fadeInDown'
                }
            });
        @endif

        // Notifikasi error dari session
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops! Ada Kesalahan',
                html: `
                    <ul style="text-align: left; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonText: 'OK, Saya Mengerti',
                confirmButtonColor: '#d33'
            });
        @endif

        // Submit form dengan loading dan konfirmasi
        $('#createEventForm').on('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = $('#submitBtn');
            const eventTitle = $('#title').val();
            
            // Konfirmasi sebelum submit
            Swal.fire({
                title: 'Konfirmasi Buat Event',
                html: `Apakah Anda yakin ingin membuat event:<br><strong>"${eventTitle}"</strong>?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Buat Event!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Loading saat submit
                    submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan Event...');
                    
                    // Tampilkan loading alert
                    Swal.fire({
                        title: 'Sedang Membuat Event...',
                        html: 'Mohon tunggu sebentar <i class="fas fa-heart text-danger"></i>',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Submit form sebenarnya
                    form.submit();
                }
            });
        });

        // Auto hide alerts setelah 5 detik
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>

</body>

</html>