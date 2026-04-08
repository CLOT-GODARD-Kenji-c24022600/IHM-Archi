<?php

namespace App\Core;

class App
{
    private $router;
    private $view;
    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->router = new Router();
        $this->view = new View(BASE_PATH . '/app/Views');
    }

    public function router()
    {
        return $this->router;
    }

    public function view()
    {
        return $this->view;
    }

    public function config()
    {
        return $this->config;
    }

    public function handle(Request $request)
    {
        try {
            return $this->router->dispatch($request);
        } catch (\Throwable $e) {
            $body = $this->view->render('home/error', array(
                'title' => 'Erreur interne',
                'message' => $e->getMessage(),
            ));

            return Response::html($body, 500);
        }
    }
}
