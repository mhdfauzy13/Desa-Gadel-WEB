<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Desa Gadel')</title>
    @include('components.header')
</head>

<body class="bg-light">
    <!-- Navbar Front -->
    @include('layouts.navbar2')

    <!-- Konten Halaman -->
    <main class="min-vh-100">
        @yield('content')
    </main>

    <!-- Footer Front -->
    @include('layouts.footer2')

    @include('components.script')
    @stack('scripts')

    {{-- <!-- SweetAlert Notification -->
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#198754',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#dc3545',
            });
        @endif
    </script> --}}
</body>

</html>
