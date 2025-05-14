<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white p-3">
                <h4>Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">🏠 Dashboard</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.products.index') }}" class="nav-link text-white">📦 Products</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.users.index') }}" class="nav-link text-white">👥 Users</a>
                    </li>
                    <li class="nav-item mt-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-light w-100">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
