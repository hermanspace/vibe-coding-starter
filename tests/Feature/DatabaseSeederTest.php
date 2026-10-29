<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;

test('seeder aman dijalankan berulang kali', function () {
    $this->seed(DatabaseSeeder::class);
    $this->seed(DatabaseSeeder::class);

    expect(User::where('email', 'test@example.com')->count())->toBe(1);
});

test('seeder tidak menimpa akun uji yang sudah diubah', function () {
    $this->seed(DatabaseSeeder::class);
    User::where('email', 'test@example.com')->update(['name' => 'Nama Baru']);

    $this->seed(DatabaseSeeder::class);

    expect(User::where('email', 'test@example.com')->value('name'))->toBe('Nama Baru');
});

test('seeder tidak membuat akun uji di server produksi', function () {
    app()->detectEnvironment(fn () => 'production');

    $this->seed(DatabaseSeeder::class);

    expect(User::where('email', 'test@example.com')->exists())->toBeFalse();
});
