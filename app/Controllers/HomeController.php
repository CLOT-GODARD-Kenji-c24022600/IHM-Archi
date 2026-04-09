<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Services\LivraisonService;

/**
 * Controleur du tableau de bord principal.
 */
class HomeController extends Controller
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
     * Affiche les statistiques globales de l'IHM.
     */
    public function index(Request $request)
    {
        $plats = $this->service->getPlats();
        $menus = $this->service->getMenus();
        $commandes = $this->service->getCommandes();

        return $this->render('home/index', array(
            'title' => 'Tableau de bord IHM',
            'stats' => array(
                'plats' => count($plats),
                'menus' => count($menus),
                'commandes' => count($commandes),
            ),
        ));
    }
}
