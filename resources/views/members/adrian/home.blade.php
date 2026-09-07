{{-- <!DOCTYPE html>
<html>
    <head>
        <title>Selamat Datang</title>
    </head>

    <body>
<a href="{{ route('home') }}" style="display:block;padding:10px 24px;background:#101214;color:#fff;font:13px system-ui;text-decoration:none">← Kembali ke Kelompok 4</a>
        <div>
            <h1>
                Selamat datang di
                Departemen Teknik Informatika
            </h1>
            <p>
                Nama : {{ $nama }} <br> NRP : {{ $nrp }}
            </p>
        </div>
    </body>
</html> --}}

@extends('members.adrian.layout')

@section('title', 'Selamat Datang')

@section('content')
    <h1>
        Selamat datang di
        Departemen Teknik Informatika
    </h1>
    <p>
        Nama : {{ $nama }} <br> NRP : {{ $nrp }}
    </p>
@endsection
