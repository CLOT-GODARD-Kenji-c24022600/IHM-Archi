<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Autoloader PSR-4 minimal pour le namespace App.
 */
final class Autoloader
{
    /**
     * Enregistre la fonction d'autoload sur SPL.
     */
    public static function register(string $basePath): void
    {
        spl_autoload_register(static function (string $class) use ($basePath): void {
            $prefix = 'App\\';
            if (strpos($class, $prefix) !== 0) {
                return;
            }

            $relativeClass = substr($class, strlen($prefix));
            $file = $basePath . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

            if (is_file($file)) {
                require $file;
            }
        });
    }
}

