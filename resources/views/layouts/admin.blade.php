<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Portfolio Admin</a>
            <div class="d-flex align-items-center gap-3">
                <a class="btn btn-outline-light btn-sm" href="{{ route('home') }}" target="_blank" rel="noreferrer">View Site</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-light btn-sm" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
