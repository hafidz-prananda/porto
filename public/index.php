<?php

// 1. Definisikan folder /tmp untuk Vercel
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $tmpStorage = '/tmp/storage';
    $tmpBootstrapCache = '/tmp/bootstrap/cache';

    // Buat struktur folder fisik di /tmp jika belum ada
    if (!is_dir($tmpStorage)) {
        @mkdir($tmpStorage, 0777, true);
        @mkdir($tmpStorage . '/framework/cache/data', 0777, true);
        @mkdir($tmpStorage . '/framework/sessions', 0777, true);
        @mkdir($tmpStorage . '/framework/views', 0777, true);
        @mkdir($tmpStorage . '/logs', 0777, true);
    }

    if (!is_dir($tmpBootstrapCache)) {
        @mkdir($tmpBootstrapCache, 0777, true);
    }

    $_ENV['APP_STORAGE'] = $tmpStorage;
}

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cek maintenance mode
$maintenancePath = (isset($_ENV['APP_STORAGE']) ? $_ENV['APP_STORAGE'] : __DIR__.'/../storage') . '/framework/maintenance.php';
if (file_exists($maintenancePath)) {
    require $maintenancePath;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// 2. Paksa Laravel menggunakan path storage dan bootstrap cache di /tmp
if (isset($_ENV['APP_STORAGE'])) {
    $app->useStoragePath($_ENV['APP_STORAGE']);
    
    // Alihkan path bootstrap cache ke /tmp agar PackageManifest bisa menulis file cache
    $app.useBootstrapPath(dirname(__DIR__) . '/bootstrap'); // Kita akali dengan membuat custom bind jika perlu, atau gunakan cara di bawah:
}

// Cara paling aman mengalihkan bootstrap cache di Laravel 10 sebelum package manifest dimuat:
// (Tambahkan binding path cache langsung ke instance app)
if (isset($_ENV['VERCEL']) || isset($_ENV['VERCEL'])) {
    $app->useBootstrapPath('/tmp');
    // Karena useBootstrapPath menggunakan folder induk, pastikan /tmp/cache ada
    if (!is_dir('/tmp/cache')) {
        @mkdir('/tmp/cache', 0777, true);
    }
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);