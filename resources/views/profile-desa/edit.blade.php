@extends('layouts.app')

@section('title', 'Edit Profil Desa')

@section('content')
    <div class="row">
        <!-- Background Hijau -->
        <div class="bg-success pt-10 pb-21"></div>

        <div class="container-fluid mt-n22 px-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0 text-white">
                            <i class="bi bi-house-door me-2"></i> Edit Profil Desa
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Card Konten -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">

                    {{-- Tabs --}}
                    <ul class="nav nav-tabs mb-4" id="profilDesaTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab', 'visi') == 'visi' ? 'active' : '' }}"
                                id="visi-tab" data-bs-toggle="tab" data-bs-target="#visi" type="button" role="tab">
                                <i class="bi bi-bullseye me-1"></i> Visi & Misi
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'sejarah' ? 'active' : '' }}"
                                id="sejarah-tab" data-bs-toggle="tab" data-bs-target="#sejarah" type="button"
                                role="tab">
                                <i class="bi bi-journal-text me-1"></i> Sejarah
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'peta' ? 'active' : '' }}" id="peta-tab"
                                data-bs-toggle="tab" data-bs-target="#peta" type="button" role="tab">
                                <i class="bi bi-geo-alt me-1"></i> Peta Desa
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="profilDesaTabContent">
                        {{-- Tab Visi Misi --}}
                        <div class="tab-pane fade {{ session('activeTab', 'visi') == 'visi' ? 'show active' : '' }}"
                            id="visi" role="tabpanel">
                            <form action="{{ route('profil-desa.updateVisiMisi') }}" method="POST" class="mb-5">
                                @csrf
                                <input type="hidden" name="activeTab" value="visi">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Visi</label>
                                    <textarea id="editorVisi" name="visi" class="form-control rounded-3" rows="4" required>{{ old('visi', $visiMisi->visi ?? '') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Misi</label>
                                    <textarea id="editorMisi" name="misi" class="form-control rounded-3" rows="4" required>{{ old('misi', $visiMisi->misi ?? '') }}</textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success px-4 rounded-3">
                                        <i class="bi bi-save me-1"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Tab Sejarah --}}
                        <div class="tab-pane fade {{ session('activeTab') == 'sejarah' ? 'show active' : '' }}"
                            id="sejarah" role="tabpanel">
                            <form action="{{ route('profil-desa.updateSejarah') }}" method="POST" class="mb-5">
                                @csrf
                                <input type="hidden" name="activeTab" value="sejarah">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Deskripsi Sejarah</label>
                                    <textarea id="editorSejarah" name="deskripsi" class="form-control rounded-3" rows="6" required>{{ old('deskripsi', $sejarah->deskripsi ?? '') }}</textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success px-4 rounded-3">
                                        <i class="bi bi-save me-1"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        {{-- Tab Peta --}}
                        <div class="tab-pane fade {{ session('activeTab') == 'peta' ? 'show active' : '' }}"
                            id="peta" role="tabpanel">
                            <form action="{{ route('profil-desa.updatePeta') }}" method="POST">
                                @csrf
                                <input type="hidden" name="activeTab" value="peta">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Utara</label>
                                        <input type="text" name="utara" class="form-control rounded-3"
                                            value="{{ old('utara', $peta->utara ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Timur</label>
                                        <input type="text" name="timur" class="form-control rounded-3"
                                            value="{{ old('timur', $peta->timur ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Selatan</label>
                                        <input type="text" name="selatan" class="form-control rounded-3"
                                            value="{{ old('selatan', $peta->selatan ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Barat</label>
                                        <input type="text" name="barat" class="form-control rounded-3"
                                            value="{{ old('barat', $peta->barat ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Luas (Ha)</label>
                                        <input type="number" name="luas" class="form-control rounded-3"
                                            value="{{ old('luas', $peta->luas ?? '') }}">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-semibold">Jumlah Penduduk</label>
                                        <input type="number" name="jumlah_penduduk" class="form-control rounded-3"
                                            value="{{ old('jumlah_penduduk', $peta->jumlah_penduduk ?? '') }}">
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success px-4 rounded-3">
                                        <i class="bi bi-save me-1"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    /* Tab inactive jadi hijau */
    .nav-tabs .nav-link {
        color: #198754;
        /* bootstrap success green */
        border: 1px solid #198754;
    }

    /* Hover inactive */
    .nav-tabs .nav-link:hover {
        background-color: #198754;
        color: #fff;
    }

    /* Tab aktif tetap style default Bootstrap */
    .nav-tabs .nav-link.active {
        background-color: #198754 !important;
        color: #fff !important;
        border-color: #198754 #198754 #fff;
    }
</style>

@push('scripts')
    <!-- CKEditor 5 Classic -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#editorVisi')).catch(error => console.error(error));
        ClassicEditor.create(document.querySelector('#editorMisi')).catch(error => console.error(error));
        ClassicEditor.create(document.querySelector('#editorSejarah')).catch(error => console.error(error));
    </script>
@endpush
