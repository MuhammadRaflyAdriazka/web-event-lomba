<!-- filepath: c:\laragon\www\web-event-lomba\resources\views\layouts\admin\sidebar.blade.php -->
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="..." style="height: 120px;">
    <div class="sidebar-brand-icon">
        <img src="{{ asset('image/LOGO-PEMKOT-BARU.png') }}" alt="Logo Pemko" style="max-height: 100px; max-width: 100px;">
    </div>
</a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Event Management
    </div>

    <!-- Nav Item - Kelola Event (Langsung ke Create) -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/kelola">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Kelola Event</span>
        </a>
    </li>

    <!-- Nav Item - Kelola Panitia -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/panitia">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelola Panitia</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Reports
    </div>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->