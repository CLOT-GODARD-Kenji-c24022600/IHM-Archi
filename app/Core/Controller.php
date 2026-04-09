<?php

namespace App\Core;

/**
 * Classe de base des controleurs MVC.
 */
abstract class Controller
{
    /** @var View */
    protected $view;

    /**
     * @param View $view Moteur de rendu utilise par les controleurs.
     */
    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * Rend un template et l'encapsule dans une reponse HTTP.
     *
     * @param string $template Chemin du template (sans extension).
     * @param array<string, mixed> $data Variables exposees a la vue.
     * @param int $statusCode Code HTTP de la reponse.
     * @return Response
     */
    protected function render($template, array $data = array(), $statusCode = 200)
    {
        return Response::html($this->view->render($template, $data), $statusCode);
    }
}
