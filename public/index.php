<?php

if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $tmpStorage = '/tmp/storage';

    // Buat struktur folder fisik di /tmp jika belum ada
    if (!is_dir($tmpStorage)) {
        @mkdir($tmpStorage, 0777, true);
        @mkdir($tmpStorage . '/framework/cache/data', 0777, true);
        @mkdir($tmpStorage . '/framework/sessions', 0777, true);
        @mkdir($tmpStorage . '/framework/views', 0777, true);
        @mkdir($tmpStorage . '/logs', 0777, true);
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

// Paksa Laravel menggunakan path storage di /tmp
if (isset($_ENV['APP_STORAGE'])) {
    $app->useStoragePath($_ENV['APP_STORAGE']);
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);