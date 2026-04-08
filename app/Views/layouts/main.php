<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'IHM MVC', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header class="topbar">
    <h1>IHM - Livraison de repas</h1>
    <nav>
        <a href="/">Accueil</a>
        <a href="/plats">Plats</a>
        <a href="/menus">Menus</a>
        <a href="/commandes">Commandes</a>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>
</body>
</html>

