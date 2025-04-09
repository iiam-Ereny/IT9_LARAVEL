    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="{{ asset('frontend/main.css') }}">
    </head>
    <body>
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('img/LOGO1.png') }}" alt="LOGO">
                <h2>Medicine Monitoring System</h2>
            </div>
            <ul class="sidebar-links">
                <li><a href="{{ route('dashboard') }}"><span class="material-symbols-outlined">dashboard</span>Dashboard</a></li>
                <li><a href="{{ route('inventory') }}"><span class="material-symbols-outlined">inventory</span>Inventory</a></li>
                <li><a href="{{ route('sales') }}"><span class="material-symbols-outlined">real_estate_agent</span>Sales</a></li>
                <li><a href="{{ route('suppliers') }}"><span class="material-symbols-outlined">forklift</span>Suppliers</a></li>
                <li><a href="{{ route('reports') }}"><span class="material-symbols-outlined">lab_profile</span>Reports</a></li>
                <li><a href="{{ route('settings') }}"><span class="material-symbols-outlined">settings</span>Settings</a></li>
                <li><a href="{{ route('logout') }}"><span class="material-symbols-outlined">logout</span>Log-Out</a></li>
            </ul>
        </aside>

        <div class="main-content">
            @yield('content')
        </div>

        <div class="footer">
            © 2025 Medicines Monitoring System. All rights reserved.
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
    </html>