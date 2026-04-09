<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\View;
use App\Services\LivraisonService;

/**
 * Controleur de consultation des menus.
 */
class MenusController extends Controller
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
     * Affiche la liste des menus.
     */
    public function index(Request $request)
    {
        return $this->render('menus/index', array(
            'title' => 'Menus',
            'menus' => $this->service->getMenus(),
        ));
    }
}
