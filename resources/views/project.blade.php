@extends('layouts.app')
@section('title', 'Project Idea')
@section('content')
<section class="project-stage">
    <div class="hero-image" aria-hidden="true"></div>
    <article class="project-paper reveal">
        <span class="eyebrow">03 / KELOMPOK 04</span>
        <h1>Agentic AI untuk<br><em>keamanan web.</em></h1>

        <div class="project-copy">
            <p class="lead">Kami merancang aplikasi <strong>Dynamic Application Security Testing (DAST)</strong> yang menggunakan Agentic AI untuk membantu menemukan kerentanan pada aplikasi web secara mandiri.</p>
            <p>Agen ini bekerja seperti pentester: memetakan halaman dan endpoint, membaca respons HTTP, lalu menentukan uji berikutnya berdasarkan temuan sebelumnya. Hasil pengujian dirangkum menjadi laporan yang mudah dipahami, lengkap dengan saran perbaikan di tingkat kode.</p>
            <p>Versi awal akan berfokus pada crawling halaman, analisis form, pengiriman payload uji untuk SQL Injection dan XSS, serta validasi respons. Pengujian dilakukan secara legal pada target lokal seperti OWASP Juice Shop atau DVWA.</p>
        </div>

        <div class="project-pillars" aria-label="Komponen utama proyek">
            <span>Reconnaissance</span>
            <span>AI Reasoning</span>
            <span>Security Report</span>
        </div>

        <div class="paper-footer">
            <span>AGENTIC SECURITY / MVP</span>
            <a href="{{ route('home') }}" class="text-link">Kembali ke Home ↗</a>
        </div>
    </article>
</section>
@endsection
