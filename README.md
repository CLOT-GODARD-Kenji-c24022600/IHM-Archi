# IHM-Archi (MVC PHP)

Architecture MVC propre pour la partie IHM du projet microservices (Plats/Utilisateurs, Menus, Commandes).

## Structure

- `public/` : point d'entree web (`index.php`) et assets
- `app/Core/` : noyau MVC (router, request/response, view)
- `app/Controllers/` : controleurs IHM
- `app/Services/` : consommation des APIs REST des microservices
- `app/Views/` : templates PHP (layout + pages)
- `routes/web.php` : declaration des routes HTTP
- `config/services.php` : URLs des microservices
- `tests/smoke.php` : test minimal du routing/rendu

## Lancer en local

Prerequis: PHP 8+.

```bash
php -S localhost:8080 -t public
```

Puis ouvrir:
- `http://localhost:8080/`
- `http://localhost:8080/plats`
- `http://localhost:8080/menus`
- `http://localhost:8080/commandes`

## Lancer le smoke test

```bash
php tests/smoke.php
```

## Brancher les mocks JSON-Server

Par defaut, l'IHM appelle:
- `http://localhost:3003`
- `http://localhost:3004`
- `http://localhost:3005`

Tu peux les modifier dans `config/services.php`.

