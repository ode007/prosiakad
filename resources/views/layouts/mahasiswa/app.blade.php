<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>@yield('title', 'Sistem Akademik')</title>

    <style>
        body {
            background-color: #f5f7fa;
        }

        .sidebar {
            width: 280px;
            min-width: 280px;
            background: white;
            border-right: 2px solid #d7d7d7;
            transition: width 0.3s ease, min-width 0.3s ease;
            overflow: hidden;
            white-space: nowrap;
        }

        .sidebar.collapsed {
            width: 76px;
            min-width: 76px;
        }

        .sidebar.collapsed .sidebar-text,
        .sidebar.collapsed .sidebar-brand {
            display: none !important;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .sidebar.collapsed #sidebarToggle {
            margin: 0 auto;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center !important;
            padding: 12px 0 !important;
        }

        .sidebar.collapsed .nav-link svg {
            margin: 0 !important;
        }

        .sidebar.collapsed .sidebar-profile {
            padding-left: 0 !important;
            padding-right: 0 !important;
            text-align: center;
        }

        .sidebar.collapsed .sidebar-profile a {
            justify-content: center !important;
        }

        .sidebar.collapsed .sidebar-profile img {
            margin: 0 !important;
        }

        .sidebar.collapsed .dropdown-toggle::after {
            display: none !important;
        }

        .sidebar-header {
            background-color: #1f2933;
        }

        .sidebar .nav-link {
            padding: 12px 16px;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: #e9f1f7;
        }

        .custom-navbar {
            background-color: #1f2933 !important;
            padding: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-navbar input::placeholder {
            color: #ffffff;
            opacity: 1;
            /* penting supaya tidak abu-abu */
        }

        table.table {
            border-radius: 12px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        thead {
            background: #1f2933;
            color: white;
        }
    </style>
</head>

<body>
    <div class="d-flex">

        {{-- Sidebar --}}
        @include('components.mahasiswa.sidebar')

        {{-- Main Area --}}
        <div class="flex-grow-1 vh-100 d-flex flex-column" style="min-width: 0; overflow-x: hidden;">

            {{-- Navbar (TIDAK IKUT SCROLL) --}}
            @include('components.mahasiswa.topnav')

            {{-- Breadcrumb (opsional ikut navbar) --}}
            @yield('breadcrumb')

            {{-- Content (INI YANG SCROLL) --}}
            <div class="flex-grow-1 overflow-auto">
                <div class="container py-3">
                    @yield('content')
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
