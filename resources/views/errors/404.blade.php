@extends('layouts.app')
@section('title', 'Halaman tidak ditemukan')
@section('content')<section class="container error-page"><span class="eyebrow">404 / WRONG TURN</span><h1>Sepertinya<br><em>tersesat.</em></h1><p>Halaman ini belum tersedia. Kembali dan kenali kelompok kami.</p><a href="{{ route('home') }}" class="button light">Kembali ke Home ↗</a></section>@endsection
