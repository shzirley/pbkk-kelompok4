@extends('layouts.app')
@section('title', 'About')
@section('content')
<section class="about-hero">
    <div class="hero-image" aria-hidden="true"></div>
    <div class="container about-content"><span class="eyebrow reveal">02 / OUR ACADEMIC HOME</span><h1 class="reveal">Departemen<br>Teknik <em>Informatika.</em></h1><p class="reveal">{{ config('group.department_description') }}</p><a class="button light reveal" href="{{ config('group.department_url') }}" target="_blank" rel="noopener noreferrer">Jelajahi Informatika ITS <span aria-hidden="true">↗</span></a></div>
    <div class="container about-bottom"><span>INSTITUT TEKNOLOGI SEPULUH NOPEMBER</span><span>SUKOLILO · SURABAYA</span></div>
</section>
<section class="container department-section"><div class="section-heading reveal"><div><span class="eyebrow muted">BELAJAR. MENELITI. BERKARYA.</span><h2>Tempat ide<br><em>mulai tumbuh.</em></h2></div><p>Rasa ingin tahu adalah awal.<br>Ilmu dan kolaborasi membawanya lebih jauh.</p></div><div class="department-grid">
@foreach([['01','Pendidikan','Membangun fondasi ilmu komputer dan kemampuan untuk memecahkan masalah.'],['02','Penelitian','Mengeksplorasi gagasan dan mengembangkan pengetahuan di bidang informatika.'],['03','Kontribusi','Menerapkan teknologi untuk memberikan manfaat bagi masyarakat.']] as [$number,$title,$description])<article class="department-card reveal"><span>{{ $number }} /</span><h3>{{ $title }}</h3><p>{{ $description }}</p></article>@endforeach
</div><p class="source-note">Profil diringkas dari <a href="{{ config('group.department_url') }}">situs resmi Departemen Teknik Informatika ITS ↗</a>.</p></section>
@endsection
