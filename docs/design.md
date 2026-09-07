# Spesifikasi Desain UI & Web Flow: ITS Academic Profile
**File:** `websiteKelompok.md`
**Sumber Referensi:** Desain Profil Akademik & Proyek Web Kelompok (PBKK A)

---

## 1. Ikhtisar & Arsitektur Informasi (Web Flow)

Website ini adalah **Web Profil Akademik & Showcase Proyek Kelompok** (Departemen Teknik Informatika ITS), yang menyajikan informasi profil kelompok, departemen, rencana proyek tugas akhir/kuliah, serta utilitas kalkulator.

### 1.1 Diagram Alir Navigasi (Web Flow)

```
[ Pengunjung / User ]
         │
         ▼
┌────────────────────────────────────────────────────────┐
│ Global Navigation Bar                                  │
│ - ITS Academic Profile (Logo / Brand)                 │
│ - Menu Items: [Home] [About] [Project] [Calculator]    │
└──────────────────────────┬─────────────────────────────┘
                           │
       ┌───────────────────┼───────────────────┬─────────────────────┐
       ▼                   ▼                   ▼                     ▼
┌──────────────┐   ┌──────────────┐   ┌─────────────────┐   ┌─────────────────┐
│ Section/Page │   │ Section/Page │   │  Section/Page   │   │  Section/Page   │
│    [Home]    │   │   [About]    │   │    [Project]    │   │  [Calculator]   │
└──────┬───────┘   └──────┬───────┘   └────────┬────────┘   └────────┬────────┘
       │                  │                    │                     │
       ├─ Hero Section    └─ Profil Dept.      └─ Rencana Proyek     └─ Tool Perhitungan
       │  - "Selamat         Teknik               Tugas Akhir           Akademik / IPK /
       │     Datang!"        Informatika          (Modal/Detail via     Kalkulator Teknis
       │  - CTA Proyek       (Deskripsi           "Lihat
       │                     institusi & visi)     Selengkapnya")
       └─ Biodata Anggota
          - 6 Kartu Profil
            Mahasiswa
                           │
                           ▼
┌────────────────────────────────────────────────────────┐
│ Global Footer                                          │
│ - Hak Cipta: © ITS Academic Profile — PBKK A           │
│ - Kontak/Tautan: Github | 5025241XXX@student.its.ac.id │
└────────────────────────────────────────────────────────┘
```

### 1.2 Hirarki Halaman / Section
1. **Home (`/` atau `#home`)**:
   - **Hero Banner**: Ucapan selamat datang dengan latar foto gedung Teknik Informatika ITS monokrom / gelap, judul besar serif, deskripsi singkat, dan tombol CTA `"Rencana Proyek"` (berpindah ke bagian Project).
   - **Biodata Anggota**: Grid kartu identitas anggota tim (6 mahasiswa) dengan nama, NRP, kelas (PBKK A), dan avatar placeholder profil.
   - **Footer**: Hak cipta, identitas kelas, serta kontak GitHub & email ITS mahasiswa.

2. **About (`/about` atau `#about`)**:
   - **Hero/Centric Banner**: Judul `"Departemen Teknik Informatika"`, paragraf profil misi dan keunggulan akademik dengan latar foto fasad gedung Departemen Informatika ITS.
   - **Footer**: Identitas & kontak.

3. **Project (`/project` atau `#project`)**:
   - **Feature Card / Modal Container**: Kartu putih melayang di atas background gedung bernuansa gelap.
   - **Label & Judul**: Sub-label *"Kelompok 4"*, Headline *"Rencana Proyek Tugas Akhir"*.
   - **Isi Rencana**: Paragraf uraian rencana proyek tugas akhir.
   - **Aksi (CTA)**: Tombol tombol hitam `"Lihat Selengkapnya"` untuk membaca detail/spesifikasi proyek lengkap.
   - **Footer**: Identitas & kontak.

4. **Calculator (`/calculator` atau `#calculator`)**:
   - Menu utilitas kalkulator akademik (misal: simulasi nilai/IPK atau tools perhitungan mata kuliah PBKK).

---

## 2. Inventaris Elemen UI (UI Elements Inventory)

### 2.1 Komponen Navigasi & Shell (Header & Footer)
* **Navbar / Header**:
  - **Tipe**: Dark bar / transparent overlay navigation bar.
  - **Brand Mark**: Teks `"ITS Academic Profile"` (Font serif bold/semi-bold putih).
  - **Nav Links**: Horizontal list item:
    - `Home`
    - `About`
    - `Project`
    - `Calculator`
    - *Styling*: Teks putih sans-serif, regular weight, hover opacity/underline.
* **Footer**:
  - **Layout**: Baris horizontal (`flex justify-between items-center`), background hitam pekat (`#000000` / `#0B0B0B`).
  - **Sisi Kiri**: Copyright `© ITS Academic Profile — PBKK A`.
  - **Sisi Kanan**: Link `Github` dan alamat email mahasiswa `5025241XXX@student.its.ac.id`.

---

