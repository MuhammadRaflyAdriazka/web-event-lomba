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