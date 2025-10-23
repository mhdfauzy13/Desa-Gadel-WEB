@extends('layouts.app')

@section('title', 'Edit Pemerintah Desa')

@section('content') <div class="row">
        <div class="bg-success pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-pencil-square me-2"></i> Edit Pemerintah Desa
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
                    <form id="edit-form-{{ $pemerintahDesa->id }}"
                        action="{{ route('pemerintah-desa.update', $pemerintahDesa->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Nama -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="nama" class="form-control rounded-3"
                                    value="{{ old('nama', $pemerintahDesa->nama) }}" required>
                            </div>

                            <!-- Jabatan -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control rounded-3"
                                    value="{{ old('jabatan', $pemerintahDesa->jabatan) }}" required>
                            </div>

                            <!-- Foto -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Foto</label>
                                <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                                @if ($pemerintahDesa->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $pemerintahDesa->foto) }}"
                                            alt="Foto {{ $pemerintahDesa->nama }}" class="img-thumbnail rounded-3"
                                            style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Update -->
                        <div class="text-end border-top pt-3">
                            <button type="button" onclick="confirmEdit('edit-form-{{ $pemerintahDesa->id }}')"
                                class="btn btn-warning text-white px-4 rounded-3 shadow-sm">
                                <i class="bi bi-save me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ```

@endsection
