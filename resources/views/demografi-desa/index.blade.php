@extends('layouts.app')
@section('title', 'Demografi Desa')
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
                            <i class="bi bi-people-fill me-2"></i> Data Demografi Desa
                        </h3>
                        <a href="{{ route('demografi-desa.create') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center" style="width: 60px;">#</th>
                                    <th>Dusun</th>
                                    <th class="text-center">Laki-laki</th>
                                    <th class="text-center">Perempuan</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($demografis as $item)
                                    <tr class="align-middle">
                                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item->dusun }}</td>
                                        <td class="text-center">{{ number_format($item->laki_laki) }}</td>
                                        <td class="text-center">{{ number_format($item->perempuan) }}</td>
                                        <td class="text-center fw-bold">{{ number_format($item->total) }}</td>
                                        <td class="text-center">{{ $item->tahun }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('demografi-desa.edit', $item->id) }}"
                                                class="btn btn-sm btn-light-warning border-0 me-1 shadow-sm">
                                                <i class="bi bi-pencil text-warning"></i>
                                            </a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('demografi-desa.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDelete('delete-form-{{ $item->id }}')"
                                                    class="btn btn-sm btn-light-danger border-0 shadow-sm">
                                                    <i class="bi bi-trash text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            <i class="bi bi-info-circle me-2"></i> Tidak ada data demografi desa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3 border-top">
                        <div class="d-flex justify-content-end">
                            {{ $demografis->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
