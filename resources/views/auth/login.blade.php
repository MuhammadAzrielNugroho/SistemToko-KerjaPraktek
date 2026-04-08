<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Toko</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
        }
    </style>
</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center" style="height:100vh;">

        <div class="col-xl-4 col-lg-5 col-md-6">

            <div class="card shadow-lg border-0 rounded-lg">

                <div class="card-body p-5">

                    <!-- TITLE -->
                    <div class="text-center mb-4">
                        <h4 class="font-weight-bold text-primary">Sistem Toko</h4>
                        <small class="text-muted">Silakan login untuk melanjutkan</small>
                    </div>

                    <!-- ERROR -->
                    @if($errors->any())
                        <div class="alert alert-danger text-center">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- FORM -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- EMAIL -->
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <button class="btn btn-primary btn-block mt-4">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>

                    </form>

                </div>

                <!-- FOOTER -->
                <div class="card-footer text-center small text-muted">
                    © {{ date('Y') }} Sistem Toko
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>