# UD Kurnia - Simple E-Commerce

Aplikasi e-commerce sederhana yang dibangun menggunakan Laravel. Proyek ini memungkinkan pelanggan untuk memesan produk tanpa perlu login dan dapat melacak pesanan mereka menggunakan kode unik. Panel admin tersedia untuk mengelola produk, pesanan, dan pengaturan toko.

## Prasyarat

Pastikan lingkungan pengembangan Anda memenuhi persyaratan berikut:

- PHP (versi sesuai `composer.json`, kemungkinan >= 8.0)
- Composer
- Node.js & NPM
- Database (MySQL, MariaDB, atau sejenisnya)

## Panduan Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username/ud-kurnia.git
    cd ud-kurnia
    ```

2.  **Install Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Install Dependensi JavaScript**
    ```bash
    npm install
    ```

4.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env`. File ini akan berisi semua konfigurasi spesifik untuk lingkungan Anda.
    ```bash
    copy .env.example .env
    ```
    *Untuk pengguna Linux/macOS, gunakan `cp .env.example .env`.*

5.  **Generate Kunci Aplikasi**
    ```bash
    php artisan key:generate
    ```

6.  **Konfigurasi Database**
    Buka file `.env` dan sesuaikan pengaturan database berikut sesuai dengan konfigurasi lokal Anda:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ud_kurnia
    DB_USERNAME=root
    DB_PASSWORD=
    ```

7.  **Jalankan Migrasi Database**
    Perintah ini akan membuat semua tabel yang diperlukan di dalam database Anda.
    ```bash
    php artisan migrate
    ```

8.  **Buat Symbolic Link untuk Penyimpanan**
    Ini penting agar file yang diunggah (seperti gambar produk atau diskon) dapat diakses dari web.
    ```bash
    php artisan storage:link
    ```

## Menjalankan Aplikasi

1.  **Compile Aset Frontend**
    Jalankan Vite untuk memproses file CSS dan JavaScript.
    ```bash
    npm run dev
    ```

2.  **Jalankan Server Pengembangan**
    Buka terminal baru dan jalankan perintah berikut untuk memulai server pengembangan Laravel.
    ```bash
    php artisan serve
    ```

Aplikasi Anda sekarang seharusnya berjalan dan dapat diakses di `http://127.0.0.1:8000`.

## Akun Admin

Secara default, tidak ada seeder untuk akun admin. Anda perlu mendaftar sebagai pengguna baru melalui halaman registrasi standar Laravel (`/register`) untuk membuat akun admin pertama Anda.