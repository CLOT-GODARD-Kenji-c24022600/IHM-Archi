<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\View;
use App\Services\LivraisonService;

/**
 * Controleur de consultation des plats.
 */
class PlatsController extends Controller
{
    /** @var LivraisonService */
    private $service;

    /**
     * @param View $view
     * @param LivraisonService $service
     */
    public function __construct(View $view, LivraisonService $service)
    {
        parent::__construct($view);
        $this->service = $service;
    }

    /**
     * Affiche la liste des plats.
     */
    public function index(Request $request)
    {
        return $this->render('plats/index', array(
            'title' => 'Plats disponibles',
            'plats' => $this->service->getPlats(),
        ));
    }
}
