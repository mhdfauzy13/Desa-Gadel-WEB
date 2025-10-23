<!-- Sidebar -->
<nav class="navbar-vertical navbar custom-sidebar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/logo_gadel.png') }}" alt="Desa-Gadel"
                style="width: 90%; max-width: 12rem; height: auto; object-fit: contain; padding: 1rem 0;">
        </a>

        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}" style="color: black;">
                    <i data-feather="home" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Dashboard
                </a>
            </li>
            {{-- Hanya tampil jika login sebagai admin --}}
            @if (auth()->check() && auth()->user()->role === 'admin')
                <li class="nav-item">
                    <div class="navbar-heading">Master Data</div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}" style="color: black;">
                        <i data-feather="users" class="nav-icon icon-xs me-2" style="color: black;"></i>
                        Data User
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <div class="navbar-heading">Manajemen Data</div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('profil-desa.edit') ? 'active' : '' }}"
                    href="{{ route('profil-desa.edit') }}" style="color: black;">
                    <i data-feather="info" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Profil Desa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('pemerintah-desa.*') ? 'active' : '' }}"
                    href="{{ route('pemerintah-desa.index') }}" style="color: black;">
                    <i data-feather="user-check" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Data Pemdes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('demografi-desa.*') ? 'active' : '' }}"
                    href="{{ route('demografi-desa.index') }}" style="color: black;">
                    <i data-feather="bar-chart-2" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Demografi Desa
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('berita-desa.*') ? 'active' : '' }}"
                    href="{{ route('berita-desa.index') }}" style="color: black;">
                    <i data-feather="file-text" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Berita Desa
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('potensi-desa.*') ? 'active' : '' }}"
                    href="{{ route('potensi-desa.index') }}" style="color: black;">
                    <i data-feather="map" class="nav-icon icon-xs me-2" style="color: black;"></i>
                    Potensi Desa
                </a>
            </li>

        </ul>
    </div>
</nav>

<style>
    .custom-sidebar {
        background-color: white;
        border-right: none !important;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-vertical .nav-link:hover {
        color: #374151 !important;
    }

    .navbar-vertical .nav-link:hover i {
        color: #374151 !important;
    }

    .navbar-heading {
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 600;
        color: #9CA3AF;
        padding: 0.75rem 1rem 0.25rem;
    }
</style>

<script>
    // Aktifkan Feather Icon
    feather.replace();
</script>
