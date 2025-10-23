<nav id="navbarFront" class="navbar navbar-expand-lg navbar-light fixed-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ url('/') }}">
            <img src="{{ asset('assets/images/desa_gadel_front.png') }}" alt="Logo Desa" height="40" class="me-2">
            Desa Gadel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('profil-desa') ? 'active' : '' }}" href="{{ url('/profil-desa') }}">Profil Desa</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('demografi') ? 'active' : '' }}" href="{{ url('/demografi') }}">Demografi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('potensi') ? 'active' : '' }}" href="{{ url('/potensi') }}">Potensi</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Efek awal navbar transparan */
    #navbarFront {
        background-color: transparent;
        transition: all 0.3s ease;
    }

    /* Saat discroll, ubah warna */
    .navbar-scrolled {
        background-color: #ffffff !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Warna link */
    .nav-link {
        color: #333 !important;
        transition: color 0.2s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        color: #198754 !important;
    }

    /* Untuk navbar awal transparan, ubah warna teks jadi putih */
    #navbarFront:not(.navbar-scrolled) .nav-link,
    #navbarFront:not(.navbar-scrolled) .navbar-brand {
        color: white !important;
    }

    /* Responsif tambahan */
    @media (max-width: 991.98px) {
        #navbarFront {
            background-color: #fff !important;
        }

        .nav-link {
            color: #333 !important;
        }
    }
</style>

<script>
    // Saat halaman discroll, ubah tampilan navbar
    window.addEventListener('scroll', function () {
        const navbar = document.getElementById('navbarFront');
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
</script>
