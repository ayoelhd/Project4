<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
       
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; 
        }
        main {
            flex: 1; 
        }
    </style>
</head>
<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Page Content --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


