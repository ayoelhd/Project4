<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header text-center bg-primary text-white py-3">
                        <h4 class="mb-0">University Portal Login</h4>
                        <small>Student • Professor • Admin</small>
                    </div>
                    <div class="card-body p-4">

                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('login.check') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label for="email" class="form-label text-muted">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="name@university.edu" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label text-muted">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg" id="password" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer text-center bg-white py-3">
                        <small class="text-muted"><a href="{{ route('home.index') }}" class="text-decoration-none">← Back to Home</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>