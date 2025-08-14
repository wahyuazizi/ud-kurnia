```mermaid
usecase "Toko Online UD Kurnia" {
    actor Klien
    actor Admin

    rectangle "Fungsionalitas Klien" {
        usecase "Mengelola Akun (Daftar, Masuk)" as UC1
        usecase "Melihat & Mencari Produk" as UC2
        usecase "Mengelola Keranjang Belanja" as UC3
        usecase "Melakukan Pemesanan & Pembayaran" as UC4
        usecase "Melihat Status & Riwayat Pesanan" as UC5
    }

    rectangle "Fungsionalitas Admin" {
        usecase "Mengelola Akun Toko" as UC6
        usecase "Mengelola Produk & Kategori" as UC7
        usecase "Mengelola Pesanan Pelanggan" as UC8
        usecase "Mengelola Diskon" as UC9
    }

    Klien -- UC1
    Klien -- UC2
    Klien -- UC3
    Klien -- UC4
    Klien -- UC5

    Admin -- UC6
    Admin -- UC7
    Admin -- UC8
    Admin -- UC9
}
```