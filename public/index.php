<?php

declare(strict_types=1);

use App\Core\Request;

/** @var App\Core\App $app */
$app = require dirname(__DIR__) . '/bootstrap.php';
$request = Request::fromGlobals();
$response = $app->handle($request);
$response->send();

