<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar --}}
        <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h4>Admin Panel</h4>
            <hr class="text-secondary">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.users.index') }}" class="nav-link text-white">👥 Manajemen User</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.products.index') }}" class="nav-link text-white">📦 Produk</a>
                </li>
                <li class="nav-item mt-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-light w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        {{-- Main Content --}}
        <div class="p-4 flex-grow-1 w-100">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
