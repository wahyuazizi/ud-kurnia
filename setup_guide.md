# Panduan Penyiapan Proyek

Panduan ini akan memandu Anda melalui langkah-langkah untuk menyiapkan dan menjalankan proyek.

## 1. Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut di sistem Anda:

*   **PHP**: Versi 8.0 atau lebih tinggi.
*   **Composer**: Untuk mengelola dependensi PHP.
*   **Node.js & npm**: Untuk mengelola dependensi JavaScript.
*   **MySQL / MariaDB**: Server basis data.
*   **Git**: (Opsional, jika Anda tidak mengkloning dari repositori) Untuk kontrol versi.

## 2. Penyiapan Proyek

1.  **Salin Berkas Proyek**:
    Salin semua berkas proyek dari flash drive ke direktori yang Anda inginkan (misalnya, `C:\xampp\htdocs\ud-kurnia`).

2.  **Instal Dependensi PHP**:
    Navigasikan ke direktori root proyek di terminal Anda dan jalankan:
    ```bash
    composer install
    ```

3.  **Instal Dependensi Node.js**:
    Di direktori root proyek, jalankan:
    ```bash
    npm install
    ```
    Kemudian, kompilasi aset:
    ```bash
    npm run dev
    ```

4.  **Konfigurasi Lingkungan**:
    *   Salin berkas `.env.example` ke `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Buka berkas `.env` yang baru dibuat dan konfigurasikan koneksi basis data Anda:
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nama_basis_data_anda # contoh: ud_kurnia
        DB_USERNAME=username_basis_data_anda   # contoh: root
        DB_PASSWORD=password_basis_data_anda   # contoh: (kosong untuk root)
        ```
        Ganti `nama_basis_data_anda`, `username_basis_data_anda`, dan `password_basis_data_anda` dengan kredensial basis data Anda yang sebenarnya.

5.  **Buat Kunci Aplikasi**:
    Di direktori root proyek, jalankan:
    ```bash
    php artisan key:generate
    ```

6.  **Tautkan Penyimpanan (Storage)**:
    Buat tautan simbolik untuk penyimpanan:
    ```bash
    php artisan storage:link
    ```

## 3. Penyiapan Basis Data

1.  **Buat Basis Data Baru**:
    Menggunakan alat manajemen basis data pilihan Anda (misalnya, phpMyAdmin, MySQL Workbench, atau baris perintah MySQL), buat basis data kosong baru. Pastikan nama basis data cocok dengan nilai `DB_DATABASE` di berkas `.env` Anda.

2.  **Impor Basis Data SQL**:
    Impor berkas `.sql` yang disediakan (misalnya, `database.sql`) ke dalam basis data yang baru dibuat. Anda biasanya dapat melakukan ini melalui fungsi impor alat manajemen basis data Anda.

## 4. Menjalankan Aplikasi

1.  **Mulai Server Pengembangan**:
    Di direktori root proyek, jalankan:
    ```bash
    php artisan serve
    ```
    Ini biasanya akan memulai server di `http://127.0.0.1:8000`.

2.  **Akses Aplikasi**:
    Buka peramban web Anda dan navigasikan ke alamat yang disediakan oleh `php artisan serve` (misalnya, `http://127.0.0.1:8000`).

---
**Catatan**: Jika Anda mengalami masalah, silakan merujuk ke dokumentasi Laravel atau mencari bantuan dari pengelola proyek Anda.