<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\View;
use App\Services\LivraisonService;

class CommandesController extends Controller
{
    private $service;

    public function __construct(View $view, LivraisonService $service)
    {
        parent::__construct($view);
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->render('commandes/index', array(
            'title' => 'Commandes',
            'commandes' => $this->service->getCommandes(),
        ));
    }
}
