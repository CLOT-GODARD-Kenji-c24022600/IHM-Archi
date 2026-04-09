<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Representation immuable d'une requete HTTP.
 */
final class Request
{
    /**
     * @param array<string, mixed> $queryParams Parametres d'URL.
     * @param array<string, mixed> $bodyParams Parametres de corps.
     */
    public function __construct(
        private string $method,
        private string $path,
        private array $queryParams = [],
        private array $bodyParams = []
    ) {
    }

    /**
     * Cree une requete a partir des superglobales PHP.
     */
    public static function fromGlobals(): self
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        return new self(
            strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET'),
            $path,
            $_GET,
            $_POST
        );
    }

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    /**
     * @param mixed $default
     * @return mixed
     */
    public function query(string $key, mixed $default = null): mixed
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param mixed $default
     * @return mixed
     */
    public function body(string $key, mixed $default = null): mixed
    {
        return $this->bodyParams[$key] ?? $default;
    }
}

