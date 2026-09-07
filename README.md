# Framework Programming Team 8

Website Laravel untuk tugas PBKK yang memuat halaman utama, profil Departemen Teknik Informatika ITS, ide proyek, dan kalkulator dinamis.

## Menjalankan Website

Pastikan PHP 8.3+ dan Composer sudah terpasang. Dari root repository, jalankan:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve --host=127.0.0.1 --port=8004
```

Buka [http://127.0.0.1:8004](http://127.0.0.1:8004) pada browser.

## Routes yang Diimplementasikan

| Route | Controller | Deskripsi |
| --- | --- | --- |
| `GET /` | `PageController@index` | Halaman Home — menampilkan nama dan NRP anggota kelompok |
| `GET /about` | `PageController@about` | Halaman About — profil Departemen Informatika ITS |
| `GET /project-idea` | `PageController@project` | Halaman Project Idea — deskripsi tema proyek AI |
| `GET /hitung/{angka1}/{angka2}/{operasi}` | `PageController@hitung` | Kalkulator dinamis berdasarkan parameter URL |

## Fitur Kalkulator Dinamis

- Input dua angka integer melalui parameter URL.
- Validasi input numerik menggunakan pola `[0-9]+`.
- Operasi yang tersedia: `tambah` (`+`), `kurang` (`−`), `kali` (`×`), dan `bagi` (`÷`).
- Mencegah pembagian dengan nol.
- Menangani operasi yang tidak dikenal dan input non-numerik.
- Menampilkan hasil dalam bentuk kalimat kalkulasi.

Contoh:

```text
/hitung/10/2/bagi
```

## Anggota Kelompok

| NRP | Nama |
| --- | --- |
| 5025241234 | Justin Valentino |
| — | Raymond Julius Pardosi |
| 5025241108 | Indra Wahyu Tirtayasa |
| 5025241140 | Brave Juliada |
| — | Mario Napitupulu |
| 5025221107 | Dzuhrillah Hendraines |

## Struktur Utama

- `routes/web.php`: definisi seluruh route website.
- `app/Http/Controllers/PageController.php`: controller untuk halaman utama, about, project, dan kalkulator.
- `app/Services/Calculator.php`: logika perhitungan dan validasi kalkulator.
- `resources/views`: template halaman website.
- `public/css` dan `public/js`: styling responsif serta animasi antarmuka.

## Validasi

```powershell
php artisan test
php vendor/bin/pint --test app config routes tests
php artisan view:cache
```

