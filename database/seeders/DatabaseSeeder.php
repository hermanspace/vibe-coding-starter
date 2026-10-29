<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Isi awal database. Aman dijalankan berulang kali (make setup boleh diulang):
     * akun uji hanya dibuat kalau belum ada.
     */
    public function run(): void
    {
        // Akun uji untuk lokal. Masuk dengan test@example.com / password
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Akun Uji',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        );
    }
}
