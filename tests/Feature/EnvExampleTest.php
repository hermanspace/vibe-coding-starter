<?php

test('error Laravel ikut tampil di make logs', function () {
    // make logs membaca keluaran container app. Tanpa stderr, error hanya masuk ke file
    // storage/logs/laravel.log dan peserta tidak bisa menyalinnya untuk AI.
    $env = file_get_contents(dirname(__DIR__, 2).'/.env.example');

    expect($env)->toMatch('/^LOG_CHANNEL=stack$/m')
        ->and($env)->toMatch('/^LOG_STACK=.*\bstderr\b/m');
    expect(config('logging.channels.stderr.driver'))->toBe('monolog');
});
