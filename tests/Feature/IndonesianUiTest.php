<?php

use App\Models\User;
use Livewire\Volt\Volt;

// Starter kit memakai bahasa Indonesia untuk semua teks yang dilihat pengguna.

test('halaman depan, masuk, dan daftar berbahasa Indonesia', function () {
    $this->get('/')->assertOk()->assertSee('Aplikasimu sudah berjalan.')->assertSee('Buat akun');
    $this->get('/login')->assertOk()->assertSee('Lupa kata sandi?')->assertSee('Ingat saya');
    $this->get('/register')->assertOk()->assertSee('Ulangi Kata Sandi')->assertSee('Sudah punya akun?');
});

test('pesan validasi berbahasa Indonesia', function () {
    Volt::test('pages.auth.register')
        ->set('name', '')
        ->set('email', 'bukan-email')
        ->set('password', '123')
        ->set('password_confirmation', '456')
        ->call('register')
        ->assertSee('Nama wajib diisi.')
        ->assertSee('Email harus berupa alamat email yang valid.');
});

test('dasbor berbahasa Indonesia setelah masuk', function () {
    $this->actingAs(User::factory()->create())->get('/dashboard')
        ->assertOk()
        ->assertSee('Dasbor')
        ->assertSee('Aplikasimu siap dibangun');
});
