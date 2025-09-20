@extends('layouts.app')
@section('content')
<div class="bg-light pt-10 pb-21"></div>
<div class="container-fluid mt-n22 px-6">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-12 col-12">
            <div class="mb-4 mb-lg-0">
                <h2 class="mb-1">Profile Settings</h2>
                <p class="mb-0 fs-5 text-muted">Manage your profile settings</p>
            </div>
        </div>
        
        <div class="col-xl-9 col-lg-8 col-md-12 col-12">
            <!-- Profile Information -->
            <div class="card" id="edit">
                <div class="card-body">
                    <h4 class="mb-1">Update Profile Information</h4>
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Change Password -->
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="mb-1">Change Password</h4>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>

            <!-- Danger Zone (Delete Account) -->
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="mb-1 text-danger">Danger Zone</h4>
                    <p>Deleting your account will remove all your data permanently. This action cannot be undone.</p>
                    <form method="POST" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?');">
                            Delete Account
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection