<?php

$paths = array('/', '/plats', '/menus', '/commandes');

foreach ($paths as $path) {
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_SERVER['REQUEST_URI'] = $path;

    ob_start();
    require dirname(__DIR__) . '/public/index.php';
    $html = ob_get_clean();

    if (!is_string($html) || $html === '') {
        throw new RuntimeException('Echec smoke test pour ' . $path);
    }

    echo '[OK] ' . $path . PHP_EOL;
}
