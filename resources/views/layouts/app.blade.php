<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pengajuan Paspor')</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            color: #343a40;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #ff416c 0%, #8e2de2 100%);
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
        }
        .sidebar h4 {
            font-weight: 600;
            letter-spacing: 1px;
        }
        .sidebar .nav-link {
            color: #f8f9fa;
            border-radius: 12px;
            margin: 6px 0;
            padding: 10px 15px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }
        .sidebar .nav-link i {
            margin-right: 8px;
        }
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.2);
            transform: translateX(6px);
        }
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.3);
            font-weight: 600;
        }
        .main-content {
            background: #f4f6f9;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }
        .card-header {
            background: linear-gradient(135deg, #ff416c 0%, #8e2de2 100%);
            color: white;
            font-weight: 600;
            border-radius: 18px 18px 0 0;
        }
        .alert {
            border-radius: 12px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-3">
                <h4 class="text-white text-center mb-4">
                    <i class="fas fa-passport"></i> INDONESIA PASPOR
                </h4>
                <nav class="nav flex-column">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('pendaftar.*') ? 'active' : '' }}" href="{{ route('pendaftar.index') }}">
                        <i class="fas fa-users"></i> Data Pendaftar
                    </a>
                    <a class="nav-link {{ request()->routeIs('daftar-ulang.*') ? 'active' : '' }}" href="{{ route('daftar-ulang.index') }}">
                        <i class="fas fa-file-alt"></i> Daftar Ulang
                    </a>
                    <a class="nav-link {{ request()->routeIs('pengurusan.*') ? 'active' : '' }}" href="{{ route('pengurusan.index') }}">
                        <i class="fas fa-cogs"></i> Pengurusan
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
