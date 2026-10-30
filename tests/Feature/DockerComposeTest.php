<?php

/**
 * Isi satu service di docker-compose.yml, dari baris "  nama:" sampai service berikutnya.
 */
function serviceCompose(string $nama): string
{
    $compose = file_get_contents(dirname(__DIR__, 2).'/docker-compose.yml');
    preg_match('/^  '.$nama.':\n(.*?)(?=^  [a-z]+:\n|^\S)/ms', $compose, $m);

    return $m[1] ?? '';
}

test('app, nginx, dan mysql menyala lagi sendiri setelah server dinyalakan ulang', function () {
    foreach (['app', 'nginx', 'mysql'] as $service) {
        expect(serviceCompose($service))->toContain('restart: unless-stopped');
    }

    // node hanya dipakai sebentar untuk build, tidak boleh menyala terus
    expect(serviceCompose('node'))->not->toBe('')->not->toContain('restart:');
});

test('pintu nginx hanya terbuka untuk komputer itu sendiri', function () {
    // Di server, pengunjung datang lewat Cloudflare Tunnel. Docker menembus ufw,
    // jadi pintu yang terbuka ke internet tidak tertahan firewall.
    expect(serviceCompose('nginx'))->toContain('"127.0.0.1:8000:80"');
    expect(serviceCompose('mysql'))->not->toContain('ports:');
});
