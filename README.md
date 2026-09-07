# ITS Academic Profile — Kelompok 4

Website Laravel untuk PBKK A: enam anggota kelompok, profil Departemen Teknik Informatika ITS, halaman ide proyek yang menunggu brainstorming, kalkulator dinamis, dan lima website personal yang terhubung.

## Menjalankan

Butuh PHP 8.3+ dan Composer. Dari root repository ini:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve --host=127.0.0.1 --port=8004
```

Buka http://127.0.0.1:8004. Langkah penyalinan .env hanya untuk instalasi baru. Session dan cache memakai file; fitur website ini tidak membutuhkan database. Aset CSS/JS tersedia langsung di public sehingga tidak memerlukan npm build. Google Fonts dan Bootstrap pada profil personal menggunakan CDN.

## Rute

| URL | Halaman |
| --- | --- |
| `/` | Home dan enam kartu anggota |
| `/about` | Profil departemen |
| `/project-idea` (alias `/project`) | Placeholder ide proyek |
| `/calculator` (alias `/kalkulator`) | Form kalkulator dinamis |
| `/hitung/{angka1}/{angka2}/{operasi}` | Hasil tambah, kurang, kali, atau bagi |
| `/anggota/kamal` | Website lengkap Kamal |
| `/anggota/adrian` | Website Adrian |
| `/anggota/shifa` | Website Shifa |
| `/anggota/fathiya` | Website Fathiya |
| `/anggota/angela` | Website Angela |

Setiap website personal memiliki navigasi internalnya sendiri dan tautan kembali ke kelompok. Rhea tetap tampil dengan biodata karena source personalnya belum tersedia. Angela diadaptasi dari source lengkap `personal-website-angela`, termasuk home, projects, collection, contact, dan asset visualnya. Source Fathiya berasal dari `5025241204_Tugas1` pada branch impor.

## Struktur dan penilaian

- `routes/web.php`: seluruh rute website diarahkan ke controller.
- `app/Http/Controllers/PageController.php`: halaman kelompok dan form perhitungan.
- `app/Services/Calculator.php`: aritmetika dengan validasi input, batas angka, dan pembagian nol.
- `app/Http/Controllers/MemberController.php`: adapter profil Adrian dan Shifa.
- `app/Http/Controllers/KamalController.php`: profil Kamal lengkap.
- `config/group.php`: data anggota dan profil departemen; ubah di sini ketika profil baru tersedia.
- `resources/views/members`: salinan view personal dengan route terpisah; source impor awal tetap tersedia sebagai referensi.
- `public/css/group.css` dan `public/js/group.js`: responsive grid, animasi scroll, tilt kartu, hover, progress, dan kontrol animasi yang tersimpan. Reduced motion perangkat selalu diutamakan.

Kalkulator mendukung angka negatif dan desimal (titik), rentang input −1 triliun sampai 1 triliun, empat operasi, dan hasil dengan presisi 12 digit signifikan. Kesalahan domain ditampilkan dengan HTTP 422, bukan error server. Ini memakai floating point dan bukan kalkulator keuangan presisi arbitrer.

## Validasi

```powershell
php artisan test
php vendor/bin/pint --test app config routes tests
php artisan view:cache
node --check public/js/group.js
```

Lihat `docs/VALIDATION.md` untuk hasil verifikasi, `docs/design.md` untuk spesifikasi desain, dan `docs/SOURCES.md` untuk sumber foto serta adaptasi personal website.

Implementasi ada di branch `feature/group-academic-website`. Branch `import/website-sources` mempertahankan checkpoint impor. Belum ada deployment publik; GitHub berisi source yang perlu dijalankan pada server PHP.
