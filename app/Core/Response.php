<?php

declare(strict_types=1);

namespace App\Core;

final class Response
{
    public function __construct(
        private string $body,
        private int $statusCode = 200,
        private array $headers = ['Content-Type' => 'text/html; charset=UTF-8']
    ) {
    }

    public static function html(string $body, int $statusCode = 200): self
    {
        return new self($body, $statusCode);
    }

    public function send(): void
    {
        if (PHP_SAPI !== 'cli' && !headers_sent()) {
            http_response_code($this->statusCode);
            foreach ($this->headers as $name => $value) {
                header($name . ': ' . $value);
            }
        }

        echo $this->body;
    }
}
