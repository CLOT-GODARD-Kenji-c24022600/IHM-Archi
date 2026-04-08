<?php

declare(strict_types=1);

use App\Core\App;
use App\Core\Autoloader;

if (!defined('BASE_PATH')) {
    define('BASE_PATH', __DIR__);
}

require_once BASE_PATH . '/app/Core/Autoloader.php';

Autoloader::register(BASE_PATH . '/app');

$config = require BASE_PATH . '/config/services.php';
$app = new App($config);

$registerRoutes = require BASE_PATH . '/routes/web.php';
$registerRoutes($app);

return $app;

