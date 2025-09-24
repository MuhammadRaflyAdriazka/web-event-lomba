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

    <style>
        .form-builder-field {
            transition: all 0.3s ease;
            border: 2px solid #e3e6f0;
            background: #fff;
        }
        
        .form-builder-field:hover {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.1);
        }

        .default-field {
            border-color: #28a745;
            background-color: #f8fff9;
        }

        .default-field .card-header {
            background-color: #28a745 !important;
            color: white;
        }
        
        .field-preview {
            background-color: #f8f9fc;
            border-left: 4px solid #4e73df;
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .drag-handle {
            cursor: move;
            color: #6c757d;
        }

        .drag-handle:hover {
            color: #495057;
        }

        /* Step Content */
        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        /* Step Progress Bar */
        .step-progress {
            margin-bottom: 30px;
        }

        .step-progress .progress {
            height: 8px;
            border-radius: 10px;
        }

        .step-progress .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .step-progress .step-item {
            text-align: center;
            flex: 1;
            position: relative;
        }

        .step-progress .step-item .step-number {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #e3e6f0;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .step-progress .step-item.active .step-number {
            background: #4e73df;
            color: white;
        }

        .step-progress .step-item.completed .step-number {
            background: #28a745;
            color: white;
        }

        .step-progress .step-item .step-title {
            font-size: 13px;
            font-weight: 600;
            color: #6c757d;
        }

        .step-progress .step-item.active .step-title {
            color: #4e73df;
        }

        .step-progress .step-item.completed .step-title {
            color: #28a745;
        }
    </style>
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

                    <!-- STEP PROGRESS -->
                    <div class="step-progress">
                        <div class="step-indicator">
                            <div class="step-item active" data-step="1">
                                <div class="step-number">1</div>
                                <div class="step-title">Informasi Event</div>
                            </div>
                            <div class="step-item" data-step="2">
                                <div class="step-number">2</div>
                                <div class="step-title">Form Pendaftaran</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" id="progressBar"></div>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="col-lg-12">
                        <form id="createEventForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- STEP 1: INFORMASI EVENT -->
                            <div class="step-content active" id="step1">
                                <!-- BASIC EVENT INFO CARD -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <i class="fas fa-calendar-plus mr-2"></i>
                                            Informasi Dasar Event
                                        </h6>
                                    </div>
                                    <div class="card-body">
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

                                        <!-- BIAYA PENDAFTARAN (FIXED GRATIS) -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Biaya Pendaftaran</label>
                                            <input type="text" name="fee" id="fee" 
                                                   class="form-control" 
                                                   value="Gratis" 
                                                   readonly required>
                                            <small class="form-text text-muted">Biaya pendaftaran sudah ditetapkan gratis untuk semua event</small>
                                        </div>

                                        <!-- KATEGORI EVENT/LOMBA -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Kategori Event/Lomba</label>
                                            <select name="category" id="category" 
                                                    class="form-control @error('category') is-invalid @enderror" required>
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="Event" {{ old('category') == 'Event' ? 'selected' : '' }}>Event</option>
                                                <option value="Lomba" {{ old('category') == 'Lomba' ? 'selected' : '' }}>Lomba</option>
                                            </select>
                                            @error('category')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- SISTEM PENDAFTARAN -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Sistem Pendaftaran</label>
                                            <select name="registration_system" id="registration_system" 
                                                    class="form-control @error('registration_system') is-invalid @enderror" required>
                                                <option value="">-- Pilih Sistem --</option>
                                                <option value="Seleksi" {{ old('registration_system') == 'Seleksi' ? 'selected' : '' }}>Seleksi (Ada Kuota)</option>
                                                <option value="Tanpa Seleksi" {{ old('registration_system') == 'Tanpa Seleksi' ? 'selected' : '' }}>Tanpa Seleksi (Ada Kuota)</option>
                                            </select>
                                            @error('registration_system')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">
                                                <strong>Seleksi:</strong> Admin akan seleksi pendaftar berdasarkan kuota<br>
                                                <strong>Tanpa Seleksi:</strong> Peserta langsung diterima sampai kuota habis
                                            </small>
                                        </div>

                                        <!-- KUOTA PESERTA (SELALU MUNCUL) -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Kuota Peserta</label>
                                            <input type="number" name="quota" id="quota" 
                                                   class="form-control @error('quota') is-invalid @enderror" 
                                                   placeholder="Contoh: 100" 
                                                   value="{{ old('quota') }}" min="1" required>
                                            @error('quota')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Maksimal peserta yang bisa mendaftar</small>
                                        </div>

                                        <!-- KATEGORI ACARA -->
                                        <div class="form-group">
                                            <label class="font-weight-bold text-primary">Kategori Acara</label>
                                            <select name="event_category" id="event_category" 
                                                    class="form-control @error('event_category') is-invalid @enderror" required>
                                                <option value="">-- Pilih Kategori Acara --</option>
                                                <option value="Olahraga" {{ old('event_category') == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                                                <option value="Kesenian & Budaya" {{ old('event_category') == 'Kesenian & Budaya' ? 'selected' : '' }}>Kesenian & Budaya</option>
                                                <option value="Pendidikan" {{ old('event_category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                                <option value="Kuliner" {{ old('event_category') == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                                                <option value="Teknologi" {{ old('event_category') == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                                <option value="Kesehatan" {{ old('event_category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                                                <option value="Lingkungan" {{ old('event_category') == 'Lingkungan' ? 'selected' : '' }}>Lingkungan</option>
                                                <option value="Sosial" {{ old('event_category') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                                <option value="Ekonomi" {{ old('event_category') == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                                                <option value="Pariwisata" {{ old('event_category') == 'Pariwisata' ? 'selected' : '' }}>Pariwisata</option>
                                            </select>
                                            @error('event_category')
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
                                        </div>

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

                                        <!-- NAVIGATION BUTTONS STEP 1 -->
                                        <hr class="my-4">
                                        <div class="text-center">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg mr-3">
                                                <i class="fas fa-times mr-2"></i>Batal
                                            </a>
                                            <button type="button" class="btn btn-primary btn-lg" id="nextBtn">
                                                Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 2: FORM BUILDER -->
                            <div class="step-content" id="step2">
                                <!-- FORM BUILDER SECTION -->
                                <div class="card border-primary mb-4 shadow">
                                    <div class="card-header bg-primary text-white">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-0">
                                                    <i class="fas fa-edit mr-2"></i>
                                                    Form Pendaftaran Peserta
                                                </h6>
                                                <small>Atur field yang diperlukan untuk pendaftaran peserta</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-success">
                                            <i class="fas fa-check mr-2"></i>
                                            <strong>Field Wajib:</strong> Nama Lengkap, No HP Aktif, Email Aktif, dan Alamat sudah ditambahkan otomatis dan tidak bisa dihapus.
                                            <br><strong>Field Tambahan:</strong> Admin bisa menambah field upload berkas sesuai kebutuhan event.
                                        </div>

                                        <!-- Form Fields Container -->
                                        <div id="formFieldsContainer">
                                            <!-- Field default akan ditambahkan di sini -->
                                        </div>
                                        
                                        <!-- Quick Add Buttons untuk Berkas -->
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h6 class="font-weight-bold text-dark">
                                                    <i class="fas fa-plus mr-2"></i>Tambah Field Berkas/Dokumen:
                                                </h6>
                                                <button type="button" class="btn btn-outline-success mr-2 mb-2 quick-add" data-type="file" data-name="foto_ktp" data-label="Foto KTP" data-placeholder="Format: JPG, PNG (Max: 2MB)" data-required="1">
                                                    <i class="fas fa-id-card mr-1"></i> Foto KTP
                                                </button>
                                                <button type="button" class="btn btn-outline-dark mr-2 mb-2" id="addCustomFieldBtn">
                                                    <i class="fas fa-plus mr-1"></i> Field Custom
                                                </button>
                                            </div>
                                        </div>

                                        <!-- NAVIGATION BUTTONS STEP 2 -->
                                        <hr class="my-4">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-outline-primary btn-lg mr-3" id="prevBtn">
                                                <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                                            </button>
                                            <button type="button" class="btn btn-success btn-lg" id="submitBtn">
                                                <i class="fas fa-save mr-2"></i>Buat Event Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        let currentStep = 1;
        let fieldIndex = 0;

        // Step functions
        function showStep(step) {
            $('.step-content').removeClass('active');
            $('.step-item').removeClass('active completed');
            
            $('#step' + step).addClass('active');
            $(`.step-item[data-step="${step}"]`).addClass('active');
            
            // Mark previous steps as completed
            for (let i = 1; i < step; i++) {
                $(`.step-item[data-step="${i}"]`).addClass('completed');
            }
            
            // Update progress bar
            const progress = (step / 2) * 100;
            $('#progressBar').css('width', progress + '%');
        }

        function validateStep1() {
            let isValid = true;
            const requiredFields = ['title', 'event_date', 'location', 'fee', 'category', 'registration_system', 'quota', 'event_category', 'requirements', 'registration_start', 'registration_end', 'prizes', 'about', 'image'];
            
            requiredFields.forEach(field => {
                const input = $(`#${field}`);
                if (!input.val()) {
                    input.addClass('is-invalid');
                    isValid = false;
                } else {
                    input.removeClass('is-invalid');
                }
            });

            if (!isValid) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Form Belum Lengkap',
                    text: 'Mohon lengkapi semua field yang wajib diisi!',
                    confirmButtonText: 'OK'
                });
            }

            return isValid;
        }

        // Step navigation
        $('#nextBtn').on('click', function() {
            if (currentStep === 1 && validateStep1()) {
                currentStep = 2;
                showStep(currentStep);
                // Initialize form builder when moving to step 2
                if (fieldIndex === 0) {
                    initializeFormBuilder();
                }
            }
        });

        $('#prevBtn').on('click', function() {
            if (currentStep === 2) {
                currentStep = 1;
                showStep(currentStep);
            }
        });

        // Initialize form builder
        function initializeFormBuilder() {
            addFormField('text', 'nama_lengkap', 'Nama Lengkap', 'Masukkan nama lengkap Anda', 1, true);
            addFormField('text', 'no_hp', 'No HP Aktif', 'Contoh: 081234567890', 1, true);
            addFormField('email', 'email', 'Email Aktif', 'contoh@email.com', 1, true);
            addFormField('textarea', 'alamat', 'Alamat Lengkap', 'Masukkan alamat lengkap Anda', 1, true);
        }

        // Quick add buttons
        $(document).on('click', '.quick-add', function() {
            const type = $(this).data('type');
            const name = $(this).data('name');
            const label = $(this).data('label');
            const placeholder = $(this).data('placeholder');
            const required = $(this).data('required') !== undefined ? $(this).data('required') : 1;
            
            // Tambahkan data field-name ke button untuk tracking
            $(this).attr('data-field-name', name);
            
            addFormField(type, name, label, placeholder, required);
            
            // Disable button dan ubah teks
            $(this).prop('disabled', true)
                   .removeClass('btn-outline-success')
                   .addClass('btn-success')
                   .html('<i class="fas fa-check mr-1"></i> Sudah Ditambah');
        });

        // Add custom field button (semua field custom jadi WAJIB)
        $('#addCustomFieldBtn').on('click', function() {
            Swal.fire({
                title: 'Tambah Field Custom',
                html: `
                    <div class="text-left">
                        <div class="form-group">
                            <label><strong>Label Field:</strong></label>
                            <input type="text" id="customFieldLabel" class="form-control" placeholder="contoh: Usia">
                        </div>
                        <div class="form-group">
                            <label><strong>Tipe Field:</strong></label>
                            <select id="customFieldType" class="form-control">
                                <option value="text">Text</option>
                                <option value="number">Angka</option>
                                <option value="textarea">Text Panjang</option>
                                <option value="file">File Upload</option>
                            </select>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const label = document.getElementById('customFieldLabel').value;
                    const type = document.getElementById('customFieldType').value;
                    const required = 1; // SEMUA FIELD CUSTOM JADI WAJIB
                    
                    if (!label) {
                        Swal.showValidationMessage('Label field harus diisi');
                        return false;
                    }
                    
                    // Generate name dari label
                    const name = label.toLowerCase().replace(/\s+/g, '_');
                    const placeholder = type === 'file' ? 'Upload file' : `Masukkan ${label.toLowerCase()}`;
                    
                    return { name, label, type, required, placeholder };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const { name, label, type, required, placeholder } = result.value;
                    addFormField(type, name, label, placeholder, required);
                }
            });
        });

        // Function to add form field
        function addFormField(type = 'text', name = '', label = '', placeholder = '', required = 1, isDefault = false) {
            const fieldHtml = `
                <div class="border rounded p-3 mb-3 form-builder-field ${isDefault ? 'default-field' : ''}" id="field_${fieldIndex}" data-field-name="${name}">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="mb-0 ${isDefault ? 'text-success' : 'text-primary'}">
                            <i class="fas fa-${getFieldIcon(type)} mr-2"></i>
                            ${label}
                            ${isDefault ? '<span class="badge badge-success ml-2">WAJIB</span>' : '<span class="badge badge-danger ml-2">WAJIB</span>'}
                        </h6>
                        ${!isDefault ? '<button type="button" class="btn btn-danger btn-sm remove-field"><i class="fas fa-trash"></i></button>' : '<i class="fas fa-lock text-success"></i>'}
                    </div>
                    
                    <!-- Hidden inputs untuk form data -->
                    <input type="hidden" name="form_fields[${fieldIndex}][field_name]" value="${name}">
                    <input type="hidden" name="form_fields[${fieldIndex}][field_label]" value="${label}">
                    <input type="hidden" name="form_fields[${fieldIndex}][field_type]" value="${type}">
                    <input type="hidden" name="form_fields[${fieldIndex}][is_required]" value="${required}">
                    <input type="hidden" name="form_fields[${fieldIndex}][placeholder]" value="${placeholder}">
                    <input type="hidden" name="form_fields[${fieldIndex}][field_order]" value="${fieldIndex}">
                    
                    <!-- Field Preview -->
                    <div class="field-preview">
                        <small class="text-muted"><strong>Preview:</strong></small><br>
                        <label class="font-weight-bold">${label} <span class="text-danger">*</span></label>
                        ${getFieldPreview(type, placeholder)}
                    </div>
                </div>
            `;
            
            $('#formFieldsContainer').append(fieldHtml);
            fieldIndex++;
        }

        // Remove field dengan konfirmasi DAN reset button
        $(document).on('click', '.remove-field', function() {
            const fieldContainer = $(this).closest('div[id^="field_"]');
            const fieldLabel = fieldContainer.find('input[name*="[field_label]"]').val();
            const fieldName = fieldContainer.data('field-name');
            
            Swal.fire({
                title: 'Hapus Field?',
                text: `Field "${fieldLabel}" akan dihapus`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Hapus field container
                    fieldContainer.remove();
                    
                    // Reset tombol quick-add yang terkait jika ada
                    resetQuickAddButton(fieldName);
                }
            });
        });

        // Function untuk reset button quick-add
        function resetQuickAddButton(fieldName) {
            // Cari button yang memiliki data-name sama dengan fieldName
            const button = $(`.quick-add[data-name="${fieldName}"]`);
            
            if (button.length > 0) {
                // Reset button ke keadaan semula
                const originalLabel = button.data('label');
                const originalIcon = getQuickAddIcon(fieldName);
                
                button.prop('disabled', false)
                      .removeClass('btn-success')
                      .addClass('btn-outline-success')
                      .html(`<i class="fas fa-${originalIcon} mr-1"></i> ${originalLabel}`);
            }
        }

        // Function untuk mendapatkan icon button berdasarkan field name
        function getQuickAddIcon(fieldName) {
            switch(fieldName) {
                case 'foto_ktp': return 'id-card';
                default: return 'plus';
            }
        }

        // Helper functions
        function getFieldPreview(type, placeholder) {
            switch(type) {
                case 'text':
                case 'email':
                case 'number':
                    return `<input type="${type}" class="form-control form-control-sm" placeholder="${placeholder}" disabled>`;
                case 'textarea':
                    return `<textarea class="form-control form-control-sm" rows="2" placeholder="${placeholder}" disabled></textarea>`;
                case 'file':
                    return `<input type="file" class="form-control-file" disabled><br><small class="text-muted">${placeholder}</small>`;
                default:
                    return `<input type="text" class="form-control form-control-sm" disabled>`;
            }
        }

        function getFieldIcon(type) {
            switch(type) {
                case 'text': return 'font';
                case 'email': return 'envelope';
                case 'number': return 'hashtag';
                case 'textarea': return 'align-left';
                case 'file': return 'file-upload';
                default: return 'edit';
            }
        }

        // Form submission
        $('#submitBtn').on('click', function(e) {
            e.preventDefault();
            
            const form = document.getElementById('createEventForm');
            const submitBtn = $('#submitBtn');
            const eventTitle = $('#title').val();
            const fieldCount = $('#formFieldsContainer > div').length;
            
            // Validate minimum fields (sudah ada 4 default)
            if (fieldCount < 4) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Form Belum Lengkap',
                    text: 'Field wajib belum lengkap!',
                    confirmButtonText: 'OK'
                });
                return;
            }
            
            // Konfirmasi sebelum submit
            Swal.fire({
                title: 'Konfirmasi Buat Event',
                html: `
                    <div class="text-left">
                        <p>Apakah Anda yakin ingin membuat event:</p>
                        <p><strong>"${eventTitle}"</strong></p>
                        <p>dengan <strong>${fieldCount} field</strong> pada form pendaftaran?</p>
                        <small class="text-muted">Termasuk 4 field wajib: Nama, No HP, Email, Alamat</small>
                    </div>
                `,
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

        // Initialize on page load
        $(document).ready(function() {
            showStep(1);
        });

        // Notifikasi dari session
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil! 🎉',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

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

        // Auto hide alerts
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>

</body>

</html>