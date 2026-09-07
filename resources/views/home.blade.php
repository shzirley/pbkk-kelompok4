@extends('layouts.app')
@section('title', 'Home')
@section('content')
<section class="hero">
    <div class="hero-image" aria-hidden="true"></div><div class="hero-grid" aria-hidden="true"></div>
    <div class="container hero-content">
        <div class="eyebrow reveal"><span class="status-dot"></span> INFORMATIKA ITS <span class="separator">/</span> KELOMPOK 04</div>
        <h1 class="reveal">Selamat<br><em>datang.</em><span class="heading-dot">✳</span></h1>
        <p class="hero-description reveal">Enam perspektif. Satu ruang untuk berkarya.<br>Kenali kami, tempat kami belajar, dan ide-ide yang akan kami bangun bersama.</p>
        <div class="hero-actions reveal"><a class="button light" href="{{ route('project') }}">Rencana Proyek <span aria-hidden="true">↗</span></a><a class="text-link" href="#anggota">Temui anggota <span aria-hidden="true">↓</span></a></div>
        <div class="hero-foot"><span>SURABAYA, INDONESIA <span class="tiny-dot">●</span></span><span>PEMROGRAMAN BERBASIS KERANGKA KERJA</span><a href="#anggota" aria-label="Scroll ke biodata anggota" class="scroll-cue">↓</a></div>
    </div>
    <span class="hero-coordinate" aria-hidden="true">07°16′ S · 112°47′ E</span>
</section>
<section id="anggota" class="container members-section">
    <div class="section-heading reveal"><div><span class="eyebrow muted">01 / THE PEOPLE</span><h2>Biodata <em>anggota.</em></h2></div><p>Di balik setiap baris kode,<br>ada cerita yang berbeda.</p></div>
    <div class="member-grid">
        @foreach($members as $member)
        <article class="member-card reveal {{ $member['route'] ? 'available' : 'pending' }}">
            @if($member['route'])<a class="member-card-link" href="{{ route($member['route']) }}" aria-label="Buka website personal {{ $member['name'] }}">@endif
            <div class="card-top"><span class="member-number">0{{ $loop->iteration }}</span><span class="member-status">{{ $member['route'] ? 'PERSONAL WEBSITE' : 'PROFIL KELOMPOK' }}</span><span class="card-arrow" aria-hidden="true">{{ $member['route'] ? '↗' : '—' }}</span></div>
            <div class="member-body"><div class="member-info"><h3>{{ $member['name'] }}</h3><dl><div><dt>NRP</dt><dd>{{ $member['nrp'] }}</dd></div><div><dt>Kelas</dt><dd>{{ config('group.class') }}</dd></div></dl></div><div class="avatar" aria-hidden="true"><span class="avatar-head"></span><span class="avatar-body"></span><b>{{ $member['initials'] }}</b></div></div>
            <div class="card-bottom">{{ $member['route'] ? 'Jelajahi personal website' : 'Personal website segera hadir' }}<span aria-hidden="true">{{ $member['route'] ? '→' : '◌' }}</span></div>
            @if($member['route'])</a>@endif
        </article>
        @endforeach
    </div>
    <div class="section-note reveal"><span class="note-star" aria-hidden="true">✳</span><p>Berangkat dari rasa ingin tahu.<br><strong>Bertumbuh lewat kolaborasi.</strong></p><a class="text-link" href="{{ route('about') }}">Tentang departemen kami ↗</a></div>
</section>
@endsection
