<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        {{-- Halaman depan sementara. Ganti isinya sesuai aplikasimu. --}}
        <div class="min-h-screen flex flex-col">
            <header class="px-4 py-4 sm:px-6">
                <div class="max-w-5xl mx-auto flex items-center justify-between gap-4">
                    <a href="/" class="font-semibold text-lg">{{ config('app.name') }}</a>
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </div>
            </header>

            <main class="flex-1 px-4 py-10 sm:px-6 sm:py-16">
                <div class="max-w-3xl mx-auto">
                    <p class="text-sm font-medium text-indigo-600">Starter kit Vibe Coding</p>
                    <h1 class="mt-2 text-3xl sm:text-5xl font-bold leading-tight">
                        Aplikasimu sudah berjalan.
                    </h1>
                    <p class="mt-4 text-base sm:text-lg text-gray-600">
                        Kalau kamu bisa membaca halaman ini, Docker, database, dan Laravel di laptopmu sudah bekerja.
                        Langkah berikutnya: buat akun, lalu mulai membangun bersama AI dengan prompt dari course.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('register') }}" class="inline-flex justify-center items-center rounded-md bg-gray-900 px-5 py-3 text-sm font-semibold text-white hover:bg-gray-700">
                            Buat akun
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex justify-center items-center rounded-md border border-gray-300 bg-white px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-100">
                            Sudah punya akun? Masuk
                        </a>
                    </div>

                    <div class="mt-12 rounded-lg bg-white p-5 shadow-sm">
                        <h2 class="font-semibold">Perintah yang sering dipakai</h2>
                        <dl class="mt-3 grid gap-2 text-sm sm:grid-cols-2">
                            <div><dt class="font-mono text-gray-900">make up</dt><dd class="text-gray-600">Menyalakan aplikasi</dd></div>
                            <div><dt class="font-mono text-gray-900">make down</dt><dd class="text-gray-600">Mematikan aplikasi</dd></div>
                            <div><dt class="font-mono text-gray-900">make logs</dt><dd class="text-gray-600">Melihat catatan error</dd></div>
                            <div><dt class="font-mono text-gray-900">make help</dt><dd class="text-gray-600">Melihat semua perintah</dd></div>
                        </dl>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
