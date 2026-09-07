<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0b0d10">
    <meta name="description" content="Kenali enam anggota Kelompok 4 PBKK A, Departemen Teknik Informatika ITS, dan karya personal kami.">
    <title>@yield('title', 'Home') — ITS Academic Profile</title>
    <link rel="icon" href="{{ asset('images/group.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/group.css') }}">
    <script src="{{ asset('js/group.js') }}" defer></script>
</head>
<body>
<a href="#main" class="skip">Lewati ke konten</a>
<div class="scroll-progress" aria-hidden="true"></div>
<header class="header">
    <div class="container header-inner">
        <a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">i<span>f</span>.</span><span>ITS Academic Profile<small>KELOMPOK 04 / PBKK A</small></span></a>
        <button class="menu-toggle" aria-expanded="false" aria-controls="navigation" hidden>Menu <span aria-hidden="true">☰</span></button>
        <nav id="navigation" aria-label="Navigasi utama">
            @foreach(['home'=>'Home', 'about'=>'About', 'project'=>'Project', 'calculator'=>'Calculator'] as $name=>$label)
                <a href="{{ route($name) }}" @if(request()->routeIs($name, $name.'.alias') || ($name === 'calculator' && request()->routeIs('calculate'))) aria-current="page" @endif>{{ $label }}<span aria-hidden="true">↗</span></a>
            @endforeach
        </nav>
    </div>
</header>
<main id="main" tabindex="-1">@yield('content')</main>
<footer class="footer container">
    <div><a class="footer-brand" href="{{ route('home') }}">Built together. <em>Made to explore.</em></a><p>© {{ date('Y') }} ITS Academic Profile · Kelompok 4 · PBKK A</p></div>
    <div class="footer-links"><a href="{{ config('group.repository') }}" target="_blank" rel="noopener noreferrer">GitHub <span aria-hidden="true">↗</span></a><button class="motion-toggle" hidden aria-pressed="true">Animasi aktif</button></div>
    <span class="footer-caption">Proyek mahasiswa · Departemen Teknik Informatika ITS</span>
</footer>
</body>
</html>
