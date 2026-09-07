@extends('layouts.app')
@section('title', 'Calculator')
@section('content')
<section class="container calculator-section"><div class="section-heading reveal"><div><span class="eyebrow muted">04 / A LITTLE UTILITY</span><h1>Let's <em>calculate.</em></h1></div><p>Dua angka. Empat operasi.<br>Temukan hasilnya di sini.</p></div>
<div class="calculator-grid"><form class="calculator-form" action="{{ route('calculator.submit') }}" method="GET"><span class="eyebrow">MASUKKAN PERHITUNGAN</span>
@if($errors->any())<div class="form-error" role="alert">Periksa inputmu. Isi kedua angka dengan format yang valid.</div>@endif
<div class="number-fields"><div><label for="angka1">Angka pertama</label><input id="angka1" name="angka1" type="number" step="any" min="-1000000000000" max="1000000000000" value="{{ old('angka1', $angka1) }}" placeholder="10" required></div><span class="operation-preview" aria-hidden="true">{{ \App\Services\Calculator::OPERATIONS[$operasi] ?? '?' }}</span><div><label for="angka2">Angka kedua</label><input id="angka2" name="angka2" type="number" step="any" min="-1000000000000" max="1000000000000" value="{{ old('angka2', $angka2) }}" placeholder="5" required></div></div>
<fieldset><legend>Pilih operasi</legend><div class="operation-options">@foreach(\App\Services\Calculator::OPERATIONS as $value=>$opSymbol)<label class="operation-option"><input type="radio" name="operasi" value="{{ $value }}" @checked(old('operasi', $operasi) === $value) required><span><b>{{ $opSymbol }}</b>{{ ucfirst($value) }}</span></label>@endforeach</div></fieldset><p class="input-help">Angka negatif dan desimal didukung. Gunakan titik untuk desimal.</p><div class="form-actions"><button class="button dark" type="submit">Hitung hasil <span aria-hidden="true">↗</span></button><a class="text-link" href="{{ route('calculator') }}">Reset ↺</a></div></form>
<div class="result-panel reveal {{ $calculationError ? 'has-error' : '' }}" aria-live="polite"><span class="eyebrow">HASIL PERHITUNGAN</span>
@if($calculationError)<span class="result-decoration" aria-hidden="true">!</span><h2>Perlu sedikit<br><em>koreksi.</em></h2><p role="alert">{{ $calculationError }}</p>
@elseif($result !== null)<p class="expression">{{ $angka1 }} {{ $symbol }} {{ $angka2 }} =</p><output class="result-value">{{ $result }}</output><p>Selesai. Satu perhitungan, satu jawaban.</p>
@else<span class="result-decoration" aria-hidden="true">=</span><h2>A little math.<br><em>A little clarity.</em></h2><p>Isi angka dan pilih operasi untuk memulai.</p>
@endif
<div class="result-foot"><span>+ &nbsp; − &nbsp; × &nbsp; ÷</span><span>KELOMPOK 04</span></div></div></div></section>
@endsection
