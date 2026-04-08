<?php

declare(strict_types=1);

namespace App\Services;

use RuntimeException;

final class ApiClient
{
    public function __construct(private array $config)
    {
    }

    public function get(string $serviceName, string $resource): array
    {
        $baseUrl = $this->config['services'][$serviceName] ?? null;
        if ($baseUrl === null) {
            throw new RuntimeException('Service inconnu: ' . $serviceName);
        }

        $resource = '/' . ltrim($resource, '/');
        $url = rtrim($baseUrl, '/') . $resource;

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'timeout' => (int) ($this->config['http_timeout'] ?? 3),
                'ignore_errors' => true,
            ],
        ]);

        $json = @file_get_contents($url, false, $context);
        if ($json === false) {
            return $this->fallbackOrThrow('Impossible de joindre le service: ' . $url);
        }

        $decoded = json_decode($json, true);
        if (!is_array($decoded)) {
            return $this->fallbackOrThrow('Reponse JSON invalide pour: ' . $url);
        }

        return $decoded;
    }

    private function fallbackOrThrow(string $message): array
    {
        if (($this->config['fail_soft'] ?? false) === true) {
            return [];
        }

        throw new RuntimeException($message);
    }
}
