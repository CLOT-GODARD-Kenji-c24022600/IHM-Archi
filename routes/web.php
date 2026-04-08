<?php

use App\Controllers\CommandesController;
use App\Controllers\HomeController;
use App\Controllers\MenusController;
use App\Controllers\PlatsController;
use App\Core\App;
use App\Services\ApiClient;
use App\Services\LivraisonService;

return function (App $app) {
    $config = $app->config();
    $apiClient = new ApiClient($config);
    $service = new LivraisonService($apiClient);
    $view = $app->view();

    $homeController = new HomeController($view, $service);
    $platsController = new PlatsController($view, $service);
    $menusController = new MenusController($view, $service);
    $commandesController = new CommandesController($view, $service);

    $router = $app->router();
    $router->get('/', array($homeController, 'index'));
    $router->get('/plats', array($platsController, 'index'));
    $router->get('/menus', array($menusController, 'index'));
    $router->get('/commandes', array($commandesController, 'index'));
};
