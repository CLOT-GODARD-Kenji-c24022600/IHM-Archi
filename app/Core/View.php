<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

final class View
{
    public function __construct(private string $viewsPath)
    {
    }

    public function render(string $template, array $data = [], string $layout = 'layouts/main'): string
    {
        $content = $this->renderTemplate($template, $data);

        if ($layout === '') {
            return $content;
        }

        return $this->renderTemplate($layout, array_merge($data, ['content' => $content]));
    }

    private function renderTemplate(string $template, array $data): string
    {
        $file = $this->viewsPath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $template) . '.php';
        if (!is_file($file)) {
            throw new RuntimeException('Vue introuvable: ' . $template);
        }

        extract($data, EXTR_SKIP);
        ob_start();
        require $file;

        return (string) ob_get_clean();
    }
}

