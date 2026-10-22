<?php

// 1. Definisikan folder /tmp untuk Vercel
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $tmpStorage = '/tmp/storage';
    
    if (!is_dir($tmpStorage)) {
        @mkdir($tmpStorage, 0777, true);
        @mkdir($tmpStorage . '/framework/cache/data', 0777, true);
        @mkdir($tmpStorage . '/framework/sessions', 0777, true);
        @mkdir($tmpStorage . '/framework/views', 0777, true);
        @mkdir($tmpStorage . '/logs', 0777, true);
    }

    $_ENV['APP_STORAGE'] = $tmpStorage;

    // Sediakan path bootstrap/cache tiruan di /tmp jika diperlukan oleh PackageManifest
    $tmpBootstrapCache = '/tmp/bootstrap/cache';
    if (!is_dir($tmpBootstrapCache)) {
        @mkdir($tmpBootstrapCache, 0777, true);
    }
}

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$maintenancePath = (isset($_ENV['APP_STORAGE']) ? $_ENV['APP_STORAGE'] : __DIR__.'/../storage') . '/framework/maintenance.php';
if (file_exists($maintenancePath)) {
    require $maintenancePath;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Paksa gunakan storage di /tmp
if (isset($_ENV['APP_STORAGE'])) {
    $app->useStoragePath($_ENV['APP_STORAGE']);
}

// 2. Override path bootstrap cache Laravel agar mengarah ke /tmp/bootstrap/cache yang bisa ditulis
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    // MenggunakanRefleksi/Binding untuk mengalihkan path bootstrap cache ke /tmp
    try {
        $reflector = new ReflectionClass($app);
        if ($reflector->hasMethod('useBootstrapPath')) {
            $app->useBootstrapPath('/tmp');
        } else {
            // Fallback manual bind path jika method tidak ada
            $app->instance('path.bootstrap', '/tmp');
        }
    } catch (\Throwable $e) {
        // Abaikan jika gagal, lanjut eksekusi
    }
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);