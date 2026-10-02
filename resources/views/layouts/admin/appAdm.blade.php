<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        /* css baru */
        html, body {
            height: 100%;
            overflow: hidden; /* 🔥 KUNCI: BODY TIDAK SCROLL */
        }

        .sidebar {
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background-color: #1f2933;
            overflow-y: auto;
            z-index: 1000;
        }

        /* Main area setelah sidebar */
        .main-wrapper {
            margin-left: 220px;
            width: calc(100% - 220px);
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Navbar tetap */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Konten yang bisa scroll */
        .page-content {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background-color: #f4f6f9;
        }

        /* Mobile */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-wrapper {
                margin-left: 0;
                width: 100%;
            }
        }


        /* style lama  */
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #1f2933;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #334155;
            color: #fff;
        }

        .sidebar .active {
            background-color: #0d6efd;
            color: #fff;
        }

        .content-wrapper {
            padding: 20px;
        }

        @media (max-width: 576px) {
            .content-wrapper {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">

        <!-- Sidebar -->
        @include('components.admin.sidebar')
    
        <!-- Main Content -->
        <div class="main-wrapper">
    
            <!-- Navbar -->
            @include('components.admin.navbar')
    
            <!-- Page Content (SCROLL AREA) -->
            <div class="page-content">
                @yield('content')
            </div>
    
        </div>
    
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
