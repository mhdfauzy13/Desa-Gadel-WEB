@extends('layouts.app2')

@section('title', 'Beranda')

@section('content')

    <!-- ====== Hero Carousel ====== -->
    <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="false">
        <!-- Indicators -->
        <div class="carousel-indicators d-md-none">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/pemdes.jpg') }}" class="d-block w-100" alt="Gambar 1">
                <div class="carousel-caption custom-caption">
                    <h1 class="title-text mb-2">Selamat Datang</h1>
                    <h3 class="sub-text" id="typingText1"></h3>
                    <p class="tagline" id="typingText2"></p>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/images/carousel2.jpeg') }}" class="d-block w-100" alt="Gambar 2">
                <div class="carousel-caption custom-caption">
                    <h1 class="title-text mb-2">Selamat Datang</h1>
                    <h3 class="sub-text">Website Resmi Desa Gadel</h3>
                    <p class="tagline">"Desa yang Maju, Mandiri, dan Berbudaya"</p>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('assets/images/carousel3.jpg') }}" class="d-block w-100" alt="Gambar 3">
                <div class="carousel-caption custom-caption">
                    <h1 class="title-text mb-2">Selamat Datang</h1>
                    <h3 class="sub-text">Website Resmi Desa Gadel</h3>
                    <p class="tagline">"Desa yang Maju, Mandiri, dan Berbudaya"</p>
                </div>
            </div>
        </div>

        <!-- Custom Arrow -->
        <button class="carousel-control-prev custom-arrow d-none d-md-flex" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next custom-arrow d-none d-md-flex" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- ====== Sambutan Kepala Desa ====== -->
    <div class="container my-5" style="background-color: #f5f5f5;">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <div class="kades-photo-wrapper">
                    <img src="{{ asset('assets/images/kades1.jpg') }}" alt="Kepala Desa"
                        class="rounded-circle img-fluid shadow-sm kades-photo">
                </div>
            </div>
            <div class="col-md-8 mt-4 mt-md-0 text-md-start text-center">
                <h3 class="fw-bold kades-title">Sambutan Kepala Desa Gadel</h3>
                <h5 class="kades-name">H. Narta</h5>
                <p class="text-muted kades-text">
                    <em>Assalamualaikum Warahmatullahi Wabarakatuh.</em><br>
                    Selamat datang di <strong>Website Resmi Desa Gadel.</strong><br>
                    Website ini merupakan sarana informasi dan transparansi publik yang dapat diakses oleh seluruh
                    masyarakat.
                </p>
            </div>
        </div>
    </div>

    <!-- ====== Pemerintah Desa ====== -->
    <section id="pemerintah-desa" class="py-5" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold pemdes-title">Pemerintah Desa Gadel</h3>
                <p class="pemdes-subtitle">Struktur dan jajaran aparatur Pemerintah Desa Gadel</p>
            </div>

            <!-- Panah Kiri & Kanan, tampil hanya di mobile -->
            <div class="position-relative d-md-none">
                <button id="slideLeft" class="arrow-btn left">&#10094;</button>
                <button id="slideRight" class="arrow-btn right">&#10095;</button>

                <!-- Slider -->
                <div class="pemerintah-slider">
                    @foreach ($pemerintahSample as $pemerintah)
                        <div class="card pemerintah-profile-card mx-2">
                            <div class="foto-wrapper">
                                <img src="{{ asset('storage/' . $pemerintah->foto) }}" alt="Foto {{ $pemerintah->nama }}"
                                    class="foto-pemerintah">
                            </div>
                            <div class="card-body text-center py-3">
                                <h5 class="fw-bold mb-1">{{ $pemerintah->nama }}</h5>
                                <p class="text-muted mb-0">{{ $pemerintah->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- TETAPKAN row grid default untuk tampilan desktop -->
            <div class="row g-4 justify-content-center d-none d-md-flex">
                @foreach ($pemerintahSample as $pemerintah)
                    <div class="col-md-6 col-lg-3">
                        <div class="card pemerintah-profile-card shadow-lg border-0">
                            <div class="foto-wrapper">
                                <img src="{{ asset('storage/' . $pemerintah->foto) }}" alt="Foto {{ $pemerintah->nama }}"
                                    class="foto-pemerintah">
                            </div>
                            <div class="card-body text-center py-3">
                                <h5 class="fw-bold mb-1">{{ $pemerintah->nama }}</h5>
                                <p class="text-muted mb-0">{{ $pemerintah->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

    </section>

    <!-- ====== Potensi Desa Section ====== -->
    <section id="potensi-desa" class="py-5" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="text-center mb-4">
                <h3 class="fw-bold potensi-title">Potensi Desa Gadel</h3>
                <p class="potensi-subtitle">Beragam potensi unggulan yang dimiliki Desa Gadel</p>
            </div>

            <div class="row gy-4">
                @forelse($potensiDesa as $potensi)
                    <div class="col-12">
                        <div class="card potensi-card border-0 shadow-sm overflow-hidden">
                            <div class="potensi-image-container">
                                <img src="{{ asset('storage/' . $potensi->gambar) }}" class="w-100 potensi-image"
                                    alt="Gambar {{ $potensi->judul_potensi }}">
                                <div class="potensi-overlay">
                                    <h5 class="potensi-title-text">{{ $potensi->judul_potensi }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        Belum ada data potensi desa.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ====== Berita Desa Section ====== -->
    <section id="berita-desa" class="py-5" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="text-center mb-4">
                <h3 class="fw-bold berita-title">Berita Desa</h3>
                <p class="berita-subtitle">Informasi & kabar terbaru dari Desa Gadel</p>
            </div>

            <div class="row gy-4">
                @forelse($beritaDesa as $berita)
                    <div class="col-md-6 col-6"> {{-- 2 kolom untuk desktop & mobile --}}
                        <div class="card berita-card shadow-sm border-0 d-flex flex-row align-items-stretch h-100">
                            <div class="berita-image-container">
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="berita-image"
                                    alt="{{ $berita->judul }}">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2">{{ $berita->judul }}</h5>
                                    <p class="text-muted small mb-3">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($berita->deskripsi), 120, '...') }}
                                    </p>
                                </div>
                                <div class="text-muted small d-flex align-items-center mt-auto">
                                    <i class="bi bi-person-fill me-2"></i> {{ $berita->created_by }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Belum ada berita desa.</div>
                @endforelse
            </div>
        </div>
    </section>


    <style>
        #heroCarousel img {
            height: 85vh;
            object-fit: cover;
            filter: brightness(70%);
        }

        .custom-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            padding: 0 10px;
            line-height: 1.4;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .title-text {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 800;
            color: #ffffff;
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
            margin-bottom: 1rem;
        }

        .sub-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0.2rem 0;
            color: #e3f8ff;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 1);
        }

        .tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 400;
            margin-top: 0.2rem;
            color: #d8f4ff;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 1);
        }

        /* ===== Responsiveness ===== */
        @media (max-width: 992px) {
            #heroCarousel img {
                height: 75vh;
            }

            .title-text {
                font-size: 2.8rem;
            }

            .sub-text {
                font-size: 1.6rem;
            }

            .tagline {
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            #heroCarousel img {
                height: 65vh;
            }

            .title-text {
                font-size: 2.2rem;
            }

            .sub-text {
                font-size: 1.3rem;
            }

            .tagline {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            #heroCarousel img {
                height: 60vh;
            }

            .title-text {
                font-size: 1.8rem;
            }

            .sub-text {
                font-size: 1.1rem;
            }

            .tagline {
                font-size: 0.9rem;
            }
        }

        /* Custom Arrows */
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-size: 60% 60%;
            background-image: none;
            position: relative;
        }

        .carousel-control-prev-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 14px;
            height: 14px;
            border-top: 2px solid #00cdff;
            border-left: 2px solid #00cdff;
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .carousel-control-next-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 14px;
            height: 14px;
            border-top: 2px solid #00cdff;
            border-right: 2px solid #00cdff;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .custom-arrow {
            background-color: rgba(0, 205, 255, 0.3);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .custom-arrow:hover {
            background-color: rgba(0, 205, 255, 0.6);
        }

        /* ===== Sambutan Kepala Desa Styling ===== */
        .kades-photo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .kades-photo {
            width: 260px;
            height: 260px;
            object-fit: cover;
            border-radius: 50%;
            border: 6px solid #006d91;
            background-color: #f8f9fa;
            box-shadow: 0 8px 25px rgba(0, 109, 145, 0.3);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        /* ===== Teks Sambutan Kepala Desa ===== */
        .kades-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 2rem;
            color: #006d91;
            margin-bottom: 0.3rem;
        }

        .kades-name {
            color: #004b63;
            font-size: 1.5rem;
            /* dikecilkan agar lebih proporsional */
            font-weight: 700;
        }

        .kades-text {
            color: #333;
        }

        /* ===== Responsive untuk HP (satu aturan saja) ===== */
        @media (max-width: 768px) {
            .kades-title {
                font-size: 1.4rem;
                /* lebih kecil di HP */
                text-align: center;
            }

            .kades-name {
                font-size: 1.3rem;
                /* sedikit lebih kecil */
                text-align: center;
            }

            .kades-text {
                font-size: 0.95rem;
                text-align: center;
            }

            .kades-photo {
                width: 180px;
                height: 180px;
            }
        }

        /* ===== Pemerintah Desa Modern Card ===== */
        .pemdes-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 2rem;
            color: #006d91;
            margin-bottom: 0.3rem;
            text-shadow: 1px 1px 4px rgba(0, 109, 145, 0.2);
        }

        .pemdes-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: #333;
        }

        .pemerintah-profile-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            background-color: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 109, 145, 0.25);
        }

        .pemerintah-profile-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 109, 145, 0.35);
        }

        .foto-wrapper {
            padding: 10px 10px 0 10px;
        }

        .foto-pemerintah {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 12px;
        }

        .pemerintah-profile-card p {
            font-size: 0.95rem;
            color: #555;
        }

        /* RESPONSIVE Typography untuk Pemerintah Desa Section */
        @media (max-width: 576px) {
            .pemdes-title {
                font-size: 1.5rem;
                /* Mengecilkan agar pas di layar kecil */
                text-align: center;
            }

            .pemdes-subtitle {
                font-size: 0.9rem;
                text-align: center;
            }

            /* Wrapper horizontal scroll */
            .pemerintah-slider {
                display: flex;
                overflow-x: auto;
                scroll-behavior: smooth;
                padding: 10px;
            }

            .pemerintah-slider::-webkit-scrollbar {
                display: none;
            }

            /* Card style untuk scroll (ukurannya tetap proporsional) */
            .pemerintah-slider .card {
                min-width: 220px;
                flex: 0 0 auto;
            }

            /* Panah kiri-kanan: posisi tengah secara vertikal */
            .arrow-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                z-index: 10;
                background-color: #006d91;
                color: white;
                border: none;
                padding: 6px 12px;
                border-radius: 50%;
                font-size: 20px;
                cursor: pointer;
                opacity: 0.8;
                transition: all 0.3s ease;
            }

            .arrow-btn:hover {
                opacity: 1;
            }

            .arrow-btn.left {
                left: -10px;
            }

            .arrow-btn.right {
                right: -10px;
            }

            /* Wrapper scroll horizontal */
            .pemerintah-slider {
                display: flex;
                overflow-x: auto;
                scroll-behavior: smooth;
                padding: 10px;
                gap: 10px;
            }

            .pemerintah-slider::-webkit-scrollbar {
                display: none;
            }

            .pemerintah-slider .card {
                min-width: 220px;
                flex: 0 0 auto;
            }

        }

        /* ===== POTENSI DESA STYLING ===== */
        .potensi-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #006d91;
        }

        .potensi-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: #555;
        }

        .potensi-card {
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .potensi-card:hover {
            transform: scale(1.01);
            box-shadow: 0 15px 40px rgba(0, 109, 145, 0.25);
        }

        .potensi-image-container {
            position: relative;
        }

        .potensi-image {
            height: 240px;
            object-fit: cover;
            filter: brightness(0.9);
            transition: filter 0.3s ease;
        }

        .potensi-card:hover .potensi-image {
            filter: brightness(1.05);
        }

        .potensi-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to bottom, rgba(0, 109, 145, 0.7), rgba(0, 109, 145, 0.1));
            color: white;
            padding: 1rem 1.2rem;
        }

        /* Potensi Desa Judul Umum */
        .potensi-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 2rem;
            color: #006d91;
            margin-bottom: 0.3rem;
            text-shadow: 1px 1px 4px rgba(0, 109, 145, 0.2);
            text-align: center;
        }


        /* Overlay Biru Transparan Menutupi Seluruh Gambar */
        .potensi-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 109, 145, 0.45);
            /* shadow biru transparan */
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            transition: background 0.3s ease;
        }

        /* Judul di Tengah & Besar (Dekstop) */
        .potensi-title-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            font-size: 40px;
            letter-spacing: 1px;
            color: #ffffff;
            text-transform: uppercase;
            text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.6);
            text-align: center;
            margin: 0;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .potensi-card:hover .potensi-title-text {
            transform: scale(1.05);
            text-shadow: 4px 4px 15px rgba(0, 0, 0, 0.7);
        }


        /* Mobile - Judul Kecil di Pojok Kanan Atas */
        @media (max-width: 576px) {

            .potensi-title {
                font-size: 1.5rem;
                text-align: center;
            }

            .potensi-subtitle {
                font-size: 0.9rem;
                text-align: center;
            }


            .potensi-overlay {
                align-items: flex-start;
                justify-content: flex-start;
                padding: 12px;
            }

            .potensi-title-text {
                font-size: 1rem;
                text-align: left;
                padding: 6px 10px;
                border-radius: 6px;
            }
        }

        /* ===== BERITA DESA ===== */
        .berita-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #006d91;
        }

        .berita-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            color: #555;
        }

        .berita-card {
            border-radius: 14px;
            overflow: hidden;
            background-color: #fff;
            transition: box-shadow 0.3s ease;
            display: flex;
            flex-direction: row;
            height: 100%;
        }

        .berita-card:hover {
            box-shadow: 0 10px 30px rgba(0, 109, 145, 0.25);
        }

        .berita-image-container {
            width: 45%;
            height: auto;
            overflow: hidden;
            flex-shrink: 0;
        }

        .berita-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Tetap 2 card per baris di semua resolusi + responsive content */
        @media (max-width: 768px) {
            .col-6 {
                flex: 0 0 auto;
                width: 50% !important;
                padding-left: 6px;
                padding-right: 6px;
            }

            .berita-card {
                flex-direction: row !important;
                padding: 8px;
            }

            .berita-image-container {
                width: 50%;
                height: 100px;
            }

            .berita-card .card-body {
                padding: 0.5rem 0.6rem;
            }

            .berita-title {
                font-size: 1.4rem;
            }

            .berita-card h5 {
                font-size: 0.8rem;
                line-height: 1.2;
                margin-bottom: 4px;
            }

            .berita-card p {
                font-size: 0.7rem;
                line-height: 1.1;
                margin-bottom: 6px;
            }

            .berita-card .text-muted.small {
                font-size: 0.65rem;
            }
        }
    </style>

    <script>
        const text1 = "Website Resmi Desa Gadel";
        const text2 = "\"Desa yang Maju, Mandiri, dan Berbudaya\"";
        const typingText1 = document.getElementById("typingText1");
        const typingText2 = document.getElementById("typingText2");
        let index1 = 0,
            index2 = 0;

        function typeText1() {
            if (index1 < text1.length) {
                typingText1.textContent += text1.charAt(index1);
                index1++;
                setTimeout(typeText1, 70);
            } else setTimeout(typeText2, 500);
        }

        function typeText2() {
            if (index2 < text2.length) {
                typingText2.textContent += text2.charAt(index2);
                index2++;
                setTimeout(typeText2, 70);
            } else {
                const carousel = new bootstrap.Carousel(document.querySelector('#heroCarousel'), {
                    interval: 4000,
                    ride: 'carousel',
                    pause: false,
                    wrap: true
                });
            }
        }

        window.addEventListener("DOMContentLoaded", () => {
            setTimeout(typeText1, 1000);
        });

        // Animasi interaktif Sambutan Kepala Desa
        window.addEventListener("scroll", () => {
            const kadesSection = document.querySelector(".kades-photo-wrapper").closest(".row");
            const sectionTop = kadesSection.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (sectionTop < windowHeight - 100) {
                kadesSection.classList.add("show-animate");
            }
        });

        // Efek lembut mengapung (floating effect)
        const kadesPhoto = document.querySelector(".kades-photo");
        let floatDirection = 1;
        setInterval(() => {
            kadesPhoto.style.transform = `translateY(${floatDirection * 5}px) scale(1)`;
            floatDirection *= -1;
        }, 2000);


        // Scroll tombol untuk Pemerintah Desa di mobile
        const slider = document.querySelector('.pemerintah-slider');
        const leftBtn = document.getElementById('slideLeft');
        const rightBtn = document.getElementById('slideRight');

        if (slider && leftBtn && rightBtn) {
            leftBtn.addEventListener('click', () => {
                slider.scrollBy({
                    left: -250,
                    behavior: 'smooth'
                });
            });
            rightBtn.addEventListener('click', () => {
                slider.scrollBy({
                    left: 250,
                    behavior: 'smooth'
                });
            });
        }
    </script>

@endsection
