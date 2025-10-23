@extends('layouts.app')

@section('title', 'Tambah User')

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
                            <i class="bi bi-person-plus-fill me-2"></i> Tambah User
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
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Nama</label>
                                <input type="text" name="name" class="form-control rounded-3"
                                    value="{{ old('name') }}" required>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control rounded-3"
                                    value="{{ old('email') }}" required>
                            </div>

                            <!-- Password -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control rounded-3" required>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="mb-3 col-md-6">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded-3" required>
                            </div>

                            <!-- Role -->
                            <div class="mb-4 col-md-6">
                                <label class="form-label fw-semibold">Role</label>
                                <select name="role" class="form-select rounded-3" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
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
