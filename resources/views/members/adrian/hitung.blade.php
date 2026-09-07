{{-- <!DOCTYPE html>
<html>
    <head>
        <title>Kalkulator Dinamis</title>
    </head>


    <body>
<a href="{{ route('home') }}" style="display:block;padding:10px 24px;background:#101214;color:#fff;font:13px system-ui;text-decoration:none">← Kembali ke Kelompok 4</a>
        <div>
            <h1>
                Kalkulator Dinamis
            </h1>
            <p>
                Hasil dari {{$angka1}} {{$operasi}} {{$angka2}} adalah {{$hasil}}
            </p>
        </div>
    </body>
</html> --}}


@extends('members.adrian.layout')

@section('title', 'Kalkulator Dinamis')

@section('content')
    <h1>
        Kalkulator Dinamis
    </h1>
    <p>
        Hasil dari {{$angka1}} {{$operasi}} {{$angka2}} adalah {{$hasil}}
    </p>
@endsection
