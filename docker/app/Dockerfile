# Kotak untuk aplikasi Laravel: PHP 8.3 + ekstensi yang dibutuhkan + Composer.
# Kamu hampir tidak perlu mengubah file ini.
FROM php:8.3-fpm

# Paket sistem yang dibutuhkan ekstensi PHP di bawah
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Ekstensi PHP: koneksi MySQL, gambar, zip, bahasa, matematika, cache
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql gd zip intl bcmath exif opcache

# Composer: pengelola paket PHP (ambil dari image resmi)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Samakan user di dalam kotak dengan user di laptopmu (biasanya id 1000)
# supaya file yang dibuat aplikasi tetap bisa kamu buka dan hapus.
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www
USER www-data
