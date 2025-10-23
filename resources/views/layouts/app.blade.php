<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>@yield('title', 'Desa-Gadel')</title>
    @include('components.header')
</head>

<body class="bg-light">
    <div id="db-wrapper">
        @include('layouts.sidebar')

        <!-- Page content -->
        <div id="page-content">
            <div class="header">
                @include('layouts.navbar')
            </div>

            <!-- Konten -->
            <main class="flex-grow-1">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    @include('components.script')
    @stack('scripts')
</body>
<script>
    // Alert sukses
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#198754', // hijau Bootstrap
        })
    @endif

    // Alert error
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: "{{ session('error') }}",
            confirmButtonColor: '#dc3545', // merah Bootstrap
        })
    @endif

    // Alert validasi error
    @if ($errors->any())
        Swal.fire({
            icon: 'warning',
            title: 'Validasi Gagal',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#ffc107', // kuning
        })
    @endif

    // Konfirmasi hapus
    function confirmDelete(formId) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: "Data ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        })
    }

    // Konfirmasi edit
    function confirmEdit(formId) {
        Swal.fire({
            title: 'Simpan perubahan?',
            text: "Pastikan data sudah benar sebelum disimpan.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        })
    }
</script>

</html>
