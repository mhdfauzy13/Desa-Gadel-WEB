@extends('layouts.app')

@section('title', 'Tambah Potensi Desa')

@section('content')
    <div class="row">
        <div class="bg-success pt-10 pb-21"></div>
        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-tree-fill me-2"></i> Tambah Potensi Desa
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
                    <form id="form-potensi" action="{{ route('potensi-desa.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Judul Potensi -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Judul Potensi</label>
                                <input type="text" name="judul_potensi" class="form-control rounded-3"
                                    value="{{ old('judul_potensi') }}" required>
                            </div>

                            <!-- Gambar -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Gambar</label>
                                <input type="file" name="gambar" class="form-control rounded-3" accept="image/*">
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3 col-md-12">
                                <label class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3" rows="6">{{ old('deskripsi') }}</textarea>
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
@endsection

@push('scripts')
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .then(editor => {
                editorInstance = editor;
                // Sync isi editor ke textarea sebelum submit
                document.querySelector('#form-potensi').addEventListener('submit', function() {
                    document.querySelector('#deskripsi').value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
