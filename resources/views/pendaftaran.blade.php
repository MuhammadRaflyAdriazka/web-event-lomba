<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pendaftaran Event - Pemkot Banjarmasin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Event Lomba Banjarmasin" name="keywords">
    <meta content="Pendaftaran Event Lomba" name="description">

    <link href="{{ asset('templatepeserta/img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('templatepeserta/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{ asset('templatepeserta/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    @include('layouts.peserta.topbar')
    @include('layouts.peserta.navbar')
    <div class="flex-grow-1">
        <div class="jumbotron jumbotron-fluid position-relative" 
             style="margin-bottom: 90px; 
                    background: url('{{ asset('images/events/' . $event->image) }}') center center / cover no-repeat; 
                    height: 700px;">
            <div class="container text-center my-5 py-5">
            </div>
        </div>

        <div class="container-fluid" style="margin-top: -50px;">
            <div class="container">
                <div class="text-center mb-4">
                    <button class="btn btn-primary px-4 py-2" style="font-size: 16px; font-weight: bold; text-transform: uppercase;">
                        PENDAFTARAN
                    </button>
                </div>
            </div>
        </div>

        <div class="container-fluid py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg">
                            <div class="card-body p-5">
                                <h1 class="text-primary text-uppercase mb-4 text-center" style="font-size: 18px; font-weight: bold; letter-spacing: 0.5px;">
                                    FORM PENDAFTARAN {{ strtoupper($event->title) }}
                                </h1>
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong class="d-block">Oops! Ada beberapa kesalahan:</strong>
                                        <ul class="mb-0 mt-2" style="padding-left: 20px;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <form id="pendaftaranForm" action="{{ route('pendaftaran.store', $event->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    @foreach ($event->formFields as $field)
                                        <h5 class="mt-4 text-uppercase" style="color: #333; font-size: 14px; font-weight: bold;">
                                            {{ $field->field_label }}
                                            @if($field->is_required)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </h5>

                                        @if(in_array($field->field_type, ['text', 'email', 'number', 'tel', 'date']))
                                            <input type="{{ $field->field_type }}" 
                                                   name="{{ $field->field_name }}" 
                                                   class="form-control" 
                                                   style="font-size: 14px;" 
                                                   placeholder="{{ $field->placeholder }}" 
                                                   {{ $field->is_required ? 'required' : '' }}
                                                   value="{{ old($field->field_name) }}">

                                        @elseif($field->field_type == 'textarea')
                                            <textarea name="{{ $field->field_name }}" 
                                                      class="form-control" 
                                                      rows="3" 
                                                      style="font-size: 14px;" 
                                                      placeholder="{{ $field->placeholder }}" 
                                                      {{ $field->is_required ? 'required' : '' }}>{{ old($field->field_name) }}</textarea>

                                        @elseif($field->field_type == 'file')
                                            <input type="file" 
                                                   name="{{ $field->field_name }}" 
                                                   class="form-control" 
                                                   style="font-size: 14px;" 
                                                   accept=".jpg,.jpeg,.png,.pdf" 
                                                   {{ $field->is_required ? 'required' : '' }}>
                                            @if($field->placeholder)
                                                <p style="font-size: 12px; color: #666; margin-top: 5px;">• {{ $field->placeholder }}</p>
                                            @endif
                                        @endif
                                    @endforeach

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

    @include('layouts.peserta.footer')
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templatepeserta/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('templatepeserta/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <script src="{{ asset('templatepeserta/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('pendaftaranForm').addEventListener('submit', function(e) {
            // Tampilkan loading saat form disubmit, tapi JANGAN hentikan submit-nya
            Swal.fire({
                title: 'Memproses Pendaftaran...',
                html: 'Mohon tunggu sebentar.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        });

        // Tampilkan notifikasi SUKSES dari session yang dikirim controller
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Pendaftaran Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman acara setelah user klik OK
                    window.location.href = "{{ route('acara') }}";
                }
            });
        @endif
    </script>
</body>

</html>