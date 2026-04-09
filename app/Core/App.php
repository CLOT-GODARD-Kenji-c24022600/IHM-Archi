<?php

namespace App\Core;

/**
 * Point d'entree applicatif qui compose le routeur et le moteur de vues.
 */
class App
{
    /** @var Router */
    private $router;
    /** @var View */
    private $view;
    /** @var array<string, mixed> */
    private $config;

    /**
     * @param array<string, mixed> $config Configuration globale de l'application.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->router = new Router();
        $this->view = new View(BASE_PATH . '/app/Views');
    }

    /**
     * @return Router
     */
    public function router()
    {
        return $this->router;
    }

    /**
     * @return View
     */
    public function view()
    {
        return $this->view;
    }

    /**
     * @return array<string, mixed>
     */
    public function config()
    {
        return $this->config;
    }

    /**
     * Traite une requete HTTP et retourne une reponse securisee.
     */
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
