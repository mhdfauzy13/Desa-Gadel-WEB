@extends('layouts.app')

@section('title', 'Edit Berita Desa')

@section('content')
    <div class="row">
        <div class="bg-success pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-newspaper me-2"></i> Edit Berita Desa
                        </h3>
                        <a href="{{ route('berita-desa.index') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <form id="edit-form-{{ $berita->id }}" action="{{ route('berita-desa.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Judul -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Judul Berita</label>
                                <input type="text" name="judul" class="form-control rounded-3"
                                    value="{{ old('judul', $berita->judul) }}" required>
                            </div>

                            <!-- Gambar -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Gambar</label>
                                <input type="file" name="gambar" class="form-control rounded-3" accept="image/*">
                                @if ($berita->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $berita->gambar) }}"
                                            alt="Gambar {{ $berita->judul }}" class="img-thumbnail rounded shadow-sm"
                                            style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3 col-md-12">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3" rows="6" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="text-end border-top pt-3">
                            <button type="button" onclick="confirmEdit('edit-form-{{ $berita->id }}')"
                                class="btn btn-warning text-white px-4 rounded-3 shadow-sm">
                                <i class="bi bi-save me-1"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
