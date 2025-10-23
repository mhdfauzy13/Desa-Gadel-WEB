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
                            <i class="bi bi-people-fill me-2"></i> Data User
                        </h3>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-plus-lg"></i> Tambah User
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center" style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $item)
                                    <tr class="align-middle">
                                        <td class="text-center fw-bold">{{ $users->firstItem() + $index }}</td>
                                        <td class="fw-semibold">{{ $item->name }}</td>
                                        <td class="text-muted">{{ $item->email }}</td>
                                        <td>
                                            <span
                                                class="badge rounded-pill px-3 py-2
                                    {{ $item->role === 'admin' ? 'bg-success' : 'bg-warning' }}">
                                                {{ strtoupper($item->role) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.users.edit', $item->id) }}"
                                                class="btn btn-sm btn-light-warning border-0 me-1 shadow-sm">
                                                <i class="bi bi-pencil text-warning"></i>
                                            </a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('admin.users.destroy', $item->id) }}" method="POST"
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
                                            <i class="bi bi-info-circle me-2"></i> Tidak ada data user.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="p-3 border-top">
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
