# 📝 AbsenMagang

<p align="center">
  <strong>Portal Absensi Mahasiswa Magang Berbasis Web</strong><br>
  <em>Dibangun dengan PHP OOP dan MVC Architecture</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-OOP-777BB4?style=for-the-badge">
  <img src="https://img.shields.io/badge/Architecture-MVC-blue?style=for-the-badge">
  <img src="https://img.shields.io/badge/Database-MySQL-orange?style=for-the-badge">
  <img src="https://img.shields.io/badge/UI-Bootstrap%205-7952B3?style=for-the-badge">
  <img src="https://img.shields.io/badge/Status-Production-success?style=for-the-badge">
</p>

---

## 📌 Tentang Project

AbsenMagang adalah sistem absensi berbasis web yang memudahkan pencatatan kehadiran mahasiswa magang di Dinas Kehutanan Provinsi Sumatera Barat.

Sistem ini dibangun dengan pendekatan:

- Object-Oriented Programming (OOP)
- MVC Architecture (Model - View - Controller)
- Desain responsif
- UI/UX yang sederhana dan mudah digunakan

Tujuan utama:

- Meningkatkan efisiensi administrasi
- Mengurangi kesalahan pencatatan manual
- Mempercepat monitoring absensi secara realtime

---

## 📚 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Arsitektur Sistem](#-arsitektur-sistem)
- [UI / UX Design](#-ui--ux-design)
- [Preview Sistem](#-preview-sistem)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Struktur Folder](#-struktur-folder)
- [Instalasi](#-instalasi)
- [Penggunaan](#-penggunaan)
- [Konfigurasi Waktu Absensi](#-konfigurasi-waktu-absensi)
- [Keamanan Sistem](#-keamanan-sistem)
- [Pengembangan Mendatang](#-pengembangan-mendatang)
- [Kontributor](#-kontributor)
- [Dukungan](#-dukungan)

---

## 🎯 Fitur Utama

### 👤 Portal Mahasiswa

- 🔐 Registrasi dan login aman
- 📊 Dashboard kehadiran interaktif
- ⚡ Tombol absen cepat (Quick Presence)
- 📜 Riwayat absensi harian
- 📘 Informasi jam operasional

> Mahasiswa bisa absen dengan satu klik, lalu sistem otomatis menilai status on-time atau terlambat.

### 🛡️ Panel Admin

- 📈 Statistik absensi real-time
- 👥 Manajemen data mahasiswa (CRUD)
- 🕒 Laporan log absensi
- 🏷️ Pengaturan status mahasiswa

> Admin dapat melihat ringkasan aktivitas absensi dan mengelola data peserta magang dengan mudah.

### ✨ Fitur Interaktif

- Navigasi dashboard yang cepat dan responsif
- Pesan notifikasi status absen
- Validasi jam hadir otomatis
- Tabel data yang mudah dibaca

---

## 🏗️ Arsitektur Sistem

Sistem ini menggunakan arsitektur MVC:

- **Controller**: mengatur alur aplikasi dan menangani request/response
- **Model**: menerapkan query database dan logika data
- **View**: menyajikan tampilan HTML, CSS, dan JavaScript

Alur singkat:

User → Controller → Model → View → User

---

## 🎨 UI / UX Design

Konsep desain:

- Tampilan modern dan bersih
- Dominasi warna hijau (#198754)
- Layout berbasis card
- Responsif untuk desktop dan mobile
- Navigasi sederhana dan intuitif

---

## 🖼️ Preview Sistem

<p align="center">
  <img src="public/img/preview/dashboard-admin.png" width="80%">
  <br><br>
  <img src="public/img/preview/dashboard-intern.png" width="80%">
</p>

---

## 🛠️ Teknologi yang Digunakan

- Backend: PHP (OOP)
- Database: MySQL
- Frontend: HTML5, CSS3, JavaScript
- Styling: Bootstrap 5, custom CSS

---

## 📁 Struktur Folder

<pre>
absenmagang-php-mvc/
├── app/
│   ├── config/
│   ├── controllers/
│   │   ├── admin/
│   │   └── intern/
│   ├── core/
│   ├── models/
│   └── views/
│       ├── admin/
│       ├── auth/
│       ├── intern/
│       └── templates/
└── public/
    ├── css/
    ├── img/
    │   └── preview/
    └── js/
</pre>

---

## ⚙️ Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/<username>/absenmagang-php-mvc.git
   ```
2. Pindahkan folder ke `htdocs` atau `www` pada XAMPP.
3. Buat database baru dan import file SQL jika tersedia.
4. Sesuaikan konfigurasi database di `app/config/config.php`.
5. Buka aplikasi di browser:
   ```
   http://localhost/absenmagang-php-mvc
   ```

---

## ▶️ Penggunaan

1. Akses halaman login di browser.
2. Login sebagai admin atau mahasiswa.
3. Untuk mahasiswa, gunakan menu "Absensi" dan tekan tombol absen.
4. Untuk admin, buka dashboard untuk melihat statistik dan riwayat data.
5. Gunakan menu CRUD untuk menambah, mengubah, atau menghapus data mahasiswa.

---

## ⏰ Konfigurasi Waktu Absensi

- Absen dibuka : 07:00 WIB
- Tepat waktu : ≤ 08:00 WIB
- Absen ditutup : 16:00 WIB

---

## 🔐 Keamanan Sistem

- Autentikasi sesi (session authentication)
- Validasi input dari user
- Proteksi akses berdasarkan role
- Proteksi file penting

---

## 🚀 Pengembangan Mendatang

- QR Code absensi
- GPS tracking
- Export laporan ke PDF / Excel
- Notifikasi WhatsApp

---

## 👨‍💻 Kontributor

- Randa — Backend Developer
- Angga — Frontend & UI/UX

---

## 🏢 Instansi

Dinas Kehutanan Provinsi Sumatera Barat

---

## ⭐ Dukungan

Jika project ini membantu:

- Berikan ⭐ pada repository
- Fork untuk pengembangan
- Gunakan sebagai referensi
