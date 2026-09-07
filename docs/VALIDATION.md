# Validasi — 7 September 2026

- Laravel: 14 tests passed, 147 assertions. Mencakup semua route halaman utama dan personal, biodata enam anggota, empat operasi pada keempat kalkulator, angka negatif/desimal, input invalid, pembagian nol, batas input, redirect form, placeholder proyek, dan 404.
- Laravel Pint memformat PHP aplikasi utama (app, config, routes, tests).
- Composer metadata valid; dependency tetap sesuai lock. Instalasi lokal selesai setelah route utama tersedia dan package discovery dijalankan ulang.
- Route cache dan kompilasi Blade berhasil. JavaScript lolos node --check.
- Browser desktop: Home menampilkan hero gedung dan grid 3 x 2. Link Kamal dan Adrian membuka profil yang sesuai; tautan kembali ke kelompok pada profil Kamal bekerja. Profil Shifa beserta navigasi internal diperiksa.
- Browser mobile 390 x 844: menu Home membuka empat navigasi; Home, About, Project, dan hasil kalkulator tidak memiliki overflow horizontal.
- Form mobile: memilih Kali memperbarui simbol; -2.5 dan 4 mengarah ke /hitung/-2.5/4/kali dan menampilkan -10 dengan simbol perkalian yang tepat.
- Kontrol animasi: on/off bekerja dan status off bertahan setelah reload, lalu diaktifkan kembali.
- Tampilan Project diperiksa: kartu putih dan pesan menunggu brainstorming, tanpa ide proyek buatan.
- Dua pesan browser AbortError: Transition was skipped muncul selama navigasi cepat antar profil; tujuan halaman tetap termuat. Cross-document view transition bersifat progresif, bukan syarat navigasi.

Pengujian ini bukan audit aksesibilitas/cross-browser menyeluruh. OS reduced-motion diimplementasikan dengan media query dan listener, tetapi perubahan setting OS belum diuji secara manual. Website belum dideploy ke hosting publik.
