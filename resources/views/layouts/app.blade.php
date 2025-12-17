<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Portal</title>

    <!-- Bootstrap CSS (متوافق مع Laravel 6) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Page Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

</body>
</html>


