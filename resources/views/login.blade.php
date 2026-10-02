<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Sistem Informasi Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #205781, #004a99);
            height: 100vh;
        }
        .login-card {
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            animation: fadeIn 0.6s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .title {
            font-weight: 700;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center h-100">
        <div class="col-md-4">
            <div class="bg-white login-card">

                <h3 class="text-center mb-4 title">SIAKAD LOGIN</h3>

                {{-- Pesan error login --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form action="/login" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-2">Login</button>
                </form>

                <p class="text-center mt-3 text-muted" style="font-size: 14px;">
                    © 2025 Sistem Informasi Akademik
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

