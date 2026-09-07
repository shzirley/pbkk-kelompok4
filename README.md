# Framework Programming Team 4

Website Laravel untuk tugas PBKK yang memuat profil anggota kelompok, profil Departemen Teknik Informatika ITS, ide proyek Agentic AI, dan kalkulator dinamis.

## Routes yang Diimplementasikan

| Route Method | Controller | Deskripsi |
| --- | --- | --- |
| `GET /` | `PageController@index` | Halaman Home — menampilkan nama dan NRP anggota kelompok |
| `GET /about` | `PageController@about` | Halaman About — profil Departemen Teknik Informatika ITS |
| `GET /project-idea` | `PageController@project` | Halaman Project Idea — deskripsi proyek Agentic AI untuk DAST |
| `GET /hitung/{angka1}/{angka2}/{operasi}` | `PageController@hitung` | Kalkulator dinamis berdasarkan parameter URL |

## Ide Proyek: Agentic AI untuk DAST

Proyek ini mengusulkan aplikasi **Dynamic Application Security Testing (DAST)** yang menggunakan Agentic AI untuk membantu menemukan kerentanan pada aplikasi web secara mandiri.

Agen AI bekerja seperti pentester dengan memetakan halaman dan endpoint, menganalisis form, membaca respons HTTP, lalu memilih pengujian berikutnya berdasarkan temuan sebelumnya. Sistem menghasilkan laporan keamanan yang menjelaskan temuan dan memberikan saran perbaikan di tingkat kode.

Versi awal atau MVP berfokus pada crawling halaman, analisis form, pengiriman payload uji untuk SQL Injection dan XSS, serta validasi respons. Pengujian dilakukan secara legal pada target lokal seperti OWASP Juice Shop atau DVWA.

## Fitur Kalkulator Dinamis

- Input dua angka integer melalui parameter URL dengan validasi pola `[0-9]+`.
- Operasi: `tambah` (`+`), `kurang` (`−`), `kali` (`×`), dan `bagi` (`÷`).
- Mencegah pembagian dengan nol.
- Menangani operasi yang tidak dikenal dan input non-numerik.
- Menampilkan hasil dalam bentuk kalimat kalkulasi.

Contoh:

```text
/hitung/10/2/bagi
```

## Anggota Kelompok

| NRP | Nama |
| :---: | :--- |
| 5025241153 | Kamal Zaky Adinata |
| 5025241226 | Angela Vania Sugiyono |
| 5025241151 | Adrian Afzal Zaidana |
| 5025241089 | Rhea Debora Sianturi |
| 5025241204 | Fathiya Nayla Husna Wibowo |
| 5025241176 | Shifa Alya Dewi |

## Menjalankan Website

Pastikan PHP 8.3+ dan Composer sudah terpasang. Dari root repository, jalankan:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve --host=127.0.0.1 --port=8004
```

Buka [http://127.0.0.1:8004](http://127.0.0.1:8004) pada browser.

## Struktur Utama

- `routes/web.php`: definisi seluruh route website.
- `app/Http/Controllers/PageController.php`: controller halaman utama, about, project, dan kalkulator.
- `app/Services/Calculator.php`: logika perhitungan dan validasi kalkulator.
- `resources/views`: template halaman website.
- `public/css` dan `public/js`: styling responsif serta animasi antarmuka.

## Validasi

```powershell
php artisan test
php vendor/bin/pint --test app config routes tests
php artisan view:cache
```
