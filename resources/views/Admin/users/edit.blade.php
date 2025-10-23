@extends('layouts.app')

@section('title', 'Edit User')

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
                            <i class="bi bi-pencil-square me-2"></i> Edit User
                        </h3>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light shadow-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card Form -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">

                    {{-- Alert Success --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Alert Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i> Terjadi kesalahan:
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="edit-form-{{ $user->id }}" action="{{ route('admin.users.update', $user->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Nama -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="name" class="form-control rounded-3"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control rounded-3"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Password
                                    <small class="text-muted">(kosongkan jika tidak diubah)</small>
                                </label>
                                <input type="password" name="password" class="form-control rounded-3">
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded-3">
                            </div>

                            <!-- Role -->
                            <div class="mb-4 col-md-6">
                                <label class="form-label fw-semibold">Role</label>
                                <select name="role" class="form-select rounded-3" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}"
                                            {{ old('role', $user->role) == $role ? 'selected' : '' }}>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Update -->
                        <div class="text-end border-top pt-3">
                            <button type="button" onclick="confirmEdit('edit-form-{{ $user->id }}')"
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
