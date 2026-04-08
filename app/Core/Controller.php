<?php

namespace App\Core;

abstract class Controller
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    protected function render($template, array $data = array(), $statusCode = 200)
    {
        return Response::html($this->view->render($template, $data), $statusCode);
    }
}
