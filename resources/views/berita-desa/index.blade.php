@extends('layouts.app')
@section('title', 'Berita Desa')
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
                            <i class="bi bi-newspaper me-2"></i> Data Berita Desa
                        </h3>
                        <a href="{{ route('berita-desa.create') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-plus-lg"></i> Tambah Berita
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
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($beritas as $index => $item)
                                    <tr class="align-middle">
                                        <td class="text-center fw-bold">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item->judul }}</td>
                                        <td>
                                            @if ($item->gambar)
                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                    alt="Gambar {{ $item->judul }}" class="rounded shadow-sm"
                                                    style="width: 100px; height: 100px; object-fit: cover; cursor:pointer"
                                                    data-bs-toggle="modal" data-bs-target="#gambarModal{{ $item->id }}">

                                                <!-- Modal -->
                                                <div class="modal fade" id="gambarModal{{ $item->id }}" tabindex="-1"
                                                    aria-labelledby="gambarModalLabel{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title"
                                                                    id="gambarModalLabel{{ $item->id }}">
                                                                    {{ $item->judul }}
                                                                </h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                                                    alt="Gambar {{ $item->judul }}"
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
                                        <td>{!! Str::limit(strip_tags($item->deskripsi), 20) !!}</td>

                                        <td class="text-center">
                                            <a href="{{ route('berita-desa.edit', $item->id) }}"
                                                class="btn btn-sm btn-light-warning border-0 me-1 shadow-sm">
                                                <i class="bi bi-pencil text-warning"></i>
                                            </a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('berita-desa.destroy', $item->id) }}" method="POST"
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
                                            <i class="bi bi-info-circle me-2"></i> Tidak ada data berita desa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="p-3 border-top">
                        <div class="d-flex justify-content-end">
                            {{ $beritas->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
