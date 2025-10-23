@extends('layouts.app2')

@section('title', 'Beranda')

@section('content')

    <!-- ====== Hero Carousel ====== -->
    <div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/pemdes.jpg') }}" class="d-block w-100" alt="Gambar 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold text-shadow">Selamat Datang</h1>
                    <h3>Website Resmi Desa Gadel</h3>
                    <p class="small">Desa yang Maju, Mandiri, dan Berbudaya</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/carousel2.jpeg') }}" class="d-block w-100" alt="Gambar 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold text-shadow">Selamat Datang</h1>
                    <h3>Website Resmi Desa Gadel</h3>
                    <p class="small">Desa yang Maju, Mandiri, dan Berbudaya</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/carousel3.jpg') }}" class="d-block w-100" alt="Gambar 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="fw-bold text-shadow">Selamat Datang</h1>
                    <h3>Website Resmi Desa Gadel</h3>
                    <p class="small">Desa yang Maju, Mandiri, dan Berbudaya</p>
                </div>
            </div>
        </div>

        <!-- Custom Arrow Controls -->
        <button class="carousel-control-prev custom-arrow" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next custom-arrow" type="button" data-bs-target="#heroCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- ====== Sambutan Kepala Desa ====== -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('assets/images/kades.png') }}" alt="Kepala Desa"
                    class="rounded-circle img-fluid shadow-sm" style="width:200px; height:200px; object-fit:cover;">
            </div>
            <div class="col-md-8 mt-4 mt-md-0">
                <h3 class="fw-bold">Sambutan Kepala Desa Gadel</h3>
                <p class="text-muted">
                    Assalamualaikum Warahmatullahi Wabarakatuh.
                    Selamat datang di Website Resmi Desa Gadel.
                    Website ini merupakan sarana informasi dan transparansi publik yang dapat diakses oleh seluruh
                    masyarakat.
                </p>
            </div>
        </div>
    </div>

    <style>
        /* --- Gaya panah custom --- */
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

        /* Panah kiri */
        .carousel-control-prev-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 14px;
            height: 14px;
            border-top: 2px solid white;
            border-left: 2px solid white;
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        /* Panah kanan */
        .carousel-control-next-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 14px;
            height: 14px;
            border-top: 2px solid white;
            border-right: 2px solid white;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .custom-arrow {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .custom-arrow:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }
    </style>

@endsection

