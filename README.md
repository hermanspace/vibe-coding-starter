# Vibe Coding Starter Kit

Kerangka awal untuk membangun aplikasi web bersama AI, dipakai di course **Vibe Coding: Bangun Aplikasi untuk Bidangmu**.

Isinya sudah siap pakai:

- **Laravel 13** (PHP 8.3) dengan **Livewire 3** dan **Tailwind CSS**
- Fitur daftar, masuk, lupa kata sandi, dan halaman akun, dalam bahasa Indonesia
- **Docker Compose**: aplikasi, web server (nginx), dan database (MySQL 8) berjalan di dalam container
- **Makefile**: semua perintah sehari-hari cukup diketik pendek, misalnya `make up`

Kamu **tidak perlu** memasang PHP, Composer, Node, atau MySQL di laptop. Semuanya berjalan di dalam Docker.

## Yang perlu ada di laptopmu

- Docker Desktop
- VS Code
- `make` dan `git`

Panduan pemasangannya ada di modul **Persiapan** di course. Pengguna Windows bekerja di dalam WSL2 (Ubuntu).

## Memulai

Jalankan di terminal VS Code:

```
cd ~
git clone https://github.com/hermanspace/vibe-coding-starter.git
cd vibe-coding-starter
make setup
```

Pertama kali, `make setup` bisa memakan 5 sampai 15 menit. Setelah muncul tulisan "Selesai", buka http://localhost:8000.

Akun uji untuk mencoba: `test@example.com`, kata sandi `password`.

## Perintah sehari-hari

| Perintah | Fungsi |
| --- | --- |
| `make up` | Menyalakan aplikasi |
| `make down` | Mematikan aplikasi |
| `make update` | Setelah `git pull`: pasang paket baru, build tampilan, migrasi database |
| `make migrate` | Menjalankan migrasi database |
| `make logs` | Melihat catatan error |
| `make shell` | Masuk ke dalam container aplikasi |
| `make test` | Menjalankan tes |
| `make build` | Membangun ulang tampilan (CSS/JS) |
| `make backup` | Menyimpan salinan database ke folder `backups/` |
| `make help` | Melihat semua perintah |

## Bekerja dengan AI

File `AGENTS.md` berisi petunjuk untuk AI di editor (misalnya GitHub Copilot mode agen): cara menjalankan perintah lewat `make`, konvensi kode, dan larangan. AI di editor membacanya otomatis. Kalau memakai AI chat di browser, gunakan prompt dari generator di course, karena isinya sudah memuat petunjuk yang sama.

## Struktur folder penting

| Folder / file | Isinya |
| --- | --- |
| `app/Models` | Model: bentuk data di aplikasimu |
| `database/migrations` | Migrasi: rancangan tabel database |
| `resources/views` | Tampilan halaman (Blade dan komponen Livewire) |
| `routes/web.php` | Daftar alamat halaman |
| `docker-compose.yml`, `docker/`, `Makefile` | Mesin starter kit. Tidak perlu diubah |
