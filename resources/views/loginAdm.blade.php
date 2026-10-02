<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SIAKAD</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #1e293b);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
        }

        .login-icon {
            font-size: 60px;
            color: #0d6efd;
        }
    </style>
</head>
<body>

    <div class="card login-card shadow-lg">
        <div class="card-body p-4">

            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill login-icon"></i>
                <h4 class="mt-2 fw-bold">Admin SIAKAD</h4>
                <p class="text-muted">Silakan login untuk melanjutkan</p>
            </div>

            <form action="/loginAdm" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>

            <hr>

            <p class="text-center text-muted mb-0">
                © 2025 Sistem Informasi Akademik
            </p>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
