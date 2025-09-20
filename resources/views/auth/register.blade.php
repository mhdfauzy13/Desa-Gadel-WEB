<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">
  <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/theme.min.css" rel="stylesheet">
  <title>Register | Dash UI</title>
</head>

<body class="bg-light">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <div class="card smooth-shadow-md">
          <div class="card-body p-6">
            <div class="mb-4 text-center">
              <p class="mb-6" style="color: #5340d9; font-size: 24px; font-weight: bold;">Register</p>
            </div>
            
            <!-- Form Register -->
            <form method="POST" action="{{ route('register') }}">
              @csrf
              
              <!-- Name -->
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" placeholder="Masukan Nama Anda" id="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Masukan Email Anda" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" placeholder="Masukan Password Anda" id="password" class="form-control" name="password" required>
                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
              
              <!-- Confirm Password -->
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" placeholder="Konfirmasi Password Anda" id="password_confirmation" class="form-control" name="password_confirmation" required>
              </div>
              
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              
              <div class="d-md-flex justify-content-between mt-4">
                <div class="mb-2 mb-md-0">
                  <a href="{{ route('login') }}" class="fs-5">Sudah punya akun?</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/theme.min.js"></script>
</body>
</html>
