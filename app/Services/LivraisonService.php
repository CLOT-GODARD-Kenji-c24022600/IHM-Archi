<?php

namespace App\Services;

class LivraisonService
{
    private $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function getPlats()
    {
        return $this->apiClient->get('plats_utilisateurs', 'plats');
    }

    public function getUtilisateurs()
    {
        return $this->apiClient->get('plats_utilisateurs', 'utilisateurs');
    }

    public function getMenus()
    {
        return $this->apiClient->get('menus', 'menus');
    }

    public function getCommandes()
    {
        return $this->apiClient->get('commandes', 'commandes');
    }
}
