## ArsyAgro

![Gambar1](https://drive.google.com/uc?export=view&id=1ylcohWgNT5PowLrohSlfmif5AVrlABvE)
![Gambar2](https://drive.google.com/uc?export=view&id=1eVm8TP3Qld8a1PmMTFCwByreyUb56hPp)

## Daftar Isi
- [Deskripsi](#deskripsi)
- [Fitur](#fitur)
- [Instalasi](#instalasi)

## Deskripsi

Sistem informasi transaksi dan manajemen pelanggan menggunakan laravel 9

## Fitur

1. **Pencatatan Pembelian Buah Sawit:**
   - Admin dan karyawan dapat mencatat pembelian buah sawit dari petani atau pihak lain.
   - Setiap catatan mencakup jumlah (kg) dan harga pembelian.

2. **Akumulasi Pembelian:**
   - Sistem akan mengakumulasi pembelian buah sawit hingga mencapai target sebelum pengiriman ke pabrik.

3. **Pencatatan Pengiriman ke Pabrik:**
   - Sistem akan mencatat setiap pengiriman ke pabrik beserta tanggal pengiriman.
   - Informasi jumlah (kg) yang dikirim akan disimpan.

4. **Pencatatan Pendapatan Penjualan:**
   - Setiap penjualan buah sawit akan dicatat bersama dengan jumlah pendapatan yang diterima.
   - Informasi tentang pembeli juga dapat dimasukkan (jika diperlukan).

5. **Perhitungan Gaji Karyawan:**
   - Sistem akan menghitung gaji karyawan berdasarkan penjualan dan komisi yang sesuai.
   - Gaji karyawan akan disesuaikan dengan konfigurasi tertentu.

6. **Pencatatan Pengeluaran:**
   - Admin dapat mencatat pengeluaran yang terkait dengan operasional, pemeliharaan, atau biaya lainnya yang relevan.

7. **Pelaporan:**
   - Sistem akan menyediakan fitur pelaporan yang memungkinkan pengguna untuk melihat catatan pembelian, pengiriman, pendapatan, pengeluaran, dan perhitungan gaji.

8. **Manajemen Pinjaman:**
   - Admin dapat mengelola data peminjaman, termasuk pengaturan dan informasi terkait.

9. **Keamanan:**
   - Sistem akan memberikan tingkat akses yang berbeda untuk admin dan karyawan untuk menjaga keamanan data dan fungsi tertentu.


## Instalasi

Untuk menginstal proyek ini, ikuti langkah-langkah di bawah ini:
1. Clone repositori dari GitHub
2. $ cd ArsyAgro
3. $ composer install
4. $ php artisan migrate:fresh --seed 
5. $ php artisan key:generate
6. $ php artisan serve
7. username:fayyad | password:fayyad