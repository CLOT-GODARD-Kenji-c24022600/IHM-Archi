<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\View;
use App\Services\LivraisonService;

/**
 * Controleur de consultation des commandes.
 */
class CommandesController extends Controller
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
     * Affiche la liste des commandes.
     */
    public function index(Request $request)
    {
        return $this->render('commandes/index', array(
            'title' => 'Commandes',
            'commandes' => $this->service->getCommandes(),
        ));
    }
}
