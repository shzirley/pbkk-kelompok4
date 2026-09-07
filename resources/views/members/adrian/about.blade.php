{{-- <!DOCTYPE html>

<html>
    <head>
        <title>
            Tentang Departemen
        </title>
    </head>
    <body>
<a href="{{ route('home') }}" style="display:block;padding:10px 24px;background:#101214;color:#fff;font:13px system-ui;text-decoration:none">← Kembali ke Kelompok 4</a>
        <div>
            <h1>
                Selamat datang di
                Departemen Teknik Informatika
            </h1>
            <p>
                Departemen Teknik Informatika di ITS berdedikasi pada keunggulan dalam pendidikan, penelitian, dan inovasi di bidang ilmu komputer dan rekayasa perangkat lunak.<br>
                Kami mempersiapkan mahasiswa untuk menjadi pemimpin teknologi melalui kurikulum mutakhir dan fasilitas kelas dunia.
    ​       </p>
        </div>
    </body>
</html> --}}


@extends('members.adrian.layout')

@section('title', 'Tentang Departemen')

@section('content')
    <h1>
        Selamat datang di
        Departemen Teknik Informatika
    </h1>
    <p>
        Departemen Teknik Informatika di ITS berdedikasi pada keunggulan dalam pendidikan, penelitian, dan inovasi di bidang ilmu komputer dan rekayasa perangkat lunak.<br>
        Kami mempersiapkan mahasiswa untuk menjadi pemimpin teknologi melalui kurikulum mutakhir dan fasilitas kelas dunia.
    </p>
@endsection
