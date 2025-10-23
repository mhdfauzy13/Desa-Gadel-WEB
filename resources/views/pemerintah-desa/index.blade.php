@extends('layouts.app')

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
                            <i class="bi bi-people-fill me-2"></i> Data Pemerintah Desa
                        </h3>
                        <a href="{{ route('pemerintah-desa.create') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Data
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card border-0 shadow-lg rounded-4">
                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="text-center" style="width: 60px;">#</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jabatan</th>
                                    <th class="text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $index => $item)
                                    <tr class="align-middle">
                                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item->nama }}</td>
                                        <td>
                                            @if ($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}"
                                                    alt="Foto {{ $item->nama }}" class="rounded shadow-sm"
                                                    style="width: 100px; height: 100px; object-fit: cover; cursor:pointer"
                                                    data-bs-toggle="modal" data-bs-target="#fotoModal{{ $item->id }}">

                                                <!-- Modal -->
                                                <div class="modal fade" id="fotoModal{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="fotoModalLabel{{ $item->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title"
                                                                    id="fotoModalLabel{{ $item->id }}">
                                                                    {{ $item->nama }} - {{ $item->jabatan }}
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/' . $item->foto) }}"
                                                                    alt="Foto {{ $item->nama }}"
                                                                    class="img-fluid rounded"
                                                                    style="max-width: 400px; height: auto;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>


                                        <td class="text-muted">{{ $item->jabatan }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pemerintah-desa.edit', $item->id) }}"
                                                class="btn btn-sm btn-light-warning border-0 me-1 shadow-sm">
                                                <i class="bi bi-pencil text-warning"></i>
                                            </a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('pemerintah-desa.destroy', $item->id) }}" method="POST"
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
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="bi bi-info-circle me-2"></i> Tidak ada data pemerintah desa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3 border-top">
                        <div class="d-flex justify-content-end">
                            {{ $data->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
