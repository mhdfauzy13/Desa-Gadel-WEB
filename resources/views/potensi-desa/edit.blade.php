@extends('layouts.app')

@section('title', 'Edit Potensi Desa')

@section('content')
    <div class="row">
        <div class="bg-success pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-tree-fill me-2"></i> Edit Potensi Desa
                        </h3>
                        <a href="{{ route('potensi-desa.index') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <form id="edit-form-{{ $potensi->id }}" action="{{ route('potensi-desa.update', $potensi->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Judul Potensi -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Judul Potensi</label>
                                <input type="text" name="judul_potensi" class="form-control rounded-3"
                                    value="{{ old('judul_potensi', $potensi->judul_potensi) }}" required>
                            </div>

                            <!-- Gambar -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Gambar</label>
                                <input type="file" name="gambar" class="form-control rounded-3" accept="image/*">

                                @if ($potensi->gambar)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $potensi->gambar) }}"
                                            alt="Gambar {{ $potensi->judul_potensi }}" class="rounded shadow-sm"
                                            style="width: 120px; height: 120px; object-fit: cover;">
                                    </div>
                                @endif
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3 col-md-12">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3" rows="6" required>{{ old('deskripsi', $potensi->deskripsi) }}</textarea>
                            </div>
                        </div>

                        <!-- Tombol Update -->
                        <div class="text-end border-top pt-3"> 
                            <button type="button"
                                onclick="confirmEdit('edit-form-{{ $potensi->id }}')"
                                class="btn btn-warning text-white px-4 rounded-3 shadow-sm"> <i class="bi bi-save me-1"></i>
                                Update </button>
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
