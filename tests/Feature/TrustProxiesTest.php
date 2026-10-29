<?php

use Illuminate\Support\Facades\Route;

beforeEach(function () {
    Route::get('/_cek-alamat', fn () => url('/masuk'));
});

test('alamat memakai https saat dibuka lewat Cloudflare Tunnel', function () {
    $this->get('/_cek-alamat', ['X-Forwarded-Proto' => 'https'])
        ->assertSeeText('https://');
});

test('alamat tetap http tanpa header dari Cloudflare', function () {
    $this->get('/_cek-alamat')
        ->assertSeeText('http://')
        ->assertDontSeeText('https://');
});
