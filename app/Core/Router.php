<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

final class Router
{
    /** @var array<string, callable> */
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function dispatch(Request $request): Response
    {
        $key = $this->routeKey($request->method(), $request->path());

        if (!isset($this->routes[$key])) {
            return Response::html('<h1>404 - Page non trouvee</h1>', 404);
        }

        $handler = $this->routes[$key];
        $response = $handler($request);

        if (!$response instanceof Response) {
            throw new RuntimeException('Le handler doit retourner une instance de Response.');
        }

        return $response;
    }

    private function addRoute(string $method, string $path, callable $handler): void
    {
        $this->routes[$this->routeKey($method, $path)] = $handler;
    }

    private function routeKey(string $method, string $path): string
    {
        $normalizedPath = rtrim($path, '/');
        if ($normalizedPath === '') {
            $normalizedPath = '/';
        }

        return strtoupper($method) . ' ' . $normalizedPath;
    }
}

