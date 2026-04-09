<?php

namespace App\Services;

/**
 * Cas d'usage applicatifs relies aux donnees de livraison.
 */
class LivraisonService
{
    /** @var ApiClient */
    private $apiClient;

    /**
     * @param ApiClient $apiClient Client HTTP vers les microservices.
     */
    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /** @return array<int|string, mixed> */
    public function getPlats()
    {
        return $this->apiClient->get('plats_utilisateurs', 'plats');
    }

    /** @return array<int|string, mixed> */
    public function getUtilisateurs()
    {
        return $this->apiClient->get('plats_utilisateurs', 'utilisateurs');
    }

    /** @return array<int|string, mixed> */
    public function getMenus()
    {
        return $this->apiClient->get('menus', 'menus');
    }

    /** @return array<int|string, mixed> */
    public function getCommandes()
    {
        return $this->apiClient->get('commandes', 'commandes');
    }
}
