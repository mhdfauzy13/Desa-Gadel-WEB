<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">
  <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet">
  <link href="../assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="../assets/libs/prismjs/themes/prism-okaidia.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/theme.min.css">
  <title>Forgot Password | Boson POS</title>
</head>

<body class="bg-light">
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
      <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
        <div class="card smooth-shadow-md">
          <div class="card-body p-6">
          <div class="mb-4 text-center">
              <p class="mb-6" style="color: #5340d9; font-size: 24px; font-weight: bold;">Forgot Password</p>
            </div>
            
            <!-- Session Status -->
            @if (session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            
            <!-- Form -->
            <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div>
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" placeholder="Masukan Email Anda" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 d-grid mt-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Submit') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/libs/feather-icons/dist/feather.min.js"></script>
  <script src="../assets/libs/prismjs/prism.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
  <script src="../assets/libs/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
  <script src="../assets/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
  <script src="../assets/js/theme.min.js"></script>
</body>
</html>
