@extends('layouts.app')

@section('title', 'Tambah Demografi Desa')

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
                            <i class="bi bi-people-fill me-2"></i> Tambah Demografi Desa
                        </h3>
                        <a href="{{ route('demografi-desa.index') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <form action="{{ route('demografi-desa.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Jumlah Laki-laki -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Jumlah Laki-laki</label>
                                <input type="number" name="laki_laki" class="form-control rounded-3"
                                    value="{{ old('laki_laki') }}" required>
                            </div>

                            <!-- Jumlah Perempuan -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Jumlah Perempuan</label>
                                <input type="number" name="perempuan" class="form-control rounded-3"
                                    value="{{ old('perempuan') }}" required>
                            </div>

                            <!-- Nama Dusun -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Nama Dusun</label>
                                <input type="text" name="dusun" class="form-control rounded-3"
                                    value="{{ old('dusun') }}" required>
                            </div>

                            <!-- Tahun -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Tahun</label>
                                <select name="tahun" class="form-select rounded-3" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    @for ($year = date('Y'); $year >= 2000; $year--)
                                        <option value="{{ $year }}" {{ old('tahun') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
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
