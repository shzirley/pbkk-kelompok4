<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
<a href="{{ route('home') }}" style="display:block;padding:10px 24px;background:#101214;color:#fff;font:13px system-ui;text-decoration:none">← Kembali ke Kelompok 4</a>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('adrian.home') }}">Tugas PBKK</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link px-2" href="{{ route('adrian.home') }}">Home</a>
                        <a class="nav-link px-2" href="{{ route('adrian.about') }}">About</a>
                        <a class="nav-link px-2" href="{{ route('adrian.project') }}">Project</a>
                        <a class="nav-link px-2" href="{{ route('adrian.calculate', ['angka1'=>10, 'angka2'=>5, 'operasi'=>'kali']) }}">Kalkulator</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            @yield('content')
        </div>

    </body>
</html>