### 2.2 Komponen Card & Kontainer
1. **Member Profile Card (Biodata Anggota)**:
   - **Struktur**: Grid 3 kolom x 2 baris (pada desktop) atau 1 kolom (pada mobile).
   - **Style**:
     - Background: Putih bersih (`#FFFFFF`) dengan sudut melengkung (*rounded corners* ~12px-16px).
     - Pembagian: Dua area horizontal (kiri: rincian teks, kanan: avatar lingkaran).
     - Rincian Data: Format pasangan key-value:
       - `Nama   : Student 1`
       - `NRP    : 5025241000`
       - `Kelas  : PBKK A`
       - Warna label & isi: Biru gelap / slate-cyan (`#1E3A8A` atau `#0F4C81`) dengan teks bold untuk label/isi.
     - Avatar Graphic: Lingkaran siluet user placeholder berwarna abu-abu sangat muda/transparan di sisi kanan kartu.

2. **Project Content Card (Modal Box)**:
   - **Struktur**: Container box melayang (*centered card*) di tengah background dengan kontras tinggi.
   - **Style**:
     - Background: Putih solid (`#FFFFFF`), border radius ~8px-12px, soft drop shadow (`shadow-2xl`).
     - Padding: Dalam (~40px - 48px).
     - Badge/Tag: Sub-heading teks italic/serif *"Kelompok 4"*.
     - Headline: Font serif tebal *"Rencana Proyek Tugas Akhir"*.
     - Body: Teks justified/left-aligned abu-abu gelap (`#374151`) terbagi dalam beberapa paragraf.

---

### 2.3 Tipografi (Typography System)

| Peran | Tipe Font | Bobot | Warna | Contoh Penggunaan |
|---|---|---|---|---|
| **Display / Heading 1** | Serif (Playfair Display / Merriweather / Georgia) | Bold (700) | Putih (`#FFFFFF`) / Hitam (`#111827`) | `"Selamat Datang!"`, `"Rencana Proyek Tugas Akhir"`, `"Departemen Teknik Informatika"` |
| **Section Heading** | Serif | Semi-bold / Bold | Putih (`#FFFFFF`) | `"Biodata Anggota"` |
| **Brand Logo** | Serif | Medium / Semi-bold | Putih (`#FFFFFF`) | `"ITS Academic Profile"` |
| **Navigation Links** | Sans-Serif (Inter / Roboto / System Sans) | Regular / Medium (400-500) | Putih (`#FFFFFF`) | `"Home"`, `"About"`, `"Project"`, `"Calculator"` |
| **Card Data Text** | Sans-Serif / Monospace | Medium (500) | Biru Navy (`#1E3A8A`) | `"Nama : Student 1"`, `"NRP : 5025241000"` |
| **Sub-headline / Kategori** | Serif | Italic (400) | Abu-abu gelap (`#4B5563`) | `Kelompok 4` |
| **Body Paragraph** | Sans-Serif | Regular (400) | Abu-abu muda (`#D1D5DB`) atau abu-abu gelap (`#4B5563`) | Uraian teks deskripsi |

---

### 2.4 Tombol & Kontrol Interaktif (Buttons & CTA)

1. **Primary Button (Light / Inverted)**:
   - *Teks*: `"Rencana Proyek"`
   - *Shape*: Pill shape (`rounded-full`)
   - *Warna Background*: Putih (`#FFFFFF`)
   - *Warna Teks*: Hitam pekat (`#000000`)
   - *Hover State*: Sedikit abu-abu terang / scale mikro (1.02x)

2. **Secondary / Dark Action Button**:
   - *Teks*: `"Lihat Selengkapnya"`
   - *Shape*: Pill shape (`rounded-full`)
   - *Warna Background*: Hitam (`#000000`)
   - *Warna Teks*: Putih (`#FFFFFF`)
   - *Posisi*: Bottom-right aligned di dalam kartu proyek

---

### 2.5 Palet Warna (Color Palette)

* **Background Utama (Dark Theme Canvas)**: `#050505` hingga `#0D0D0D` (Hitam / Deep Charcoal dengan overlay background gedung Informatika ITS).
* **Surface Putih (Kartu & Box Konten)**: `#FFFFFF`.
* **Primary Accent (Teks Data Anggota)**: Biru Navy / Teknik Informatika (`#1B365D` / `#2563EB`).
* **Text High Contrast**: `#FFFFFF` (Heading dark background) & `#111827` (Heading light background).
* **Text Muted**: `#9CA3AF` (Dark mode) & `#4B5563` (Light mode).
* **Overlay Layer**: Hitam transparan (`rgba(0, 0, 0, 0.65)` s/d `rgba(0, 0, 0, 0.85)`) untuk menjaga keterbacaan teks di atas foto gedung.

---

## 3. Rekomendasi Responsivitas (Mobile Adaptation)

* **Mobile Header**: Konversi menu horizontal (`Home, About, Project, Calculator`) menjadi burger menu atau tab bar ringkas.
* **Grid Biodata Anggota**:
  - Desktop: Grid 3 kolom.
  - Tablet: Grid 2 kolom.
  - Mobile: Grid 1 kolom (full width per kartu anggota).
* **Card Proyek**: Padding horizontal diperkecil menjadi 20px - 24px pada layar mobile, tombol `"Lihat Selengkapnya"` dapat diatur `width: 100%` agar mudah disentuh (*thumb-friendly*).
