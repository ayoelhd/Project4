<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', sans-serif; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        footer { background: #1e293b; color: #cbd5e1; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home.index') }}">UniPortal</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('home.contact') }}">Contact</a></li>
                    
                    <li class="nav-item"><a class="btn btn-primary ms-lg-3" href="{{ route('login.show') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="min-height: 80vh;">
        @yield('content')
    </main>

    <footer class="py-5 mt-5">
        <div class="container text-center">
            <p>© {{ date('Y') }} All Rights Reserved - University Portal</p>
        </div>
    </footer>
</body>
</html>