# POSKU - Sistem Point of Sale

<p align="center">
  <img src="https://github.com/uthadehikaru/posku/blob/main/public/POSku.png?raw=true" alt="Logo POSKU" width="200">
</p>

POSKU adalah sistem Point of Sale (POS) modern dan ramah pengguna yang dibangun dengan Laravel. Dirancang untuk memperlancar proses penjualan, manajemen inventaris, dan pelaporan untuk usaha kecil hingga menengah.

## Fitur

- **Antarmuka Ramah Pengguna**: Desain intuitif untuk navigasi mudah dan transaksi cepat.
- **Manajemen Inventaris**: Pantau stok Anda secara real-time.
- **Pelaporan Penjualan**: Hasilkan laporan terperinci untuk menganalisis kinerja bisnis Anda.
- **Dukungan Multi-pengguna**: Level akses berbeda untuk kasir, manajer, dan administrator.
- **Desain Responsif**: Berfungsi dengan baik di perangkat desktop dan mobile.

## Memulai

### Prasyarat

- PHP >= 8.1
- Composer
- MySQL atau PostgreSQL

### Instalasi

1. Klon repositori:
   ```
   git clone https://github.com/namapengguna/posku.git
   ```

2. Masuk ke direktori proyek:
   ```
   cd posku
   ```

3. Instal dependensi PHP:
   ```
   composer install
   ```

4. Buat salinan file `.env.example`:
   ```
   cp .env.example .env
   ```

5. Generate kunci aplikasi:
   ```
   php artisan key:generate
   ```

6. Konfigurasi database Anda di file `.env`.

7. Jalankan migrasi database:
   ```
   php artisan migrate
   ```

8. Mulai server pengembangan:
   ```
   php artisan serve
   ```

Kunjungi `http://localhost:8000` di browser Anda untuk melihat aplikasi.

## Berkontribusi

Kontribusi sangat diterima! Silakan ajukan Pull Request.

## Lisensi

Proyek ini adalah perangkat lunak open-source yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).

## Dukungan

Jika Anda mengalami masalah atau memiliki pertanyaan, silakan buka issue di repositori ini.
