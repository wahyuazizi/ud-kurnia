```mermaid
activityDiagram
    title Alur Proses Pemesanan (Klien & Admin)

    |Klien|                                                              |Admin|
    start
    :Melihat dan memilih produk;                                        |
    :Menambahkan produk ke keranjang;                                   |
    :Melakukan checkout;                                                |
    :Mengisi informasi pengiriman dan kontak;                           |
    :Membuat pesanan;                                                    |Pesanan Diterima
    |                                                                    :Menerima notifikasi pesanan baru;
    |                                                                    :Memverifikasi detail pesanan;
    if (Pembayaran terverifikasi?) then (Ya)
        |                                                                :Mengubah status pesanan menjadi "Diproses";
        |                                                                :Menyiapkan dan mengirim pesanan;
        |                                                                :Mengubah status pesanan menjadi "Dikirim";
        :Menerima notifikasi bahwa pesanan telah dikirim;                |
    else (Tidak)
        |                                                                :Menghubungi klien untuk konfirmasi pembayaran;
    endif
    :Menerima pesanan;                                                   |
    stop

```
