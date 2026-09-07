<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ITS Academic Profile')</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>
<a href="{{ route('home') }}" style="display:block;padding:10px 24px;background:#101214;color:#fff;font:13px system-ui;text-decoration:none">← Kembali ke Kelompok 4</a>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('fathiya.home') }}">
                ITS Academic Profile
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fathiya.home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fathiya.about') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fathiya.project') }}">
                            Project
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fathiya.calculate', ['angka1'=>10, 'angka2'=>5, 'operasi'=>'tambah']) }}">
                            Kalkulator
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Isi halaman -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>


