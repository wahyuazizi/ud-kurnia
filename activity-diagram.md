```mermaid
activityDiagram
    title Alur Proses Pemesanan Pelanggan

    start
    :Pelanggan menambahkan produk ke keranjang;
    :Pelanggan melihat keranjang belanja;
    if (Keranjang sudah sesuai?) then (ya)
        :Pelanggan melanjutkan ke checkout;
        :Pelanggan mengisi detail pengiriman;
        if (Detail pengiriman valid?) then (ya)
            :Sistem membuat pesanan baru;
            :Sistem menyimpan detail pesanan;
            :Sistem mengosongkan keranjang belanja;
            :Sistem menampilkan halaman sukses dengan kode pesanan;
            :Pelanggan melakukan pembayaran (diasumsikan offline/transfer);
            stop
        else (tidak)
            :Menampilkan error dan meminta input ulang;
            :Pelanggan mengisi ulang detail pengiriman;
        endif
    else (tidak)
        :Pelanggan memperbarui keranjang (jumlah/item);
    endif

```
