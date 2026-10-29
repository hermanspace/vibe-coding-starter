# Petunjuk untuk AI

Proyek ini dibangun oleh orang yang **bukan programmer**, bersama AI. Jelaskan setiap langkah dengan bahasa sehari-hari dan hindari istilah teknis tanpa penjelasan.

## Lingkungan

- Laravel 13 (PHP 8.3), Livewire 3, Tailwind CSS, MySQL 8. Fitur login dari Laravel Breeze sudah ada.
- **Semuanya berjalan di dalam Docker.** PHP, Composer, dan Node TIDAK terpasang langsung di laptop pengguna. Jangan menjalankan `php`, `composer`, `npm`, atau `node` langsung di terminal.
- Aplikasi terbuka di http://localhost:8000.
- Pengguna memakai VS Code. Perintah dijalankan di terminal VS Code, dari folder proyek.

## Perintah

Gunakan target Makefile:

| Perintah | Fungsi |
| --- | --- |
| `make up` / `make down` | Menyalakan / mematikan semua container |
| `make migrate` | Menjalankan migrasi |
| `make test` | Menjalankan tes (Pest) |
| `make build` | Build aset CSS/JS |
| `make update` | composer install + npm ci + build aset + migrasi |
| `make logs` | Melihat log aplikasi dan nginx |
| `make shell` | Masuk ke container aplikasi |

Kalau butuh perintah artisan, composer, atau npm yang tidak ada di Makefile, jalankan di dalam container:

```
docker compose exec app php artisan <perintah>
docker compose exec app composer <perintah>
docker compose run --rm node npm <perintah>
```

Lebih baik lagi, tulis isi file secara lengkap daripada memakai perintah generator.

## Aturan

- Kerjakan satu langkah kecil per giliran. Untuk pekerjaan besar, susun rencana dulu dan tunggu persetujuan.
- Ikuti pola MVC Laravel: migrasi untuk tabel, model untuk data, komponen Livewire untuk logika, view Blade untuk tampilan.
- Jangan mengubah `docker-compose.yml`, folder `docker/`, atau `Makefile`. Jangan menambah paket baru tanpa bertanya.
- Validasi setiap isian formulir. Pesan error dalam bahasa Indonesia.
- Batasi akses sesuai peran: setiap pengguna hanya boleh melihat dan mengubah data yang menjadi haknya.
- Nama tabel, kolom, class, dan variabel dalam bahasa Inggris. Semua teks yang dilihat pengguna dalam bahasa Indonesia.
- Tampilan harus nyaman dibuka dari HP. Pakai class Tailwind biasa.
- **Jangan pernah** menjalankan `make fresh`, menghapus file, atau perintah lain yang menghapus data tanpa bertanya dulu.

## Setelah setiap langkah

- Tulis daftar file yang dibuat dan diubah, dengan penjelasan singkat untuk masing-masing.
- Tulis perintah `make` yang perlu dijalankan, berurutan.
- Tulis langkah tes di browser, termasuk satu percobaan yang seharusnya ditolak (misalnya mengirim formulir kosong).
