<?php

if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $_ENV['APP_STORAGE'] = '/tmp/storage';
}

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
*/

// PERHATIAN: Karena storage dialihkan ke /tmp, cek maintenance juga diarahkan ke sana jika diperlukan
$maintenancePath = (isset($_ENV['APP_STORAGE']) ? $_ENV['APP_STORAGE'] : __DIR__.'/../storage') . '/framework/maintenance.php';
if (file_exists($maintenancePath)) {
    require $maintenancePath;
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Override Storage Path for Vercel (PENTING)
|--------------------------------------------------------------------------
*/
if (isset($_ENV['APP_STORAGE'])) {
    $storagePath = $_ENV['APP_STORAGE'];
    
    // Buat folder fisik di /tmp jika belum ada agar Laravel bisa menulis log/cache
    if (!is_dir($storagePath)) {
        @mkdir($storagePath, 0777, true);
        @mkdir($storagePath . '/framework/cache/data', 0777, true);
        @mkdir($storagePath . '/framework/sessions', 0777, true);
        @mkdir($storagePath . '/framework/views', 0777, true);
        @mkdir($storagePath . '/logs', 0777, true);
    }

    // Paksa Laravel menggunakan path baru di /tmp
    $app->useStoragePath($storagePath);
}

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);