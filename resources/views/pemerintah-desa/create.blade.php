@extends('layouts.app')

@section('title', 'Tambah Pemerintah Desa')

@section('content') <div class="row">
        <div class="bg-success pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-people-fill me-2"></i> Tambah Pemerintah Desa
                        </h3>
                        <a href="{{ route('pemerintah-desa.index') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('pemerintah-desa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Nama -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="nama" class="form-control rounded-3"
                                    value="{{ old('nama') }}" required>
                            </div>

                            <!-- Jabatan -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control rounded-3"
                                    value="{{ old('jabatan') }}" required>
                            </div>

                            <!-- Foto -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Foto</label>
                                <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-end border-top pt-3">
                            <button type="submit" class="btn btn-success px-4 rounded-3">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ```

@endsection
